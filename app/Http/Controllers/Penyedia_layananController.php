<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Models\Penyedia_layanan;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Penyedia_layananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id= Auth::user()->id;
        $id=Penyedia_layanan::select('id')->where('user_id', $user_id)->get();
        $antrian=Pendaftaran::select()->where('penyedia_layanan_id', $id)->count();
        return view('dashboard.penyedia_layanan.index' , [
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user_id)->get()->first(),
            'banyak_antrian'=>$antrian,
            'penyedia_layanans'=>Penyedia_layanan::select()->where('user_id', $user_id)->get(),
            'layanans'=> Layanan::select()->where('user_id', $user_id)->get(),
            'provinsis'=> Province::all(),
            'kabko'=> Regency::all(),

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
        // dd($request);
        $request -> validate([
            'user_id'=> 'required',
            'nama_penyedia'=> 'required',
            'alamat_1'=> 'required',
            'alamat_2'=> 'required',
            'alamat_3'=> 'required',
            'alamat_4'=> 'required',
            'alamat_kodepos'=> 'required',
            'nama_kontak'=> 'required',
            'alamat_email'=> 'required',
            'no_hp'=> 'nullable',
            'no_telp'=> 'nullable',
            'kegiatan_usaha'=> 'required',
            'alamat_web'=> 'nullable',
            'foto'=>'image|nullable',

        ]);

        $input=$request->all();

        if($request->file('foto')){
            $input['foto'] = $request->file('foto')->store('foto-layanan');
        }

        Penyedia_layanan::create($input);
        return redirect('/')->with('success', 'Data Penyedia Layanan Berhasil Di Input');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyedia_layanan  $penyedia_layanan
     * @return \Illuminate\Http\Response
     */
    public function show(Penyedia_layanan $penyedia_layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyedia_layanan  $penyedia_layanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyedia_layanan $penyedia_layanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyedia_layanan  $penyedia_layanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyedia_layanan $penyedia_layanan)
    {
        $rules= [
            'user_id'=> 'required',
            'nama_penyedia'=> 'required',
            'alamat_1'=> 'required',
            'alamat_2'=> 'required',
            'alamat_3'=> 'required',
            'alamat_4'=> 'required',
            'alamat_kodepos'=> 'required',
            'nama_kontak'=> 'required',
            'alamat_email'=> 'required',
            'no_hp'=> 'nullable',
            'no_telp'=> 'nullable',
            'kegiatan_usaha'=> 'required',
            'alamat_web'=> 'nullable',
            'foto'=>'image|nullable',
        ];

        $input = $request->validate($rules);

        if($request->file('foto')){
            if($request->foto){
                Storage::delete($request->foto);
            }
            $input['foto'] = $request->file('foto')->store('foto-layanan');
        }

        Penyedia_layanan::where('id', $penyedia_layanan->id)
                ->update($input);
        return redirect()->back()->with('success', 'Data Penyedia Layanan Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyedia_layanan  $penyedia_layanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyedia_layanan $penyedia_layanan)
    {
        //
    }
}
