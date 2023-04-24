@extends('layout.default')
@section('title', 'AdminProducts')

@section('content')
<section class="text-gray-600">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <div class="flex items-center justify-between mb-2">
                <h1 class="text-2xl font-medium title-font mb-2 text-gray-900">カートのアイテム数量 {{ $items->count() }}</h1>
            </div>
            <table class="table-auto w-full text-left whitespace-no-wrap">
                <thead>
                <tr>
                    <th class="px-4 py-3 bg-gray-100"></th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">商品名</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">値段</th>
                    <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 text-right">選択</th>
                </tr>
                </thead>
                <tbody class="divide-y"> 

                    @foreach ($items as $item)
                        {{ dd($item->image) }}

                        <tr>
                            <td class="px-4 py-3">
                                <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="{{ Storage::url($item->image) }}">
                            </td>
                            <td class="px-4 py-3">{{ $item->name }}</td>
                            <td class="px-4 py-3">￥{{number_format($item->price, 0, '', '.')}}</td>
                            <td class="px-4 py-3 text-sm text-right space-x-3 text-gray-900">
                                <a href="" class="mt-3 text-indigo-500 inline-flex items-center">修正</a>

                                <form action="" method="post">
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