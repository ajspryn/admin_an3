<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Layanan;
use App\Models\Pendaftaran;
use App\Models\Ketersediaan;
use Illuminate\Http\Request;
use App\Models\Pengguna_layanan;
use App\Models\Penyedia_layanan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;
        $nik = request('nomor_identitas');
        // $penyedia_layanan_id=Penyedia_layanan::select('id')->where('user_id', $user)->get();
        return view('dashboard.pendaftaran.index', [
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'pendaftarans'=>Pendaftaran::all(),
            'pengguna_layanan'=>Pengguna_layanan::select()->where('nomor_identitas' , $nik)->get(),
            'penyedia_layanans'=>Penyedia_layanan::select()->where('user_id', $user)->get(),
            'layanans'=>Layanan::select()->where('user_id', $user)->get(),
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
        $banyak_antrian=$request->layanan_id;
        $antrian=Pendaftaran::select()->where('layanan_id', $banyak_antrian)->where('tanggal_layanan', $request->tanggal_layanan)->count();
        $no_antrian=$antrian+1;
        // dd($no_antrian);
        $request -> validate([
            'penyedia_layanan_id'=> 'required',
            'layanan_id'=> 'required',
            'tanggal_layanan'=> 'required',
            'pengguna_id'=> 'nullable',
            'nama_pengguna'=> 'required',
            'nomor_identitas'=> 'required',
            'keterangan_pendaftaran'=> 'nullable',
            'status_transaksi'=> 'required',
            'keterangan_tambahan_status'=> 'required',
            'no_telp'=> 'required',
        ]);

        $ketersediaan=Ketersediaan::select('jumlah_tersedia')->where('layanan_id', $request->layanan_id)->where('tanggal_layanan', $request->tanggal_layanan)->get()->first();
        $cek=Ketersediaan::select()->where('layanan_id', $request->layanan_id)->where('tanggal_layanan', $request->tanggal_layanan)->get()->count();
        $hk=Ketersediaan::select('tanggal_layanan')->where('layanan_id', $request->layanan_id)->where('tanggal_layanan', $request->tanggal_layanan)->get()->first();
        // return ($ketersediaan);
        if($cek){
            if($no_antrian<=$ketersediaan->jumlah_tersedia){
            Pendaftaran::create([
                'penyedia_layanan_id'=>$request->penyedia_layanan_id,
                'layanan_id'=>$request->layanan_id,
                'tanggal_layanan'=>$request->tanggal_layanan,
                'pengguna_id'=>$request->pengguna_id,
                'nama_pengguna'=>$request->nama_pengguna,
                'nomor_identitas'=>$request->nomor_identitas,
                'keterangan_pendaftaran'=>$request->keterangan_pendaftaran,
                'status_transaksi'=>$request->status_transaksi,
                'keterangan_tambahan_status'=>$request->keterangan_tambahan_status,
                'no_telp'=>$request->no_telp,
                'no_antrian'=>$no_antrian,
            ]);

            return redirect()->back()->with('success', 'Pendaftaran pengguna berhasil');
            }
            else if($no_antrian>$ketersediaan->jumlah_tersedia){
                return redirect()->back()->with('warning', 'Pengguna tidak bisa mendaftar, Layanan sudah penuh');
            }
            else {
                return redirect()->back()->with('warning', 'Pengguna tidak bisa mendaftar, Silahkan cek ketersediaan layanan');
            }
        }
        else{
            Alert::error('Ketersediaan layanan kosong', 'Silahkan masukan ketersediaan layanan terlebihdahulu');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // return $request;
        Pendaftaran::where('id', $pendaftaran->id)
        ->update([
                'status_transaksi'=>$request->status_transaksi,
                'keterangan_tambahan_status'=>$request->keterangan_tambahan_status,
                // 'penyedia_layanan_id'=>$pendaftaran->penyedia_layanan_id,
                // 'layanan_id'=>$pendaftaran->layanan_id,
                // 'tanggal_layanan'=>$pendaftaran->tanggal_layanan,
                // 'pengguna_id'=>$pendaftaran->pengguna_id,
                // 'nama_pengguna'=>$pendaftaran->nama_pengguna,'nomor_identitas'=>'35254535','no_telp'=>'08577774131','keterangan_pendaftaran'=>null,
            ]);
            return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
