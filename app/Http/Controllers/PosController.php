<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PosController extends Controller
{
    
    public function index(){
        // $products = Product::all();
        // $cart = \Cart::getContent();
        // return view('pos.index',compact('products','cart'));

        return view('pos.index');
    }

    public function create(){

        $items = \Cart::getContent();
        return view('pos.orders.create',compact('items'));
    }

    public function orders(){
        $orders = Order::where('user_id',Auth()->user()->id)->paginate(10);
        return view('pos.orders.index',compact('orders'));
    }

}
