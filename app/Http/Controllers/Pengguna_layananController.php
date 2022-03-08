<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Pengguna_layanan;
use App\Models\Penyedia_layanan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class Pengguna_layananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;
        return view('dashboard.pengguna_layanan.index' , [
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'pengguna_layanans'=>Pengguna_layanan::all(),

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
        $request -> validate([
            'nama_pengguna'=> 'required',
            'alamat_1'=> 'required',
            'alamat_2'=> 'required',
            'alamat_3'=> 'required',
            'alamat_4'=> 'required',
            'alamat_kodepos'=> 'required',
            'alamat_email'=> 'required',
            'no_telp'=> 'required',
            'nomor_identitas'=> 'required',
            'alamat_sosmed'=> 'required',
        ]);

        $input=$request->all();

        Pengguna_layanan::create($input);
        return redirect()->back()->with('success', 'Data Pengguna Berhasil Di Input');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengguna_layanan  $pengguna_layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengguna_layanan $pengguna_layanan)
    {
        $user=Auth::user()->id;
        return view('dashboard.pengguna_layanan.edit' , [
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'pengguna_layanans'=>Pengguna_layanan::select()->where('id', $pengguna_layanan->id)->get()->first(),

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengguna_layanan  $pengguna_layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengguna_layanan $pengguna_layanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengguna_layanan  $pengguna_layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengguna_layanan $pengguna_layanan)
    {
        $data=[
            'nama_pengguna'=> 'required',
            'user_id'=>'required',
            'alamat_1'=> 'required',
            'alamat_2'=> 'required',
            'alamat_3'=> 'required',
            'alamat_4'=> 'required',
            'alamat_kodepos'=> 'required',
            'alamat_email'=> 'required',
            'no_telp'=> 'required',
            'nomor_identitas'=> 'required',
        ];

        $input=$request->validate($data);

        Pengguna_layanan::where('id', $pengguna_layanan->id)
                          ->update($input);
        return redirect('/pengguna_layanan')->with('success', 'Data Pengguna Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengguna_layanan  $pengguna_layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengguna_layanan $pengguna_layanan)
    {
        //
    }
}
