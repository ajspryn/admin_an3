<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umpan_balik extends Model
{
    use HasFactory;

    public function pendaftaran(){
        return $this->belongsTo(pendaftaran::class);
    }

    public function pengguna(){
        return $this->belongsTo(Pengguna_layanan::class);
    }

    public function layanan(){
        return $this->belongsTo(Layanan::class);
    }

    public function penyedia_layanan(){
        return $this->belongsTo(penyedia_layanan::class);
    }
}
