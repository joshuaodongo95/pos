<?php

namespace App\Http\Livewire\Checkout;

use Livewire\Component;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMode;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Show extends Component
{
    public $firstName,$lastName, $email, $phone, $address, $address2, $zipcode, $payment_method;
    
    protected function rules()
    {
        return [

            'firstName' => 'required|string|max:50',
            'lastName' => 'required|string|max:50',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'address' => 'required|string|max:500',
            'zipcode' => 'required|integer',
            'payment_method' => 'required'
        ];
    }

    public function placeOrder()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'Depo'.Str::random(10),
            'fullname' => $this->firstName.' '.$this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'address2' => $this->address2,
            'pincode' => $this->zipcode,
            'status_message' => 'in progess',
            'payment_method' => $this->payment_method,
            'payment_id' => ''
        ]);


        foreach(\Cart::getContent() as $item){

            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id'=>$item->id,
                'product_color_id' => NULL,
                'quantity' => $item->quantity,
                'price' => $item->price
    
            ]);
        }

        \Cart::clear();

        $this->dispatchBrowserEvent('message', [
            'text' => 'Order placed successfully',
            'type' => 'success',
            'status'=> 200
        ]);

        return redirect()->to('thanks');

    }


    public function render()
    {
        $payms = PaymentMode::all();
        return view('livewire.checkout.show',compact('payms'));
    }
}

