{{-- <!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>
</head>

<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p>Details:</p>
    <ul>
        <li>Order ID: {{ $orderDetails['id'] }}</li>
        <li>URL: {{ $orderDetails['url'] }}</li>
        <li>Link Text: {{ $orderDetails['link_text'] }}</li>
        <li>Notes: {{ $orderDetails['notes'] }}</li>
        <li>Website: {{ $orderDetails['website'] }}</li>
        <li>Order Date: {{ $orderDetails['order_date'] }}</li>
    </ul>
</body>

</html> --}}

<!DOCTYPE html>
<html>

<head>
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f2f5;
        }

        .email-container {
            background-color: white;
            border-radius: 12px;
            padding: 0;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .header {
            background-color: #3498db;
            color: white;
            padding: 25px;
            text-align: center;
        }

        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }

        .content {
            padding: 30px;
        }

        .thank-you {
            color: #27ae60;
            font-size: 1.2em;
            text-align: center;
            margin-bottom: 25px;
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }

        .details-card {
            background-color: #ffffff;
            border: 1px solid #e1e4e8;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }

        .details-title {
            color: #2c3e50;
            font-weight: bold;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e1e4e8;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        li {
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
        }

        li:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        li strong {
            color: #6c757d;
        }

        .tracking-section {
            background-color: #f8f9fa;
            padding: 25px;
            text-align: center;
            border-top: 1px solid #e1e4e8;
        }

        .tracking-link {
            display: inline-block;
            background-color: #3498db;
            color: white;
            padding: 14px 30px;
            text-decoration: none;
            border-radius: 25px;
            margin-top: 15px;
            transition: all 0.3s ease;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(52, 152, 219, 0.2);
        }

        .tracking-link:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(52, 152, 219, 0.3);
        }

        .order-value {
            font-weight: normal;
            color: #333;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>Order Confirmation</h1>
        </div>
        <div class="content">
            <p class="thank-you">Thank you for your order!</p>
            <div class="details-card">
                <p class="details-title">Order Details</p>
                <ul>
                    <li>
                        <strong>Order ID:</strong>
                        <span class="order-value">{{ $orderDetails['id'] }}</span>
                    </li>
                    <li>
                        <strong>URL:</strong>
                        <span class="order-value">{{ $orderDetails['url'] }}</span>
                    </li>
                    <li>
                        <strong>Link Text:</strong>
                        <span class="order-value">{{ $orderDetails['link_text'] }}</span>
                    </li>
                    <li>
                        <strong>Notes:</strong>
                        <span class="order-value">{{ $orderDetails['notes'] }}</span>
                    </li>
                    <li>
                        <strong>Website:</strong>
                        <span class="order-value">{{ $orderDetails['website'] }}</span>
                    </li>
                    <li>
                        <strong>Order Date:</strong>
                        <span class="order-value">{{ $orderDetails['order_date'] }}</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tracking-section">
            <p>Want to know the status of your order?</p>
            <a href="https://getseolinks.com/manage-order?orderId={{ $orderDetails['id'] }}" class="tracking-link">Track
                Your Order</a>
        </div>
    </div>
</body>

</html>
