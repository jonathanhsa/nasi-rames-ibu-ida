<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('welcome', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'menus' => 'required|array',
            'menus.*' => 'integer|min:0',
        ]);

        $order = DB::transaction(function () use ($request) {
            $total_price = 0;
            $items = [];

            foreach ($request->menus as $menu_id => $quantity) {
                if ($quantity > 0) {
                    $menu = Menu::find($menu_id);
                    if ($menu) {
                        $price = $menu->price * $quantity;
                        $total_price += $price;
                        $items[] = [
                            'menu_id' => $menu_id,
                            'quantity' => $quantity,
                            'price' => $menu->price,
                        ];
                    }
                }
            }

            if (empty($items)) {
                return redirect()->back()->withErrors(['menus' => 'Silakan pilih setidaknya satu menu.']);
            }

            $order = Order::create([
                'customer_name' => $request->customer_name,
                'customer_phone' => $request->customer_phone,
                'total_price' => $total_price,
                'status' => 'pending',
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_id' => $item['menu_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }

            return $order;
        });

        if ($order instanceof \Illuminate\Http\RedirectResponse) {
            return $order;
        }

        return redirect()->route('order.show', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show($id)
    {
        $order = Order::with('items.menu')->findOrFail($id);
        return view('order_show', compact('order'));
    }
}
