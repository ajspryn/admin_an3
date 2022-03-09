<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Layanan;
use Carbon\CarbonPeriod;
use App\Models\Ketersediaan;
use Illuminate\Http\Request;
use App\Models\Penyedia_layanan;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class KetersediaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user()->id;
        $awal=request('waktu_awal');
        $akhir=request('waktu_akhir');
        return view('dashboard.ketersediaan.index',[
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'layanans'=>Layanan::select()->where('user_id' , $user)->get(),
            'nama_layanan'=>Layanan::select()->where('id' , request('layanan_id'))->get()->first(),
            'reqlayanan'=>request('layanan_id'),
            'ketersediaans'=>Ketersediaan::select()->where('layanan_id', request('layanan_id'))->get(),
            $start = new Carbon($awal),
            $end = new Carbon($akhir),
            'range' => CarbonPeriod::create($start->format("Y-m-d"), $end->format("Y-m-d")),
            'jumlah'=>Carbon::parse($awal)->diffInDays($akhir),
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
        // $layanan_id=$request->data;
        // dd($request);
        $request -> validate([
            'data.*.penyedia_layanan_id'=> 'required',
            'data.*.layanan_id'=> 'required',
            'data.*.tanggal_layanan'=> 'required',
            'data.*.jumlah_tersedia'=> 'required',
            'data.*.verifikasi'=> 'required',
        ]);

        foreach ($request->data as $key => $value) {
            $cek=Ketersediaan::select('tanggal_layanan')->where('layanan_id', $value['layanan_id'])->where('tanggal_layanan', $value['tanggal_layanan'])->get()->count();
            $tgl=$value['tanggal_layanan'];
            $id=$value['layanan_id'];
            // dd($cek->count);
            if($cek == 0){
                $input=Ketersediaan::create($value);
            }
            else if($cek == 1){
                $update=Ketersediaan::where('tanggal_layanan', $tgl)
                ->where('layanan_id', $id)
                ->update($value);
                // return redirect('/ketersediaan')->with('success', 'Data ketersediaan berhasil di ubah');
            }
            else{
                return redirect('/ketersediaan')->with('danger', 'Data ketersediaan gagal di input');
            }
        }
        return redirect('/ketersediaan')->with('success', 'Data ketersediaan berhasil di input');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ketersediaan  $ketersediaan
     * @return \Illuminate\Http\Response
     */
    public function show(Ketersediaan $ketersediaan)
    {
        $user=Auth::user()->id;
        $tes=Ketersediaan::with('penyedia_layanan');
        return view('dashboard.ketersediaan.index',[
            'penyedia'=>Penyedia_layanan::select()->where('user_id', $user)->get()->first(),
            'ketersediaans'=>Ketersediaan::select()->where('penyedia_layanan_id' , $tes)->get(),
            'layanans'=>Layanan::select()->where('penyedia_layanan_id' , $tes)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ketersediaan  $ketersediaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Ketersediaan $ketersediaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ketersediaan  $ketersediaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ketersediaan $ketersediaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ketersediaan  $ketersediaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ketersediaan $ketersediaan)
    {
        //
    }
}
