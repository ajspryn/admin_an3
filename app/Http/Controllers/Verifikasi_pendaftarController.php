<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Penyedia_layanan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class verifikasi_pendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now=date(now()->format('Y-m-d'));
        $user=Auth::user()->id;
        $layanan_id=Layanan::select()->where('user_id', $user)->get()->first();
        $penyedia_layanan=Penyedia_layanan::select()->where('user_id', $user)->get()->first();
        return view('dashboard.pendaftaran.verifikasi_pendaftar',[
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'penyedia_layanans'=>Penyedia_layanan::select()->where('user_id' , $user)->get(),
            'pendaftars'=>Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_layanan->id)->where('keterangan_tambahan_status', "K")->get(),
            'antrian'=>Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_layanan->id)->where('keterangan_tambahan_status', "K")->orderBy('no_antrian', 'asc')->get()->first(),
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
        // return $request;
        Pendaftaran::where('id', $id)
        ->update([
                'keterangan_tambahan_status'=>$request->keterangan_tambahan_status,
            ]);
            return redirect()->back()->with('success', 'Pendaftaran pengguna berhasil di verifikasi');
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
