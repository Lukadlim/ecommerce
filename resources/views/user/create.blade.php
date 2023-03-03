@extends('layout.default')
@section('title', 'CreateUser')

@section('content')

    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-2/4 w-full mx-auto overflow-auto">
            <div class="flex flex-wrap">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <form action="" method="post">
                            @csrf
                            <label for="firstname">First name: </label> <br>
                            <input type="text" name="firstname" id="firstname" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"> <br>

                            

                            <label for="lastname">Last name: </label> <br>
                            <input type="text" name="lastname" id="lastname"> <br>
                            <label for="email">Email: </label> <br>
                            <input type="email" name="email" id="email"> <br>
                            <label for="password">Password: </label> <br>
                            <input type="password" name="password" id="password"> <br>
                            <button type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection