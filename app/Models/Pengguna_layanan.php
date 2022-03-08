<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna_layanan extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at'
    ];

    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class);
    }
}
