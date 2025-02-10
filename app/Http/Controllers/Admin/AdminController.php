<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Website;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PublisherOrder;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard'); // We'll create this view later
    }

    public function allOrders()
    {
        return view("admin.all-orders");
    }

    public function newOrders()
    {
        return view("admin.new-orders");
    }

    public function completedOrders()
    {
        return view("admin.completed-orders");
    }

    public function manageOrder(Request $request)
    {
        $orderId = $request->query('orderId');

        if (!$orderId) {
            abort(404, 'Order ID not provided.');
        }

        $order = PublisherOrder::with('site')->findOrFail($orderId);

        return view('admin.manage-order', compact('order'));
    }

    /**
     * Show the invoice details page.
     */
    public function showInvoice(Request $request)
    {
        $invoiceId = $request->query('invoiceId');

        // Fetch invoice if invoiceId is provided
        $invoice = Invoice::where('id', $invoiceId)->first();

        return view('admin.invoice', compact('invoice'));
    }

    /**
     * Update the invoice details.
     */
    public function updateInvoice(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,invoice_guid',
            'status' => 'required|in:paid,unpaid,refunded,failed',
            'payment_method' => 'nullable|string|max:100',
            'transaction_id' => 'nullable|string|max:255',
        ]);

        $invoice = Invoice::where('invoice_guid', $request->invoice_id)->firstOrFail();

        // Update invoice fields
        $invoice->status = $request->status;
        $invoice->payment_method = $request->payment_method;
        $invoice->transaction_id = $request->transaction_id;

        // Update paid_at timestamp only if marked as 'paid'
        if ($request->status === 'paid') {
            $invoice->paid_at = Carbon::now();
        } else {
            $invoice->paid_at = null;
        }

        $invoice->save();

        return redirect()->back()->with('success', 'Invoice updated successfully!');
    }


    public function addWebsiteForm()
    {
        // Fetch categories to populate the categories dropdown
        $categories = Category::where('status', 1)->get(); // Fetch only active categories
        // dd($categories);
        return view('admin.add-website', compact('categories'));
    }

    /**
     * Handle form submission to add a new website.
     */
    public function addWebsite(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url|unique:websites,url',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'monthly_traffic' => 'nullable|integer|min:0',
            'domain_rating' => 'nullable|integer|min:0|max:100',
            'domain_authority' => 'nullable|integer|min:0|max:100',
            'spam_score' => 'nullable|numeric|min:0|max:100',
            'turnaround_time' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'language' => 'nullable|string|max:255',
            'quality_score' => 'nullable|integer|min:1|max:5',
            'max_dofollow_links' => 'nullable|integer|min:0',
            'content_guidelines' => 'nullable|string',
            'minimum_word_count' => 'nullable|integer|min:0',
            'allowed_link_types' => 'nullable|array',
            'allowed_link_types.*' => 'in:do-follow,no-follow',
            'payment_methods' => 'nullable|array',
            'payment_methods.*' => 'string',
            'status' => 'required|boolean',
        ]);

        // Generate masked URL (first 3 characters + *)
        // $maskedUrl = substr($validated['url'], 0, 3) . str_repeat('*', strlen($validated['url']) - 3);
        $domain = parse_url($validated['url'], PHP_URL_HOST); // Extract domain name (e.g., "example.com")
        $domainWithoutWww = preg_replace('/^www\./', '', $domain); // Remove "www" prefix if present
        $maskedUrl = substr($domainWithoutWww, 0, 3) . str_repeat('*', strlen($domainWithoutWww) - 3);


        // Store the website in the database
        $website = Website::create([
            'user_id' => Auth::id(), // Assuming the logged-in admin is adding the website
            'name' => $validated['name'],
            'url' => $validated['url'],
            'masked_url' => $maskedUrl,
            // 'category_id' => $validated['category_id'],
            'monthly_traffic' => $validated['monthly_traffic'],
            'domain_rating' => $validated['domain_rating'],
            'domain_authority' => $validated['domain_authority'],
            'spam_score' => $validated['spam_score'],
            'turnaround_time' => $validated['turnaround_time'],
            'price' => $validated['price'],
            'language' => $validated['language'],
            'quality_score' => $validated['quality_score'],
            'max_dofollow_links' => $validated['max_dofollow_links'],
            'content_guidelines' => $validated['content_guidelines'],
            'minimum_word_count' => $validated['minimum_word_count'],
            'allowed_link_types' => $validated['allowed_link_types'] ?? [], // Remove json_encode
            'payment_methods' => $validated['payment_methods'] ?? [],       // Remove json_encode
            'status' => $validated['status'],
            'is_pending_approval' => 0, // Admin-added websites are not pending approval
        ]);

        // Attach categories to the website (update the pivot table)
        $website->categories()->sync($validated['categories']);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Website added successfully!');
    }

    public function viewWebsites()
    {
        // $websites = Website::with('categories')
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(10);

        // return view('admin.view-websites', compact('websites'));
        $categories = Category::where('status', 1)->get();
        $metaTitle = "Websites Listing - Admin Dashboard";
        return view('admin.view-websites', compact('metaTitle', 'categories'));
    }

    public function getWebsites(Request $request)
    {
        try {
            $query = Website::with('categories');

            // Search functionality
            if ($request->filled('search')) {
                $query->where(function ($q) use ($request) {
                    $q->where('name', 'like', "%{$request->search}%")
                        ->orWhere('url', 'like', "%{$request->search}%");
                });
            }

            // Category filtering
            if ($request->filled('categories') && $request->categories !== 'null') {
                $categories = array_filter(explode(',', $request->categories));
                if (!empty($categories)) {
                    $query->whereHas('categories', function ($q) use ($categories) {
                        $q->whereIn('categories.id', $categories);
                    });
                }
            }

            // Traffic range filtering
            if ($request->filled('trafficRange') && $request->trafficRange !== 'null') {
                $range = json_decode($request->trafficRange);
                if ($range && isset($range->min)) {
                    $query->where('monthly_traffic', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('monthly_traffic', '<=', $range->max);
                }
            }

            // DR range filtering
            if ($request->filled('drRange') && $request->drRange !== 'null') {
                $range = json_decode($request->drRange);
                if ($range && isset($range->min)) {
                    $query->where('domain_rating', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('domain_rating', '<=', $range->max);
                }
            }

            // DA range filtering (new)
            if ($request->filled('daRange') && $request->daRange !== 'null') {
                $range = json_decode($request->daRange);
                if ($range && isset($range->min)) {
                    $query->where('domain_authority', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('domain_authority', '<=', $range->max);
                }
            }

            // Price range filtering
            if ($request->filled('priceRange') && $request->priceRange !== 'null') {
                $range = json_decode($request->priceRange);
                if ($range && isset($range->min)) {
                    $query->where('price', '>=', $range->min);
                }
                if ($range && isset($range->max)) {
                    $query->where('price', '<=', $range->max);
                }
            }

            // Order by latest
            $query->latest();

            $websites = $query->paginate(10);

            return response()->json([
                'success' => true,
                'websites' => $websites,
                'message' => 'Websites retrieved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching websites: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error fetching websites',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function showWebsiteDetails($id)
    {
        return view('admin.website-details');
    }

    public function getWebsiteDetails($id)
    {
        $website = Website::with('categories')->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $website
        ]);
    }

    public function fetchDashboardData()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        $pendingOrderCount = PublisherOrder::where('ordered_to', $userId)
            ->where('status', 'pending')
            ->count();

        $totalOrderCount = PublisherOrder::where('ordered_to', $userId)->count();

        $totalCompletedSum = PublisherOrder::where('ordered_to', $userId)
            ->where('status', 'completed')
            ->sum('price');

        $inPprogressOrderCount = PublisherOrder::where('ordered_to', $userId)
            ->where('status', 'inprogress')
            ->count();

        $data = [
            'total_orders' =>  $totalOrderCount,
            'new_orders' => $pendingOrderCount,
            'total_amount_spent' => $totalCompletedSum,
            'inprogress_orders' => $inPprogressOrderCount,
        ];

        return response()->json($data);
    }

    //API endpoints
    public function getAllOrders()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orders with the required fields and join with the websites table
        $orders = PublisherOrder::select(
            'publisher_orders.id',
            'websites.name as site_name',
            'websites.url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.notes',
            'publisher_orders.created_at'
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->where('publisher_orders.ordered_to', $userId)
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

    public function getNewOrders()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orders with the required fields and join with the websites table
        $orders = PublisherOrder::select(
            'publisher_orders.id',
            'websites.name as site_name',
            'websites.url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.notes',
            'publisher_orders.created_at'
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->where('publisher_orders.ordered_to', $userId)
            ->whereIn('publisher_orders.status', ['pending', 'inprogress']) // Optional: Show only pending orders
            ->get();

        // Format the created_at field
        $orders->transform(function ($order) {
            $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y H:i'); // Day-Month-Year and 24-hour time
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

    public function getOrderById(Request $request)
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orderId from the query parameter
        $orderId = $request->query('orderId');

        // Fetch the specific order for the authenticated user with the given orderId
        $order = PublisherOrder::select(
            'publisher_orders.id',
            'websites.name as site_name',
            'websites.url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.notes',
            'publisher_orders.created_at'
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->where([
                ['publisher_orders.ordered_to', '=', $userId],
                ['publisher_orders.id', '=', $orderId]
            ])
            ->first(); // Fetch only one order

        if ($order) {
            // Format the created_at field
            $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y');
        }

        // Return the order as a JSON response
        return response()->json($order);
    }

    public function updateOrderStatus(Request $request)
    {
        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'orderId' => 'required|integer|exists:publisher_orders,id',
                'status' => 'required|string|in:pending,approved,rejected,completed,inprogress', // Ensure valid status
                'rejection_reason' => 'nullable|string', // Optional rejection reason
                'published_link' => 'nullable|url', // Optional published link
            ]);

            $orderId = $validatedData['orderId'];
            $newStatus = $validatedData['status'];
            $rejectionReason = $validatedData['rejection_reason'] ?? null;
            $publishedLink = $validatedData['published_link'] ?? null;

            // Find the order by ID and ensure it exists
            $order = PublisherOrder::findOrFail($orderId);

            // Update the status and handle specific scenarios based on status
            $order->status = $newStatus;

            if ($newStatus == 'completed') {
                // If status is completed, update the published link and the completed timestamp
                $order->published_link = $publishedLink;
                $order->completed_by_publisher_at = now(); // Update the timestamp for completion
            }

            if ($newStatus == 'rejected') {
                // If status is rejected, store the rejection reason and update the rejected timestamp
                $order->rejected_by_publisher_reason = $rejectionReason;
                $order->rejected_at = now(); // Update the timestamp for rejection
            }

            // Save the order with the updated status and additional fields
            $order->save();

            // Return a success response with the updated order details
            return response()->json([
                'success' => true,
                'message' => 'Order status updated successfully',
                'order' => $order
            ], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // public function getCompletedOrders()
    // {
    //     $userId = Auth::id(); // Get the authenticated user's ID

    //     // Fetch the orders with the required fields and join with the websites table
    //     $orders = PublisherOrder::select(
    //         'publisher_orders.id',
    //         'websites.name as site_name',
    //         'websites.url as site_url',
    //         'publisher_orders.requested_url',
    //         'publisher_orders.link_text',
    //         'publisher_orders.price',
    //         'publisher_orders.status',
    //         'publisher_orders.vendor_status',
    //         'publisher_orders.notes',
    //         'publisher_orders.created_at'
    //     )
    //         ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
    //         ->where('publisher_orders.ordered_to', $userId)
    //         ->where('publisher_orders.status', 'completed')
    //         ->get();

    //     // Format the created_at field
    //     $orders->transform(function ($order) {
    //         $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y H:i'); // Day-Month-Year and 24-hour time
    //         return $order;
    //     });
    //     // dd($orders);
    //     // Return the orders as a JSON response
    //     return response()->json($orders);       
    // }

    public function getCompletedOrders()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Fetch the orders with invoice details if available
        $orders = PublisherOrder::select(
            'publisher_orders.id',
            'websites.name as site_name',
            'websites.url as site_url',
            'publisher_orders.requested_url',
            'publisher_orders.link_text',
            'publisher_orders.price',
            'publisher_orders.status',
            'publisher_orders.vendor_status',
            'publisher_orders.notes',
            'publisher_orders.created_at',
            // Invoice details
            'invoices.id as invoice_id',
            // 'invoices.total_amount as invoice_total',
            // 'invoices.status as invoice_status',
            // 'invoices.issued_at as invoice_issued_at',
            // 'invoices.paid_at as invoice_paid_at',
            // 'invoices.payment_method',
            // 'invoices.transaction_id'
        )
            ->join('websites', 'publisher_orders.site_id', '=', 'websites.id')
            ->leftJoin('invoices', 'publisher_orders.id', '=', 'invoices.order_id') // Left join to include invoice details if available
            ->where('publisher_orders.ordered_to', $userId)
            ->where('publisher_orders.status', 'completed')
            ->get();

        // Format created_at and issued_at fields
        $orders->transform(function ($order) {
            $order->created_at = Carbon::parse($order->created_at)->format('d-m-Y H:i');
            if ($order->invoice_issued_at) {
                $order->invoice_issued_at = Carbon::parse($order->invoice_issued_at)->format('d-m-Y H:i');
            }
            if ($order->invoice_paid_at) {
                $order->invoice_paid_at = Carbon::parse($order->invoice_paid_at)->format('d-m-Y H:i');
            }
            return $order;
        });

        // Return the orders as a JSON response
        return response()->json($orders);
    }
}
