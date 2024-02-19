<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }

    public function orders()
    {
        $orders = Order::query()->paginate(10);

        return view('admin.orders.orders', compact('orders'));
    }

    public function canceled()
    {
        $orders = Order::where('status', 'canceled')->paginate(10);

        return view('admin.orders.orders_canceled', compact('orders'));
    }

}
