<?php

namespace App\Http\Controllers\Views;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
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

    public function order($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.order', compact('order'));
    }


    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);



        // Обновляем статус заказа
        $status = $request->input('status');

        // Используем метод update для обновления статуса заказа
        $order->update(['status' => $status]);

        return redirect()->back()->with('success', 'Статус заказа успешно изменен');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);

        // Удалить заказ
        $order->delete();

        return redirect()->back()->with('success', 'Товар успешно удалён');

    }
}
