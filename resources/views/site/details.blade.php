@extends('layout.default')
@section('title', 'ProductDetails')
    
@section('content')

<section class="text-gray-600 overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="{{ Storage::url($product->image) }}">
            <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{$product->name}}</h1>
                <p class="leading-relaxed">{{$product->description}}</p>

                @if($product->stock)
                <div class="my-3">
                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">{{$product->stock}} 在庫あり</span>
                    
                </div>
                    
                @else
                <div class="my-3">
                    <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-red-100 text-red-800">{{$product->stock}} 在庫無し</span>
                </div>

                @endif
                
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex border-t-2 border-gray-100 mt-6 pt-6">
                        <span class="title-font font-medium text-2xl text-gray-900">￥{{number_format($product->price, 0, '', '.')}}</span>
                        <button type="submit" class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">買う</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection