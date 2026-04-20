<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Ingredient;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $ingredients = Ingredient::all();
        $orders = Order::with('items.menu')->orderBy('created_at', 'desc')->get();
        
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total_price');
        $totalOrders = Order::count();

        return view('admin.dashboard', compact('menus', 'ingredients', 'orders', 'totalRevenue', 'totalOrders'));
    }

    public function storeMenu(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|url',
        ]);

        Menu::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function storeIngredient(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
        ]);

        Ingredient::create($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Bahan berhasil ditambahkan.');
    }
}
