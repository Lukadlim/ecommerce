<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->search . '%')->get();

        return view('site.home', compact('products'));
    }

    public function details($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('site.details', compact('product'));
    }

    // public function details(Product $product)
    // {
    //     return view('site.details', compact('product'));
    // }
}
