<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index', [
            'title' => 'Dashboard Admin',
            'user' => auth()->user(),
            'menu' => ['Dashboard'],
            'visitors' => DB::table('visitors')->get()->all(),
            'posts' => DB::table('posts')->get()->all(),
        ]);
    }

    public function user()
    {
        return view('admin.user', [
            'title' => 'Dashboard Admin | Users',
            'user' => auth()->user(),
            'users' => DB::table('users')->get()->all(),
            'menu' => ['Admin'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin-add', [
            'title' => 'Tambah Admin',
            'user' => auth()->user(),
            'menu' => ['Admin', 'Tambah Admin'],
        ]);
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
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'phone' => 'numeric|required',
            'password' => 'required|min:4'
        ]);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'photo' => 'image/default.png',

        ]);
        return redirect()->route('user')->with(['message' => 'Berhasil membuat data Admin Baru!']);
    }

    public function userShow(User $user)
    {
        return view('admin.admin-detail', [
            'title' => 'Dashboard Admin | Detail Admin',
            'user' => auth()->user(),
            'select_user' => DB::table('users')->where('id', $user->id)->first(),
            'menu' => ['Admin', 'Detail Admin']
        ]);
    }

    public function userEdit($id)
    {
        return view('admin.admin-edit', [
            'title' => 'Dashboard Admin | Edit Admin',
            'user' => auth()->user(),
            'select_user' => DB::table('users')->where('id', $id)->first(),
            'menu' => ['Admin', 'Edit Admin'],
        ]);
    }

    public function userEditPassword($id)
    {
        return view('admin.admin-edit-password', [
            'title' => 'Dashboard Admin | Edit Password Admin',
            'user' => auth()->user(),
            'select_user' => DB::table('users')->where('id', $id)->first(),
            'menu' => ['Admin', 'Ubah Password Admin'],
        ]);
    }

    public function userUpdate(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric'
        ]);
        DB::table('users')->where('id', $user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('user')->with(['message' => "Berhasil mengedit user $user->name"]);
    }

    public function userUpdatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:4',
            'repeat-password' => 'required|same:password'
        ]);

        DB::table('users')->where('id', $user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('user')->with(['message' => "Berhasil mengubah password $user->name"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('admin.profile', [
            'title' => 'Dashboard Admin | Profile',
            'menu' => ['Profile'],
            'user' => auth()->user()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('admin.profile-edit', [
            'title' => 'Dashboard Admin | Edit Profile',
            'menu' => ['Profile', 'Edit Profile'],
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::table('users')->delete($user->id);
        return redirect()->route('user')->with(['message' => "Berhasil menghapus Admin!"]);
    }
}
