<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->search) {
            $visitors = DB::table('visitors')
                ->where('name', 'LIKE', "%$request->search%")
                ->orWhere('age', 'LIKE', "%$request->search%")
                ->orWhere('address', 'LIKE', "%$request->search%")->orderBy('id', 'desc')->paginate(15);
        } else {
            $visitors = DB::table('visitors')->orderBy('id', 'desc')->paginate(15);
        }
        return view('visitor.index', [
            'title' => "Dashboard Admin | Laporan Pengunjung",
            'user' => auth()->user(),
            'menu' => ['Data Pengunjung'],
            'visitors' => $visitors,
        ]);
    }

    public function generateToken()
    {
        $generate = Str::random(10);
        session([
            'token' => $generate
        ]);
        return redirect()->route('visit.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('token')) {
            return view('visitor.visitor-add', [
                'title' => "Pendataan Pengunjung",
            ]);
        } else {
            return redirect()->route('home')->with(['message' => "Harap Scan QR terlebih dahulu!", 'color' => 'danger']);
        }
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
            'nama' => 'required',
        ]);
        DB::table('visitors')->insert([
            'name' => $request->nama,
            'age' => $request->umur,
            'address' => "$request->kelurahan, $request->kecamatan, $request->kota, $request->provinsi",
            'check_in' => date('Y-m-d H:i:sa'),
        ]);
        session()->flush();
        return redirect()->route('home')->with(['message' => 'Terimakasih telah mengisi data kepengunjugan Bendungan Sadawarna <3']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function show(Visitor $visitor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Visitor  $visitor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visitor $visitor)
    {
        //
    }
}
