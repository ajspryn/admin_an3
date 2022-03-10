<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Pendaftaran;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Umpan_balik;
use Illuminate\Http\Request;
use App\Models\Penyedia_layanan;
use Cron\MonthField;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $yearnow=date(now()->format('Y'));
        $user_id= Auth::user()->id;
        $penyedia_id=Penyedia_layanan::select()->where('user_id', $user_id)->get()->first();
        $cek=Penyedia_layanan::select()->where('user_id', $user_id)->count();
        $layanan=Layanan::select('nama_singkat')->where('user_id', $user_id)->get();
        $pengguna_layanan1=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 1)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan2=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 2)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan3=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 3)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan4=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 4)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan5=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 5)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan6=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 6)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan7=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 7)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan8=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 8)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan9=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 9)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan10=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 10)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan11=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 11)->whereyear('tanggal_layanan', $yearnow)->get()->count();
        $pengguna_layanan12=Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->wheremonth('tanggal_layanan', 12)->whereyear('tanggal_layanan', $yearnow)->get()->count();

        $layanan_perbulan = app()->chartjs
                        ->name('lineChartTest')
                        ->type('line')
                        ->size(['width' => 400, 'height' => 200])
                        ->labels(['Januari', 'Februari', 'Maret', 'April', 'Mey', 'Juni', 'Juli','Agustus','September','Oktober','November','Desember'])
                        ->datasets([
                            [
                                "label" => "Pengguna seluruh layanan anda",
                                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                                'borderColor' => "rgba(38, 185, 154, 0.7)",
                                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                                "pointHoverBackgroundColor" => "#fff",
                                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                                'data' => [$pengguna_layanan1,
                                            $pengguna_layanan2,
                                            $pengguna_layanan3,
                                            $pengguna_layanan4,
                                            $pengguna_layanan5,
                                            $pengguna_layanan6,
                                            $pengguna_layanan7,
                                            $pengguna_layanan8,
                                            $pengguna_layanan9,
                                            $pengguna_layanan10,
                                            $pengguna_layanan11,
                                            $pengguna_layanan12,
                                ],
                            ],
                        ])
                        ->options([]);

        if ($cek!=0){
            return view('dashboard', [
                'layanan'=>Layanan::select()->where('penyedia_layanan_id', $penyedia_id->id)->get()->count(),
                'total_layanan_taunan'=>Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->whereyear('tanggal_layanan', $yearnow)->get()->count(),
                'layanans'=>Layanan::select()->where('penyedia_layanan_id', $penyedia_id->id)->get(),
                'penyedia'=>Penyedia_layanan::select()->where('user_id', $user_id)->get()->first(),
                'rating'=>Umpan_balik::select()->where('penyedia_layanan_id', $penyedia_id->id)->get()->avg('rating'),
                'reviews'=>Umpan_balik::select()->where('penyedia_layanan_id', $penyedia_id->id)->orderBy('id', 'desc')->limit(50)->get(),
                'pendaftar_butuh_verifikasi'=>Pendaftaran::select()->where('penyedia_layanan_id', $penyedia_id->id)->where('keterangan_tambahan_status', "K")->get()->count(),
            ],compact('layanan_perbulan'));
        }
        else{
            return view('daftar_penyedia_layanan',[
                'provinsis'=> Province::all(),
                'kabko'=> Regency::all(),
            ]);
        }
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
