<?php

use App\User;
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
        $this->call(UserSeeder::class);
        $this->call(EsnbcSeeder::class);
        $this->call(EsnbcSubsetSeeder::class);
        // User::create(['name' => 'user03', 'email' => 'user03@mail.ru', 'password' => 'user03']);
    }
}
