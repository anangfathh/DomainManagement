<?php

namespace App\Http\Controllers\Order;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Dompdf\Dompdf;
use Dompdf\Options;

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
                'menu_name' => $menu->name,
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
        $this->authorize('IsBuyer');
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

    public function showAcceptedOrdersWithUserInfo()
    {
        $this->authorize('access-kitchen');
        // Mengambil seluruh Order yang memiliki status "pending"
        $orders = Order::with('user', 'orderItems.menu')->where('status', 'accepted')->get();

        return view('employee.accepted', ['orders' => $orders]);
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

    public function doneOrder($id)
    {
        $this->authorize('');
        $order = Order::findOrFail($id);
        $order->status = 'done';
        $order->save();

        return redirect()->route('orders.accepted')->with('success', 'Order Telah Selesai di Proses.');
    }

    public function downloadNota($id)
    {
        $order = Order::with('user', 'orderItems.menu')->where('id', $id)->first();

        $options = new Options();
        $options->set('defaultFont', 'Arial');

        $dompdf = new Dompdf($options);

        $pdfContent = view('buyer.data_pdf', compact('order'));

        // Memasukkan konten ke Dompdf
        $dompdf->loadHtml($pdfContent);

        // Render konten menjadi file PDF
        $dompdf->render();

        // Menghasilkan nama file PDF
        $fileName = 'NotaSixResto.pdf';

        // Menyimpan file PDF ke server
        $dompdf->stream($fileName, ['Attachment' => true]);
    }
}
