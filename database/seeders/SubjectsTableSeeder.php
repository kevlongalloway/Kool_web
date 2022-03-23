<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            ['subject' => 'ELA'],
            ['subject' => 'Math'],
            ['subject' => 'Science'],
            ['subject' => 'Social Studies'],
        ]);
    }
}
