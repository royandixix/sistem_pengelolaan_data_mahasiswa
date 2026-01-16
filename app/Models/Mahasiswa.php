<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nim',
        'nama',
        'email',
        'tanggal_lahir',
        'jurusan_id',
        'status',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function mataKuliahs()
    {
        return $this->belongsToMany(
            MataKuliah::class,
            'mahasiswa_mata_kuliahs',
            'mahasiswa_id',
            'mata_kuliah_id'
        )->withPivot('nilai')->withTimestamps();
    }

    // 🔥 INI YANG KURANG
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
