<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Regency;
use App\Models\Province;
use App\Models\Umpan_balik;
use Illuminate\Http\Request;
use App\Models\Penyedia_layanan;
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
        $user_id= Auth::user()->id;
        $penyedia_id=Penyedia_layanan::select()->where('user_id', $user_id)->get();
        $cek=Penyedia_layanan::select()->where('user_id', $user_id)->count();

        if ($cek!=0){
            return view('dashboard',[
                'layanan'=>Layanan::select()->where('penyedia_layanan_id', $penyedia_id)->get()->count(),
                'penyedia'=>Penyedia_layanan::select()->where('user_id', $user_id)->get()->first(),
                'rating'=>Umpan_balik::select('rating')->where('penyedia_layanan_id', $penyedia_id)->get()->average(),
            ]);
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
