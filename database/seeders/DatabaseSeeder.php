<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(OrganizationTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SubscriptionTableSeeder::class);
        $this->call(GradeTableSeeder::class);
        $this->call(SongTableSeeder::class);
    }
}
