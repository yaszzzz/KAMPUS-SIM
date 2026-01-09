<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KrsDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function krs()
    {
        return $this->belongsTo(Krs::class);
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }
}
