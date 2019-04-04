<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	['name' => 'Kevlon Jr',
        	'email' => 'kevlongalloway1999m@gmail.com',
        	'password' => '$2y$10$du.7Yc9sw6kBQBpwUQUwCO6NGgA9xFxZ4TFPeR6SaDgUeYDR35HOi'],
        	['name' => 'Kevlon',
        	'email' => 'kgalloway56@yahoo.com',
        	'password' => '$2y$10$du.7Yc9sw6kBQBpwUQUwCO6NGgA9xFxZ4TFPeR6SaDgUeYDR35HOi']
        ]);
    }
}
