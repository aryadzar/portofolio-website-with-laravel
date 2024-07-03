<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontenPortofolio extends Model
{
    use HasFactory;

    protected $table = 'konten_portofolio';
    protected $guarded = [];

    public function jenis(){
        return $this->belongsTo(JenisPortofolio::class, 'id_jenis');
    }
}
