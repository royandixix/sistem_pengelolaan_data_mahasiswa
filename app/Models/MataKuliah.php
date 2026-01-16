<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'dosen',
        'sks',
        'status',
    ];

    // Relasi many-to-many ke Mahasiswa
    public function mahasiswas()
    {
        return $this->belongsToMany(
            Mahasiswa::class,
            'mahasiswa_mata_kuliahs',
            'mata_kuliah_id',
            'mahasiswa_id'
        )->withPivot('nilai')->withTimestamps();
    }
}
