<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>ZENY'S PINANGAT</h1>
    <h2>Sales Report</h2>
    <h2>As of</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Total Quantity</th>
                <th>Total Sales</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($salesData as $data)
                <tr>
                    <td>{{ $data['product_name'] }}</td>
                    <td>{{ $data['total_quantity'] }}</td>
                    <td>{{ $data['total_sales'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
