<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Listing;
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
        \App\Models\User::factory(10)->create();

        Listing::create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'titel' => 'laravel senior ',
             'company' => 'Acme corp',
             'website' => 'http://www.acme.come'
         ]);
    }
}
