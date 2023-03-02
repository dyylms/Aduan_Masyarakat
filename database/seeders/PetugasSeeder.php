<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('petugas')->insert([
            'username' => 'Zaenal',
            'nama_petugas' => 'petugas1',
            'password' => bcrypt('petugas1'),
            'telp' => 1234567892987,
            'level' => 'petugas'
        ]);
        DB::table('petugas')->insert([
            'username' => 'admin',
            'nama_petugas' => 'admin',
            'password' => bcrypt('admin'),
            'telp' => 1234567890187,
            'level' => 'admin'
        ]);
    }
}
