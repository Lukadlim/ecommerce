@extends('layout.default')
@section('title', 'AdminProducts')

@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">商品</h1>
                <a href="{{route('admin.product.add')}}" class="flex ml-auto text-white bg-indigo-500 border-0 py-1.5 px-3 text-sm focus:outline-none hover:bg-indigo-600 rounded">追加</a>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                <tr>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">#</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100" style="width: 150px">イメージ</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">値段</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">在庫</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">選択</th>
                </tr>
                </thead>
                <tbody class="divide-y">

                    @foreach ($products as $product)  
                    
                    <tr>
                        <td class="px-4 py-3">{{$product->id}}</td>
                        <td class="px-4 py-3">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ Storage::url($product->image) }}">
                        </td>
                        <td class="px-4 py-3">{{$product->name}}</td>
                        <td class="px-4 py-3">￥{{number_format($product->price, 0, '', '.')}}</td>
                        <td class="px-4 py-3">{{$product->stock}}</td>
                        <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                            <a href="{{route('admin.product.edit', $product->id)}}" class="mt-3 text-indigo-500 inline-flex items-center">編集</a>

                            <form action="{{route('admin.product.destroy', $product->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="mt-3 text-indigo-500 inline-flex items-center">削除</button>
                            </form>
                        </td>
                    </tr>
                
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection