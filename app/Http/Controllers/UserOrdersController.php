<?php

namespace App\Http\Controllers;

use App\Order;

use Illuminate\Http\Request;

class UserOrdersController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $orders = Order::with('status')->where('user_id', $user->id)->get();

        return view('index', compact('user', 'orders'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'address' => 'required',
            'size' => 'required',
        ]);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'size' => $request->size,
            'toppings' => implode(', ', $request->toppings),
            'instructions' => $request->instructions,

        ]);
        return redirect()->route('user.orders.show', $order)->with('message', 'order recieved');
    }

    public function show(Order $order)
    {
        return view('show', compact('order'));
    }
}
