<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pendaftaran;
use App\Models\Pengguna_layanan;
use App\Models\Penyedia_layanan;
use Carbon\Carbon;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;
        return view('dashboard.layanan.index',[
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'penyedia_layanans'=>Penyedia_layanan::select()->where('user_id' , $user)->get(),
            'layanans'=>Layanan::select()->where('user_id' , $user)->get(),
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
            'user_id'=> 'required',
            'penyedia_layanan_id'=> 'required',
            'nama_singkat'=> 'required',
            'penjelasan_1'=> 'required',
            'penjelasan_2'=> 'nullable',

        ]);

        $input=$request->all();

        Layanan::create($input);
        return redirect()->back()->with('success', 'Layanan berhasil di input');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Layanan $layanan)
    {
        $now=date(now()->format('Y-m-d'));
        $user=Auth::user()->id;
        return view('dashboard.layanan.antrian',[
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'penyedia_layanans'=>Penyedia_layanan::select()->where('user_id' , $user)->get(),
            'layanan'=>Layanan::select()->where('id' , $layanan->id)->get()->first(),
            'pendaftar'=>Pendaftaran::select()->where('layanan_id', $layanan->id)->where('tanggal_layanan', $now)->where('keterangan_tambahan_status', "Butuh Konfirmasi")->get(),
            'antrian'=>Pendaftaran::select()->where('layanan_id', $layanan->id)->where('tanggal_layanan', $now)->where('keterangan_tambahan_status', "Butuh Konfirmasi")->orderBy('no_antrian', 'asc')->get()->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Layanan $layanan)
    {
        // return $layanan;
        $user=Auth::user()->id;
        return view('dashboard.layanan.edit',[
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'penyedia_layanans'=>Penyedia_layanan::select()->where('user_id' , $user)->get(),
            'layanan'=>Layanan::select()->where('user_id' , $user)->where('id', $layanan->id)->get()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Layanan $layanan)
    {
        $rules= [
            'user_id'=> 'required',
            'penyedia_layanan_id'=> 'required',
            'nama_singkat'=> 'required',
            'penjelasan_1'=> 'required',
            'penjelasan_2'=> 'nullable',
        ];

        $input = $request->validate($rules);

        Layanan::where('id', $layanan->id)
                ->update($input);
        return redirect('layanan')->with('success', 'Data Layanan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layanan  $layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Layanan $layanan)
    {
        Layanan::destroy($layanan->id);
        return redirect()->back()->with('success', 'Data Layanan Berhasil Dihapus');
    }
}
