<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    public function mataKuliahs()
    {
        return $this->hasMany(MataKuliah::class);
    }
}
