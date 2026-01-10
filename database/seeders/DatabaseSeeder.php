<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;
use App\Models\MataKuliah;
use App\Models\Mahasiswa;
use App\Models\Krs;
use App\Models\KrsDetail;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 0. Create Admin User
        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@kampus.ac.id',
             'password' => bcrypt('password'),
        ]);

        // 1. Create specific Prodis
        $prodis = collect([
            ['kode' => 'TI', 'nama' => 'Teknik Informatika', 'jenjang' => 'S1'],
            ['kode' => 'SI', 'nama' => 'Sistem Informasi', 'jenjang' => 'S1'],
            ['kode' => 'DKV', 'nama' => 'Desain Komunikasi Visual', 'jenjang' => 'S1'],
        ])->map(function ($prodiData) {
            return Prodi::factory()->create($prodiData);
        });

        // 2. Create Mata Kuliah for each Prodi
        $prodis->each(function ($prodi) {
            MataKuliah::factory()->count(10)->create([
                'prodi_id' => $prodi->id,
            ]);
        });

        // 3. Create 15 Mahasiswas distributed across Prodis
        $mahasiswas = Mahasiswa::factory()->count(15)->make()->each(function ($mahasiswa) use ($prodis) {
            $mahasiswa->prodi_id = $prodis->random()->id;
            $mahasiswa->save();
        });

        // 4. Create KRS for each Mahasiswa and populate it with courses
        $mahasiswas->each(function ($mahasiswa) {
            // Create a KRS
            $krs = Krs::factory()->create([
                'mahasiswa_id' => $mahasiswa->id,
                'semester' => 'Ganjil', 
            ]);

            // Assign 4-6 random courses from their Prodi
            $availableCourses = MataKuliah::where('prodi_id', $mahasiswa->prodi_id)->inRandomOrder()->take(rand(4, 6))->get();

            foreach ($availableCourses as $course) {
                KrsDetail::factory()->create([
                    'krs_id' => $krs->id,
                    'mata_kuliah_id' => $course->id,
                ]);
            }
        });
    }
}
