<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;

class SalesReportController extends Controller
{
    public function generateReport()
    {
        // Query the sales data
        $salesData = OrderProduct::with('product')
            ->selectRaw('product_id, SUM(order_product.quantity) as total_quantity, SUM(order_product.quantity * products.price) as total_sales')
            ->join('products', 'order_product.product_id', '=', 'products.id')
            ->groupBy('product_id')
            ->get();

        // Format the data into a report
        $report = $salesData->map(function ($item) {
            return [
                'product_name' => $item->product->name,
                'total_quantity' => $item->total_quantity,
                'total_sales' => $item->total_sales,
            ];
        });

        // Load the view and pass the data
        $pdf = PDF::loadView('sales_report', ['salesData' => $report]);

        // Return the generated PDF
        return $pdf->download('sales_report.pdf');
    }
}
