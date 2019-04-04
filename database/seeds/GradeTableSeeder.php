<?php

use Illuminate\Database\Seeder;

class GradeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grades')->insert([
        	['grade' => 'First'],
        	['grade' => 'Second'],
        	['grade' => 'Third'],
        	['grade' => 'Fourth'],
        	['grade' => 'Fifth'],
        	['grade' => 'Sixth'],
        	['grade' => 'Seventh'],
        	['grade' => 'Eighth'],
        	['grade' => 'Ninth'],
        	['grade' => 'Tenth'],
        	['grade' => 'Eleventh'],
        	['grade' => 'Twelfth'],
        	['grade' => 'Kindergarten']
        ]);
    }
}
