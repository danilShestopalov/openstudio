<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Python',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'PHP',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'C++',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Arduino',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Java',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Javascript',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'UI',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'UX',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'IOS',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Android',
        ]);
    }
}
