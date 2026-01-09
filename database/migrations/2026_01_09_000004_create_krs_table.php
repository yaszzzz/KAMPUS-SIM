<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('krs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
            $table->string('tahun_ajaran'); // Ex: 2023/2024
            $table->enum('semester', ['Ganjil', 'Genap']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('krs');
    }
};
