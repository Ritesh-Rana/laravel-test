<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Orders</title>
    <style>
        .center{ text-align: center;}
    </style>
</head>
<body>
    <h1 class="center">Orders</h1>
    <style>
    .order-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-table th,
    .order-table td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .order-table thead th {
        background-color: #f2f2f2;
    }

    .order-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>

<table class="order-table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Customer Email</th>
            <th>Created At</th>
            <th>Total Price</th>
            <th>Payment Gateway</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->customer->email }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->total_price }}</td>
                <td>{{ $order->gateway }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


</body>
</html>