<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class NotificationController extends Controller
{
    public function index()
    {

        $latestOrders = Order::latest()->take(20)->get();
        return view('notifications', compact('latestOrders'));
    }
}
