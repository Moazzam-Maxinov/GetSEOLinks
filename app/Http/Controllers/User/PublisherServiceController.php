<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PublisherOrder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PublisherServiceController extends Controller
{
    public function newPublisherOrders()
    {
        // // Get the current authenticated user
        // $user = Auth::user();

        // // Fetch orders where the user is either `ordered_by` or `ordered_to`
        // $orders = PublisherOrder::where('ordered_by', $user->id)
        //     ->orWhere('ordered_to', $user->id)
        //     ->where('status', 'pending') // Optional: Filter only pending orders
        //     ->get();
        // // dd($orders);
        // return view("user.publisher-new-orders", compact('orders'));
        return view("user.publisher-new-orders");
    }

    public function allPublisherOrders()
    {
        return view("user.publisher-all-orders");
    }


    //pending->inprogress->completed(needs to provide published link)->waiting for approval from vendor->if accepted then waiting for payment else if rejected check reason for rejection and again set completed
    public function manageOrder(Request $request)
    {
        $orderId = $request->query('orderId');

        if (!$orderId) {
            abort(404, 'Order ID not provided.');
        }

        $order = PublisherOrder::with('site')->findOrFail($orderId);

        return view('user.manage-order', compact('order'));
    }



    //API endpoints
    public function getNewPublisherOrders()
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

    //API endpoints
    public function getAllPublisherOrders()
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
}
