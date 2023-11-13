<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PDF;

class AdminOrderController extends Controller
{
    private $orders, $order;

    public function index()
    {
        $this->orders = Order::orderBy('id', 'desc')->get();
       return view('admin.order.index', ['orders' => $this->orders]);
    }

    public function detail($id)
    {
        $this->order = Order::find($id);
        return view('admin.order.detail', ['order' => $this->order]);
    }

    public function edit($id)
    {
        $this->order = Order::find($id);
        if ($this->order->order_status == 'Complete')
        {
            return back()->with('message', 'Sorry ... this order can not be deleted.');
        }
        return view('admin.order.edit', ['order' => $this->order]);
    }

    public function update(Request $request, $id)
    {
        $this->order = Order::find($id);
        if ($request->order_status == 'Pending')
        {
            $this->order->order_status = $request->order_status;
        }
        elseif($request->order_status == 'Cancel')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->courier_id = $request->courier_id;

        }
        elseif ($request->order_status == 'Processing')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->delivery_address = $request->delivery_address;
            $this->order->courier_id = $request->courier_id;

        }
        elseif ($request->order_status == 'Complete')
        {
            $this->order->order_status = $request->order_status;
            $this->order->delivery_status = $request->order_status;
            $this->order->payment_status = $request->order_status;
            $this->order->payment_amount = $this->order->order_total;
        }
        $this->order->save();
        return redirect('/admin/all-order')->with('message', 'Order info update successfully.');
    }

    public function invoice($id)
    {
        $this->order = Order::find($id);
        return view('admin.order.invoice', ['order' => $this->order]);
    }


    public function downloadInvoice($id)
    {
        $this->order = Order::find($id);
        $pdf = PDF::loadView('admin.order.download', ['order' => $this->order]);
        return $pdf->stream('invoice-'.$id.'.pdf');
    }

    public function delete($id)
    {
        if (Order::find($id)->order_status == 'Cancel')
        {
            Order::deleteOrder($id);
            OrderDetail::deleteOrderDetail($id);
            return back()->with('message', 'Order info delete successfully');
        }
      return back()->with('message', 'Sorry ... this order can not be delete');
    }
}
