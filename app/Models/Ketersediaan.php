<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketersediaan extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function layanan(){
        return $this->belongsTo(Layanan::class);
    }
    public function penyedia_layanan(){
        return $this->belongsTo(Penyedia_layanan::class);
    }
}
