<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
    */
    public function create()
    {
        $items = \Cart::getContent();
        return view('pos.orders.create',compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        $validated = $request->validated();
        $order = new Order;
        $orderItem = new OrderItem; 

        $items = \Cart::getContent();

        $order->customer_name = $validated['customer_name'];
        $order->customer_phone = $validated['customer_phone'];
        $order->customer_email = $request->customer_email;
        $order->customer_address = $validated['customer_address'];
        $order->total_price = \Cart::getTotal();
        $order->status = 'pending';
        $order->user_id = auth()->user()->id;
        $order->save();

        foreach($items as $item  ){
            
            OrderItem::create(['order_id' => $order->id,
            'product_id' => $item->id,
            'name' => $item->name,
            'price' => $item->price,
            'quantity' => $item->quantity
            ]);
        }
        
        \Cart::clear();

        return redirect('/pos/orders')->with('success','Product added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
