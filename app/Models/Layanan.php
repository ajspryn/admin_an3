<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function ketersediaan(){
        return $this->hasMany(ketersediaan::class);
    }

    public function pendaftaran(){
        return $this->hasMany(pendaftaran::class);
    }

    public function umpan_balik(){
        return $this->hasMany(Umpan_balik::class);
    }

}
