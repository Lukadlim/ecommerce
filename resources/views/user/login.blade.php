@extends('layout.default')
@section('title', 'Login')

@section('content')

<section>
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-1/4 w-full mx-auto overflow-auto">
            <div class="flex flex-wrap">
                <div class="p-2 w-full">
                    <div class="relative">
                        <form action="" method="post">
                            @csrf
                            <label for="email">メールアドレス: </label> <br>
                            <input type="email" name="email" id="email" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>
    
                            <label for="password">パスワード: </label> <br>
                            <input type="password" name="password" id="password" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>
    
                            <div class="p-2 w-full">
                                <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">ログイン</button>
                            </div>
                            <div class="mt-4">
                                <p class="text-gray-400 text-center">アカウントをお持ちでない方</p>
    
                                <div class="p-2 w-full">
                                    <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded"><a href="{{route('user.register')}}">アカウントを新規登録</a></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection