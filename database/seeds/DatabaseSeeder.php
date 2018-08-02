<?php

use Illuminate\Database\Seeder;
use App\Company;
use App\Employer;
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
        factory(Company::class,30)->create();
        factory(Employer::class,30)->create();
    }
}
