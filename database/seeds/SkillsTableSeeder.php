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
            'name' => 'Дизайн',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Веб-разработка',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'IOS разработчик',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Android разработчик',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Робототехника',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Маркетолог',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Project manager',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Product Manager',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Экономист',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Продажник',
        ]);
        \Illuminate\Support\Facades\DB::table('skills')->insert([
            'name' => 'Гений',
        ]);
    }
}
