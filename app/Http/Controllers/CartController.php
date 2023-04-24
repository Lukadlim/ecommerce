<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class CartController extends Controller
{
    public function addCart(Request $request)
    { 
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'image' =>  "$request->image",
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('site.cart');
    }

    public function cartList()
    {
        $items = \Cart::getContent();

        return view('site.cart', compact('items'));
    }
}
