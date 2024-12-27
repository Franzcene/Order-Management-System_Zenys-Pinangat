<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeny's Pinangat Income Statement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 20px;
        }

        header {
            line-height: .2;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            text-align: center;
        }

        h1 {
            font-size: 22px;
            text-align: center;
            margin: 0;
        }

        h2 {
            font-size: 18px;
            text-align: center;
            margin: 5px 0;
        }

        h3 {
            font-size: 16px;
            text-align: center;
            margin: 10px 0 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

    </style>
</head>
<body>
        <header>
            <h4>Zeny's Pinangat</h4>
            <p>Income Statement</p>
            <p>For the month ended {{ $monthWord }} {{ $year }}</p>
        </header>

        <table>
            <tr>
                <th>Description</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <th>Revenue:</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Sales Revenue</td>
                <td></td>
                <td class="text-right">{{ $salesRevenue}}</td>
            </tr>
            <tr>
                <th>Expenses:</th>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Inventory Materials</td>
                <td class="text-right">{{ $inventoryMaterials }}</td>
                <td></td>
            </tr>
            <tr>
                <td>Salaries Expense</td>
                <td class="text-right">{{ $salaryDebit }}</td>
                <td></td>
            </tr>
            <tr>
                <th>Net Income</th>
                <td></td>
                <td class="text-right"><strong>{{ $netIncome }}</strong></td>
            </tr>
        </table>
</body>
</html>
