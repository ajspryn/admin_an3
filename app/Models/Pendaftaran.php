<?php

namespace App\Models;

use App\Models\Layanan;
use App\Models\Pengguna_layanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function pengguna(){
        return $this->belongsTo(Pengguna_layanan::class);
    }

    public function layanan(){
        return $this->belongsTo(Layanan::class);
    }


}
