<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate([
            'lastname' => 'required|regex:/^[a-zA-Zぁ-んァ-ヶｱ-ﾝﾞﾟ一-龠]*$/',
            'firstname' => 'required|regex:/^[a-zA-Zぁ-んァ-ヶｱ-ﾝﾞﾟ一-龠]*$/',
            'email' => 'unique:users|required',
            'password' => 'required'
        ], [
            'lastname.regex' => '姓に文字しか入力しないでください',
            'firstname.regex' => '名に文字しか入力しないでください'
        ]
        );

        $user = $request->all();

        $user['password'] = bcrypt($request->password);

        $user = User::create($user);

        Auth::login($user);

        return Redirect::route('site.home');
    }

    public function auth(Request $request)
    {
        $data = $request->all();

        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password']])){
            $request->session()->regenerate();
            return Redirect::route('site.home');
        } else {
            return Redirect::back()->with('error', 'メールアドレスまたはパスワードが違います');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::route('site.home');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
