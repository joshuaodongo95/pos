<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public function render()
    {
        $cartCount = \Cart::getContent()->count();

        return view('livewire.cart.cart-count',[
            'cartCount' => $cartCount
        ]);
    }
}
