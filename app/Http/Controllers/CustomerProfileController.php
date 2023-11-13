<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerProfileController extends Controller
{
    private $orders, $order;

    public function index()
    {
        return view('customer.dashboard');
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function order()
    {
        $this->orders = Order::where('customer_id', Session::get('customer_id'))->get();
        return view('customer.order', ['orders' =>  $this->orders]);
    }

    public function orderDetail($id)
    {
        $this->order = Order::find($id);
        return view('customer.order-detail',['order' => $this->order]);
    }

    public function payment()
    {
        return view('customer.payment');
    }

    public function changePassword()
    {
        return view('customer.change-password');
    }
}
