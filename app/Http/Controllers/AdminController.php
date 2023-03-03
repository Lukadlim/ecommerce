<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;
use Faker;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products', compact('products'));
    }

    public function indexAdd()
    {
        return view('admin.product_add');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $faker = Faker\Factory::create();

        $product = $request->validated();

        $slug = $faker->unique()->sentence();
        $product['slug'] = Str::slug($request->name . $slug);

        if($request->image){
            $product['image'] = $request->image->store('public');
        }

        Product::create($product);

        return redirect()->route('admin.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product, StoreProductRequest $request)
    {
        $input = $request->validated();

        $faker = Faker\Factory::create();
        $slug = $faker->unique()->sentence();
        $input['slug'] = Str::slug($input['name'] . $slug);

        if(!empty($input['image']) && $input['image']->isValid()){
            Storage::delete($product->image ?? '');
            $input['image'] = $input['image']->store('public');
        }

        $product->fill($input);
        $product->save();

        return redirect::route('admin.products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->image = null;
        $product->delete();

        return Redirect::route('admin.products');
    }

    public function destroyImage($id)
    {
        $product = Product::find($id);

        Storage::delete($product->image ?? '');
        $product->image = null;
        $product->save();

        return redirect::back();
    }
}

