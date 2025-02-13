<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Website;
use App\Models\Category;
use App\Models\PublisherOrder;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class VendorServiceController extends Controller
{
    public function allWebsites1()
    {
        return View('user.all-websites');
    }

    public function allWebsites()
    {
        $categories = Category::select('id', 'name')
            ->where('status', '1')
            ->orderBy('name')
            ->get();

        return View('user.all-websites', [
            'initialCategories' => $categories
        ]);
    }

    public function buyLink(Request $request)
    {
        // Get the website ID from the query parameter
        $websiteId = $request->query('site');

        // Retrieve the website data based on the website ID
        $website = Website::with('categories')->findOrFail($websiteId);

        if (!$website) {
            return redirect()->back()->with('error', 'Website not found.');
        }

        // Pass website details to the view
        return view('user.buy-link', [
            'website' => $website,
        ]);
    }

    // Handle the form submission and insert data into publisher_orders table
    public function placeOrder(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'requested_url' => 'required|string|max:255',
            'link_text' => 'required|string|max:255',  // Changed from nullable to required
            'notes' => 'nullable|string',
            'website_id' => 'required|exists:websites,id',
        ]);

        // Get the current logged-in user's ID
        $orderedBy = auth()->id();

        // Get the website details
        $website = Website::find($request->website_id);

        if (!$website) {
            return redirect()->back()->with('error', 'Website not found.');
        }

        // Insert the new order into the publisher_orders table
        $order = PublisherOrder::create([
            'ordered_by' => $orderedBy,
            'ordered_to' => $website->user_id,
            'site_id' => $website->id,
            'requested_url' => $request->requested_url,
            'link_text' => $request->link_text,
            'price' => $website->price, // You may need to adjust depending on the website data
            'notes' => $request->notes,
            'status' => 'pending', // Default status
        ]);

        // Additional code to save the order...
        $orderDetails = [
            'url' => $request->requested_url,
            'link_text' => $request->link_text,
            'notes' => $request->notes,
            'website' => $website->name,
            'ordered_by' => $orderedBy,
            'order_date' => now(),
            'id' => $order->id,
        ];

        $userEmail = Auth::user()->email;

        // Send the email
        Mail::to($userEmail) // Replace with the actual buyer's email
            ->bcc(['buyerorders@getseolinks.com', 'shaheen@maxinov.com'])
            ->send(new OrderConfirmationMail($orderDetails));

        // Redirect or return a response
        // Redirect to the order confirmation page with the order ID
        return redirect()->route('user.order-confirmation', ['orderId' => $order->id]);
    }

    public function orderConfirmation(Request $request)
    {
        $orderId = $request->query('orderId');

        if (!$orderId) {
            abort(404, 'Order ID not provided.');
        }

        $order = PublisherOrder::with('site')->findOrFail($orderId);

        return view('user.order-confirmation', compact('order'));
    }

    public function allVendorOrders()
    {
        return view("user.vendor-all-orders");
    }

    //Manage all the orders
    public function manageOrder(Request $request)
    {
        // Retrieve the 'orderId' from the query parameters
        $orderId = $request->query('orderId');

        // If 'orderId' is missing, return a 404 response
        if (!$orderId) {
            abort(404, 'Order ID not provided.');
        }

        // Get the currently logged-in user's ID
        $userId = auth()->id();

        try {
            // Attempt to find the order where 'ordered_by' matches the logged-in user
            $order = PublisherOrder::with('site')
                ->where('ordered_by', $userId)
                ->where('id', $orderId)
                ->first();
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Database error retrieving order', [
                'orderId' => $orderId ?? 'N/A',
                'userId' => $userId,
                'error' => $e->getMessage()
            ]);

            // Return a 500 error only for unexpected issues
            abort(500, 'An error occurred while retrieving the order.');
        }

        // If no order is found, return a 404 response
        if (!$order) {
            abort(404, 'Order not found.');
        }

        // Return the view with the retrieved order details
        return view('user.review-order-vendor', compact('order'));
    }

    /**
     * Handle the vendor's review of a completed order
     * This method processes both approval and rejection scenarios
     * 
     * @param Request $request Contains order_id, review_decision, and optional rejection_reason
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reviewOrderPost(Request $request)
    {
        Log::info('Received review request:', $request->all());

        try {
            DB::beginTransaction();

            // First validate the always-required fields
            $baseValidation = $request->validate([
                'order_id' => 'required|exists:publisher_orders,id',
                'review_decision' => 'required|in:approve,reject',
            ]);

            // Then validate rejection_reason only if review_decision is 'reject'
            if ($request->review_decision === 'reject') {
                $request->validate([
                    'rejection_reason' => 'required|string|max:1000',
                ]);
            }

            // Find the order
            $order = PublisherOrder::findOrFail($request->order_id);

            Log::info('Processing order:', ['id' => $order->id, 'status' => $order->status]);

            // Check if the order is in a completed status and can be reviewed
            if ($order->status !== 'completed') {
                DB::rollBack();
                return back()->with('error', 'This order cannot be reviewed at this time.');
            }

            // Get current UTC timestamp
            $currentUtc = Carbon::now('UTC');

            if ($request->review_decision === 'approve') {
                Log::info('Approving order:', ['id' => $order->id]);

                $order->vendor_status = 'approved';
                $order->approved_at = $currentUtc;
                $order->is_completed = true;
                $order->save();

                // Generate Invoice with GUID
                Invoice::create([
                    'order_id' => $order->id,
                    'user_id' => $order->ordered_by,
                    'total_amount' => $order->price,
                    'status' => 'unpaid',
                    'issued_at' => $currentUtc,
                ]);

                DB::commit();

                return back()
                    ->with('success', 'Order approved successfully! An invoice will be generated and sent to your email shortly.');
            } else {
                Log::info('Rejecting order:', ['id' => $order->id]);

                $order->vendor_status = 'rejected';
                $order->rejected_by_vendor_reason = $request->rejection_reason;
                $order->rejected_by_vendor_time = $currentUtc;
                $order->save();

                DB::commit();

                return back()
                    ->with('info', 'Thank you for your feedback. Our team will review your concerns and get back to you soon.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Order review failed: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all()
            ]);

            return back()
                ->withInput()
                ->with('error', 'An error occurred while processing your review. Please try again.');
        }
    }

    public function contact()
    {
        return view("user.contact");
    }

    //API ROUTES

    public function getAllVendorOrders()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orders with the required fields and join with the websites table
        $orders = PublisherOrder::select(
            'publisher_orders.id',
            // 'websites.masked_url as site_url',
            'websites.url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.notes',
            'publisher_orders.created_at',
            'publisher_orders.vendor_status',
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->where('publisher_orders.ordered_by', $userId)
            ->get();

        // Format the created_at field
        $orders->transform(function ($order) {
            $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y'); // Day-Month-Year and 24-hour time
            return $order;
        });
        // dd($orders);
        // Return the orders as a JSON response
        return response()->json($orders);

        /*
        //Output Json
        [
            {
                "id": 1,                        // The ID of the publisher order
                "site_name": "Example Site",    // The name of the site from the websites table
                "site_url": "https://example.com", // The URL of the site from the websites table
                "requested_url": "https://target.com/page", // The requested URL for the link
                "link_text": "Example Link",    // The text for the hyperlink
                "price": "100.00",             // The price of the order
                "status": "pending",           // The status of the order
                "notes": "Please follow guidelines", // Additional notes for the order
                "created_at": "2025-01-16 12:34:56" // The creation timestamp of the order
            },
            {
                "id": 2,
                "site_name": "Another Site",
                "site_url": "https://another.com",
                "requested_url": "https://target.com/blog",
                "link_text": "Another Link",
                "price": "150.00",
                "status": "pending",
                "notes": null,
                "created_at": "2025-01-15 10:22:33"
            }
        ]
        */
    }

    public function getAllCategories()
    {
        $categories = Category::select('id', 'name')
            ->where('status', '1')
            ->orderBy('name')
            ->get();

        return response()->json($categories);
    }

    public function getAllWebsites(Request $request)
    {
        $query = Website::with('categories');

        // Apply filters
        if ($request->has('filters')) {
            $filters = $request->filters;

            // Category filter
            if (!empty($filters['categories'])) {
                $query->whereHas('categories', function ($q) use ($filters) {
                    $q->whereIn('categories.id', $filters['categories']);
                });
            }

            // Traffic filter
            if (isset($filters['traffic'])) {
                $query->whereBetween('monthly_traffic', [
                    $filters['traffic']['min'],
                    $filters['traffic']['max']
                ]);
            }

            // DA filter
            if (isset($filters['da'])) {
                $query->whereBetween('domain_authority', [
                    $filters['da']['min'],
                    $filters['da']['max']
                ]);
            }

            // DR filter
            if (isset($filters['dr'])) {
                $query->whereBetween('domain_rating', [
                    $filters['dr']['min'],
                    $filters['dr']['max']
                ]);
            }

            // Price filter
            if (isset($filters['price'])) {
                $query->whereBetween('price', [
                    $filters['price']['min'],
                    $filters['price']['max']
                ]);
            }
        }

        // Handle pagination
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);

        // Get total count for pagination
        $totalCount = $query->count();

        // Get paginated results
        $websites = $query->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get()
            ->map(function ($website) {
                return [
                    'id' => $website->id,
                    // 'name' => $website->name,
                    'masked_url' => $website->masked_url,
                    'monthly_traffic' => $website->monthly_traffic,
                    'domain_authority' => $website->domain_authority,
                    'domain_rating' => $website->domain_rating,
                    'price' => $website->price,
                    'allowed_link_types' => $website->allowed_link_types,
                    'categories' => $website->categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name
                        ];
                    })
                ];
            });

        return response()->json([
            'data' => $websites,
            'meta' => [
                'total' => $totalCount,
                'page' => $page,
                'perPage' => $perPage,
                'lastPage' => ceil($totalCount / $perPage)
            ]
        ]);
    }

    public function getAllWebsitesDashboard(Request $request)
    {
        $query = Website::with('categories');

        // Apply filters
        if ($request->has('filters')) {
            $filters = $request->filters;

            // Category filter
            if (!empty($filters['categories'])) {
                $query->whereHas('categories', function ($q) use ($filters) {
                    $q->whereIn('categories.id', $filters['categories']);
                });
            }

            // Traffic filter
            if (isset($filters['traffic'])) {
                $query->whereBetween('monthly_traffic', [
                    $filters['traffic']['min'],
                    $filters['traffic']['max']
                ]);
            }

            // DA filter
            if (isset($filters['da'])) {
                $query->whereBetween('domain_authority', [
                    $filters['da']['min'],
                    $filters['da']['max']
                ]);
            }

            // DR filter
            if (isset($filters['dr'])) {
                $query->whereBetween('domain_rating', [
                    $filters['dr']['min'],
                    $filters['dr']['max']
                ]);
            }

            // Price filter
            if (isset($filters['price'])) {
                $query->whereBetween('price', [
                    $filters['price']['min'],
                    $filters['price']['max']
                ]);
            }
        }

        // Handle pagination
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);

        // Get total count for pagination
        $totalCount = $query->count();

        // Get paginated results
        $websites = $query->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get()
            ->map(function ($website) {
                return [
                    'id' => $website->id,
                    // 'name' => $website->name,
                    'masked_url' => $website->url,
                    'monthly_traffic' => $website->monthly_traffic,
                    'domain_authority' => $website->domain_authority,
                    'domain_rating' => $website->domain_rating,
                    'price' => $website->price,
                    'allowed_link_types' => $website->allowed_link_types,
                    'categories' => $website->categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name
                        ];
                    })
                ];
            });

        return response()->json([
            'data' => $websites,
            'meta' => [
                'total' => $totalCount,
                'page' => $page,
                'perPage' => $perPage,
                'lastPage' => ceil($totalCount / $perPage)
            ]
        ]);
    }

    //The monthly price has been implemented in this
    public function getAllWebsitesDashboardWithMonthlyPrice(Request $request)
    {
        $query = Website::with('categories');

        // Apply filters
        if ($request->has('filters')) {
            $filters = $request->filters;

            // Category filter
            if (!empty($filters['categories'])) {
                $query->whereHas('categories', function ($q) use ($filters) {
                    $q->whereIn('categories.id', $filters['categories']);
                });
            }

            // Traffic filter
            if (isset($filters['traffic'])) {
                $query->whereBetween('monthly_traffic', [
                    $filters['traffic']['min'],
                    $filters['traffic']['max']
                ]);
            }

            // DA filter
            if (isset($filters['da'])) {
                $query->whereBetween('domain_authority', [
                    $filters['da']['min'],
                    $filters['da']['max']
                ]);
            }

            // DR filter
            if (isset($filters['dr'])) {
                $query->whereBetween('domain_rating', [
                    $filters['dr']['min'],
                    $filters['dr']['max']
                ]);
            }

            // Monthly Price filter
            if (isset($filters['monthly_price'])) {
                $query->whereBetween('monthly_price', [
                    $filters['monthly_price']['min'],
                    $filters['monthly_price']['max']
                ]);
            }

            // Price filter
            if (isset($filters['price'])) {
                $query->whereBetween('price', [
                    $filters['price']['min'],
                    $filters['price']['max']
                ]);
            }
        }

        // Handle pagination
        $perPage = $request->input('perPage', 10);
        $page = $request->input('page', 1);

        // Get total count for pagination
        $totalCount = $query->count();

        // Get paginated results
        $websites = $query->skip(($page - 1) * $perPage)
            ->take($perPage)
            ->get()
            ->map(function ($website) {
                return [
                    'id' => $website->id,
                    // 'name' => $website->name,
                    'masked_url' => $website->masked_url,
                    'monthly_traffic' => $website->monthly_traffic,
                    'domain_authority' => $website->domain_authority,
                    'domain_rating' => $website->domain_rating,
                    'monthly_price' => $website->monthly_price, // Add this line
                    'price' => $website->price,
                    'allowed_link_types' => $website->allowed_link_types,
                    'categories' => $website->categories->map(function ($category) {
                        return [
                            'id' => $category->id,
                            'name' => $category->name
                        ];
                    })
                ];
            });

        // dd($websites);

        return response()->json([
            'data' => $websites,
            'meta' => [
                'total' => $totalCount,
                'page' => $page,
                'perPage' => $perPage,
                'lastPage' => ceil($totalCount / $perPage)
            ]
        ]);
    }
}
