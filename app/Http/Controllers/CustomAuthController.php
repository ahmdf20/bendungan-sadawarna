<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login', [
            'title' => 'Admin Login'
        ]);
    }

    public function credentials(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        $credentials = $request->only(['email', 'password']);
        $user = DB::table('users')->where('email', $request->email)->first();
        if (Auth::attempt($credentials)) {
            session([
                'id' => $user->id,
                'email' => $request->email,
                'name' => $user->name,
            ]);
            return redirect()->route('admin')->with(['message' => "Anda Berhasil Login!, Selamat datang $user->name"]);
        }
        return redirect()->route('login')->with(['message' => 'Email atau password salah!']);
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
        //
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

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login')->with(['message' => "Berhasil Logout! Silahkan Login kembali!"]);
    }
}
