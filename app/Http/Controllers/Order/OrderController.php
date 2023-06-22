<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'order_items' => 'required|array',
            'order_items.*.menu_id' => 'required|exists:menus,id',
            'order_items.*.quantity' => 'required|integer|min:1',
        ]);

        // dd($validatedData);
        // Membuat order baru
        $order = Order::create([
            'user_id' => auth()->user()->id, // Ubah dengan logic yang sesuai
            'status' => 'pending', // Ubah dengan status yang sesuai
            'total' => 0, // Total harga akan dihitung nanti
        ]);

        // Memproses setiap item order
        foreach ($validatedData['order_items'] as $orderItemData) {
            $menu = Menu::find($orderItemData['menu_id']);
            $quantity = $orderItemData['quantity'];

            // Membuat order item
            $orderItem = new OrderItem([
                'menu_id' => $menu->id,
                'quantity' => $quantity,
                'price' => $menu->price,
            ]);

            $order->orderItems()->save($orderItem);
        }

        // Menghitung total harga
        $order->refresh(); // Memperbarui data order dari database

        $totalPrice = $order->orderItems->sum(function ($orderItem) {
            return $orderItem->price * $orderItem->quantity;
        });

        $order->total = $totalPrice;
        $order->save();

        // Mengembalikan respon yang sesuai
        return response()->json(['message' => 'Order created successfully']);
    }

    public function showAllOrders()
    {
        $userId = auth()->user()->id;

        // Mengambil seluruh Order yang memiliki user_id yang sama dengan Auth::id()
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->get();

        return view('buyer.nota', ['orders' => $orders]);
    }

    public function showPendingOrdersWithUserInfo()
    {
        // Mengambil seluruh Order yang memiliki status "pending"
        $orders = Order::with('user', 'orderItems.menu')->where('status', 'pending')->get();

        return view('employee.index', ['orders' => $orders]);
    }

    public function acceptOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'accepted';
        $order->save();

        return redirect()->route('orders.pending')->with('success', 'Order has been accepted.');
    }

    public function rejectOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'rejected';
        $order->save();

        return redirect()->route('orders.pending')->with('error', 'Order has been rejected.');
    }
}
