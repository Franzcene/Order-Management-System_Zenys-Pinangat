<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $recentOrders = Order::latest()  // Sort orders by the latest (created_at)
                                ->take(10)  // Limit to the 5 most recent orders
                                ->get();

        $recentSales = Order::latest()  // Sort orders by the latest (created_at)
                                ->take(10)  // Limit to the 10 most recent sales
                                ->get();


        // Customers for today
        $customersToday = User::whereDate('created_at', Carbon::today())->count();
        $increaseToday = $this->calculateCustomerIncrease('today');

        // Customers for this month
        $customersThisMonth = User::whereMonth('created_at', Carbon::now()->month)
                                ->whereYear('created_at', Carbon::now()->year)
                                ->count();
        $increaseMonth = $this->calculateCustomerIncrease('month');

        // Customers for this year
        $customersThisYear = User::whereYear('created_at', Carbon::now()->year)->count();
        $increaseYear = $this->calculateCustomerIncrease('year');



        // Total sales today
        $salesToday = Order::whereDate('created_at', Carbon::today())->sum('total_amount');

        // Total sales this month
        $salesMonth = Order::whereMonth('created_at', Carbon::now()->month)->sum('total_amount');

        // Total sales this year
        $salesYear = Order::whereYear('created_at', Carbon::now()->year)->sum('total_amount');

        // Retrieve the latest 10 orders
        $latestOrders = Order::latest()->take(10)->get();

        // Pass all the data to the view
        return view('dashboard', [
            'recentOrders' => $recentOrders,
            'recentSales' => $recentSales,
            'customersToday' => $customersToday,
            'customersThisMonth' => $customersThisMonth,
            'customersThisYear' => $customersThisYear,
            'increaseToday' => $increaseToday,
            'increaseMonth' => $increaseMonth,
            'increaseYear' => $increaseYear,
            'salesToday' => $salesToday,
            'salesMonth' => $salesMonth,
            'salesYear' => $salesYear,
            'latestOrders' => $latestOrders,
        ]);
    }

    // Custom function to calculate percentage increase
    private function calculateCustomerIncrease($period)
    {
        $currentCustomers = 0;
        $previousCustomers = 0;

        switch ($period) {
            case 'today':
                $currentCustomers = User::whereDate('created_at', Carbon::today())->count();
                $previousCustomers = User::whereDate('created_at', Carbon::yesterday())->count();
                break;

            case 'month':
                $currentCustomers = User::whereMonth('created_at', Carbon::now()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->count();
                $previousCustomers = User::whereMonth('created_at', Carbon::now()->subMonth()->month)
                                        ->whereYear('created_at', Carbon::now()->year)
                                        ->count();
                break;

            case 'year':
                $currentCustomers = User::whereYear('created_at', Carbon::now()->year)->count();
                $previousCustomers = User::whereYear('created_at', Carbon::now()->subYear()->year)->count();
                break;
        }

        // Avoid division by zero and calculate percentage increase
        if ($previousCustomers > 0) {
            return (($currentCustomers - $previousCustomers) / $previousCustomers) * 100;
        }

        return 0; // No increase if no previous customers
    }
}
