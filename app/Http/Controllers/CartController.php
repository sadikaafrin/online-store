<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    private $product, $cartProducts;

    public function index(Request $request, $id)
    {
        $this->product = Product::find($id);
        Cart::add([
            'id'        => $id,
            'name'      => $this->product->name,
            'qty'       => $request->qty,
            'price'     => $this->product->selling_price,
            'options'   => [
                'image'  => $this->product->image,
                'brand' => $this->product->brand->name,
                'category' => $this->product->category->name,
            ]
        ]);
        return redirect('/cart/show');
    }

//    public function show()
//    {
//        $this->cartProducts = Cart::content();
//        return view('website.cart.index', ['products' => $this->cartProducts]);
//    }

    public function show()
    {
        $this->cartProducts = Cart::content();

        return view('website.cart.index', ['products' => $this->cartProducts]);
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);
        return back()->with('message', 'Cart product info update successfully.');
    }

    public function close($rowId)
    {
        Cart::remove($rowId);
        return redirect('/cart/show')->with('message', 'Cart product info delete successfully.');


    }
}
