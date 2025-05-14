<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('jenis_penilaians')->insert([
            ['name'=>'MBKM'],
            ['name'=>'Partisipasi (Kehadiran/Quiz)'],
            ['name'=>'Observasi (Praktik/Tugas)'],
            ['name'=>'Unjuk Kerja (Presentasi)'],
            ['name'=>'Tes Tulis (UTS)'],
            ['name'=>'Tes Tulis (UAS)'],
            ['name'=>'Tes Lisan (Tugas Kelompok)'],
        ]);
    }
}
