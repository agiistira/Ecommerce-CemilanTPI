<?php

namespace App\Http\Livewire;

use Cart;
use App\Models\Order;
use Livewire\Component;
use App\Models\Shipping;
use App\Models\OrderItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class CheckoutComponent extends Component
{
    public $ship_to_different;

    public $firstname;
    public $lastname;
    public $mobile;
    public $email;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $Zipcode;
    public $metode;

    public $s_firstname;
    public $s_lastname;
    public $s_mobile;
    public $s_email;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_Zipcode;
    public $s_metode;

    public $paymentmode;
    public $thankyou;

    public function update($fields)
    {
        $this->validateOnly($fields,[
            'firstname' =>'required',
            'lastname' =>'required',
            'mobile' =>'required|numeric',
            'email' =>'required|email',
            'line1' =>'required',
            'line2' =>'required',
            'city' =>'required',
            'province' =>'required',
            'country' =>'required',
            'Zipcode' =>'required',
            'metode' => 'required',
            'paymentmode' => 'required',
        ]);

        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[
                's_firstname' =>'required',
                's_lastname' =>'required',
                's_mobile' =>'required|numeric',
                's_email' =>'required|email',
                's_line1' =>'required',
                's_line2' =>'required',
                's_city' =>'required',
                's_province' =>'required',
                's_country' =>'required',
                's_Zipcode' =>'required',
                's_metode' =>'required',
            ]);
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'firstname' =>'required',
            'lastname' =>'required',
            'mobile' =>'required|numeric',
            'email' =>'required|email',
            'line1' =>'required',
            'line2' =>'required',
            'city' =>'required',
            'province' =>'required',
            'country' =>'required',
            'Zipcode' =>'required',
            'metode' => 'required',
        ]);
//is_shipping_different
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->subtotal = session()->get('checkout')['subtotal'];
        $order->discount = session()->get('checkout')['discount'];
        $order->tax = session()->get('checkout')['tax'];
        $order->total = session()->get('checkout')['total'];
        $order->firstname = $this->firstname;
        $order->lastname = $this->lastname;
        $order->mobile = $this->mobile;
        $order->email = $this->email;
        $order->line1 = $this->line1;
        $order->line2 = $this->line2;
        $order->city = $this->city;
        $order->province = $this->province;
        $order->country = $this->country;
        $order->Zipcode = $this->Zipcode;
        $order->metode = $this->metode;
        $order->status = 'ordered';
        $order->is_shipping_different = $this->ship_to_different ? 1:0;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            //dd($item);
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname' =>'required',
                's_lastname' =>'required',
                's_mobile' =>'required|numeric',
                's_email' =>'required|email',
                's_line1' =>'required',
                's_line2' =>'required',
                's_city' =>'required',
                's_province' =>'required',
                's_country' =>'required',
                's_Zipcode' =>'required',
                's_metode' =>'required'
                
            ]);

            $shipping = new Shipping();
            $shipping->order_id = $order->id;
            $shipping->firstname = $this->s_firstname;
            $shipping->lastname = $this->s_lastname;
            $shipping->mobile = $this->s_mobile;
            $shipping->email = $this->s_email;
            $shipping->line1 = $this->s_line1;
            $shipping->line2 = $this->s_line2;
            $shipping->city = $this->s_city;
            $shipping->province = $this->s_province;
            $shipping->country = $this->s_country;
            $shipping->Zipcode = $this->s_Zipcode;
            $shipping->metode= $this->s_metode;
            $shipping->save();
        }
       

        if($this->paymentmode == 'cod')
        {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = 'COD';
            $transaction->status = 'pending';
            $transaction->save();
        }
     
        $this->thankyou = 1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }
    
    public function verifyForCheckout()
    {
        if(!Auth::check())
        {
            return redirect()->route('login');
        }
        elseif($this->thankyou)
        {
            return redirect()->route('thankyou');
        }
        elseif(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }
    public function render()
    {
        $this->verifyForCheckout();
        return view('livewire.checkout-component')->layout("layouts.base");
    }
}
