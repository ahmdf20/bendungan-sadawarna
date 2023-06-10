<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("home.index", [
            "title" => "Desa Sadawarna",
        ]);
    }

    public function visitor(Request $request)
    {
        if ($request->search) {
            $visitors = DB::table('visitors')
                ->where('name', 'LIKE', "%$request->search%")
                ->orWhere('age', 'LIKE', "%$request->search%")
                ->orWhere('address', 'LIKE', "%$request->search%")->orderBy('id', 'desc')->paginate(15);
        } else {
            $visitors = DB::table('visitors')->orderBy('id', 'desc')->paginate(15);
        }
        return view('home.visitor', [
            'title' => 'Desa Sadawarna | Pengunjung',
            'visitors' => $visitors
        ]);
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
}
