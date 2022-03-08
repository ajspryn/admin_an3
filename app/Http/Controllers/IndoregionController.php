<?php

namespace App\Http\Controllers;

use App\Models\Regency;

class IndoregionController extends Controller
{
    public function kabupaten(request $request){
        $id_provinsi=$request->id_provinsi;
        $kabupatens= Regency::where('province_id', $id_provinsi)->get();

        foreach($kabupatens as $kabupaten){
            echo "<option value="{{ $kabupaten->id }}">{{ $kabupaten->name }}</option>";
        }
    }
}
