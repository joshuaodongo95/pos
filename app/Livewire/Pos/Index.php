<?php

namespace App\Livewire\Pos;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $product,$quantityCount=1;

    public function addToCart($product_id){

        $product = Product::findOrFail($product_id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->selling_price,
            'quantity' => $this->quantityCount,
            'attributes' => array(
                'image' => $product->image,
            )
        ]);

        // session()->flash('message', ' Item added to cart successfully');
        // $this->dispatchBrowserEvent('message', [
        //     'text' => 'Item added to cart successfully',
        //     'type' => 'success',
        //     'status'=> 200
        // ]);

    }

    public function removeFromCart($product_id){

        \Cart::remove($product_id);
        // session()->flash('success', 'Item removed from cart!');
        // $this->dispatchBrowserEvent('message', [
        //     'text' => 'Item removed from cart!',
        //     'type' => 'success',
        //     'status'=> 200
        // ]);
    }

    public function render()
    {
        $products = Product::all();
        $items = \Cart::getContent();

        return view('livewire.pos.index',
        [
            'products'=> $products,
            'items' =>$items
        ]);
    }
}
