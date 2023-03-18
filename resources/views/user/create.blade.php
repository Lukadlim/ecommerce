@extends('layout.default')
@section('title', 'CreateUser')

@section('content')

<section>
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/4 w-full mx-auto overflow-auto">
            <div class="flex flex-wrap">
                <div class="p-2 w-full">
                    <div class="relative">
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <label for="lastname">姓: </label> <br>
                            <input value="{{ old('lastname') }}" type="text" name="lastname" id="lastname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>

                            <label for="firstname">名: </label> <br>
                            <input value="{{ old('firstname') }}" type="text" name="firstname" id="firstname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>

                            <label for="email">メールアドレス: </label> <br>
                            <input value="{{ old('email') }}" type="email" name="email" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>

                            <label for="password">パスワード: </label> <br>
                            <input type="password" name="password" id="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="text-red-400 text-sm">{{ $error }}</div> <br>
                                @endforeach
                            @endif

                            <div class="p-2 w-full">
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection