<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Product;

class Show extends Component
{
    public $quantityCount = 1;

    public function decrementQty($item_id){

        \Cart::update($item_id,[
            'quantity'=> -1
        ]);
    }

    public function incrementQty($item_id){

        \Cart::update($item_id,[
            'quantity' => +1
        ]);    
    }

    public function addToCart($product_id){
        $product = Product::findOrFail($product_id);

        \Cart::session(auth()->user()->id)->add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->selling_price,
            'quantity' => $this->quantityCount,
            'attributes' => array(
                'image' => $product->image,
            )
        ]);

        session()->flash('success', 'Item added cart!');
        // $this->dispatchBrowserEvent('message', [
        //     'text' => 'Item added to cart!',
        //     'type' => 'success',
        //     'status'=> 200
        // ]);
    }

    public function removeFromCart($product_id){

        \Cart::remove($product_id);
        
        session()->flash('success', 'Item removed from cart !');
        // $this->dispatchBrowserEvent('message', [
        //     'text' => 'Item removed from cart !',
        //     'type' => 'success',
        //     'status'=> 200
        // ]);

        $this->dispatch('updateCart');
    }

    public function clearCart()
    {
        \Cart::clear();

        session()->flash('success', 'Cart cleared Successfully!');

        // $this->dispatchBrowserEvent('message', [
        //     'text' => 'Cart cleared successfully',
        //     'type' => 'success',
        //     'status'=> 200
        // ]);
    }

    public function render()
    {
        $items = \Cart::getContent();
        $products = Product::all();

        return view('livewire.cart.show',compact('items','products'));
    }
}

