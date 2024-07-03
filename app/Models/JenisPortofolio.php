<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPortofolio extends Model
{
    use HasFactory;

    protected $table = 'portofolio_kategori';
    protected $guarded = [];

    public function konten(){
        return $this->hasMany(KontenPortofolio::class);
    }
}
