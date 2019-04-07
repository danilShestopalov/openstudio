<?php

use Illuminate\Database\Seeder;

class ProfessionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Frontend developer',
        ]);
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Backend developer',
        ]);
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Fullstack developer',
        ]);
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Mobile developer',
        ]);
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Designer',
        ]);
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Product manager',
        ]);
        \Illuminate\Support\Facades\DB::table('professions')->insert([
            'name' => 'Project manager',
        ]);
    }
}
