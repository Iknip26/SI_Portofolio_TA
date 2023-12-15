<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menggunakan factory untuk membuat 10 data dummy
        // \App\Models\contents::factory(10)->create();
        // \App\Models\tags::factory(30)->create();
        \App\Models\User::factory(1)->create();
        // \App\Models\dosens::factory(1)->create();
        // \App\Models\specialities::factory(30)->create();

    }
}