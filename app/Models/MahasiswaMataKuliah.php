<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MahasiswaMataKuliah extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa_mata_kuliahs';

    protected $fillable = [
        'mahasiswa_id',
        'mata_kuliah_id',
        'nilai',
    ];

    // Relasi ke Mahasiswa
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    // Relasi ke Mata Kuliah
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
