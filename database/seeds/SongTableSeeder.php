<?php

use Illuminate\Database\Seeder;

class SongTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	factory(App\Song::class,20)->create();
        App\Song::all()->each(function ($song){
			$song->grades()->attach(
				rand(1,13)
			);
		});
    }
}
