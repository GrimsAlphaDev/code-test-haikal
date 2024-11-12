<!-- resources/views/customer/order/invoice.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #e2e8f0;
            padding: 20px;
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #4a5568;
        }
        .company-info {
            font-size: 0.875rem;
            color: #4a5568;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #2d3748;
        }
        .customer-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .customer-info div {
            font-size: 0.875rem;
            color: #4a5568;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #e2e8f0;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f7fafc;
            font-weight: bold;
            color: #2d3748;
        }
        .total-section {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }
        .total-section div {
            text-align: right;
            width: 250px;
        }
        .footer {
            text-align: center;
            font-size: 0.75rem;
            color: #718096;
            margin-top: 20px;
            border-top: 1px solid #e2e8f0;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <div class="company-info">
                <h2>{{ config('app.name') }}</h2>
                <p>Catering Service</p>
                <p>Address: Jl. Your Company Address</p>
                <p>Phone: +62 123 4567 890</p>
            </div>
            <div class="invoice-details">
                <h1>INVOICE</h1>
                <p>Invoice Number: #{{ $order->id }}</p>
                <p>Date: {{ $order->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="customer-info">
            <div>
                <h3>Bill To:</h3>
                <p>{{ $order->customer->name }}</p>
                <p>{{ $order->customer->email }}</p>
                <p>{{ $order->customer->phone }}</p>
            </div>
            <div>
                <h3>Delivery Details:</h3>
                <p>{{ $order->delivery_address }}</p>
                <p>Delivery Date: {{ $order->delivery_date }}</p>
                <p>Delivery Time: {{ $order->delivery_time }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->pivot->quantity }}</td>
                        <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($menu->price * $menu->pivot->quantity, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total-section">
            <div>
                <p>Subtotal: Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
                <p>Service Fee (10%): Rp {{ number_format($totalPrice * 0.1, 0, ',', '.') }}</p>
                <p>Delivery Fee: Rp {{ number_format(10000, 0, ',', '.') }}</p>
                <h3>Total: Rp {{ number_format($totalPrice + ($totalPrice * 0.1) + 10000, 0, ',', '.') }}</h3>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for your order!</p>
            <p>For any questions, please contact our customer service.</p>
        </div>
    </div>
</body>
</html>