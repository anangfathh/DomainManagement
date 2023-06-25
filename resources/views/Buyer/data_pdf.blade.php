<!DOCTYPE html>
<html>
<head>
    <style>
        /* Gaya CSS untuk tampilan PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        h1 {
            margin-bottom: 50px;
        }
    </style>
</head>
<body>
    <h1>SixResto</h1>
    <h3>Nota</h3>
    <p>Order Id : {{ $order->id }}</p>
    <p>Name : {{ $order->user->name }}</p>
    <p>Date : {{ $order->created_at->formatLocalized('%A, %d-%m-%Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>Menu</th>
                <th>Quantity</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->menu_name }}</td>
                <td>{{ $orderItem->quantity }}</td>
                <td>{{ $orderItem->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total : {{ $order->total }}</p>
</body>
</html>