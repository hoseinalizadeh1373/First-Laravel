<?php

namespace Database\Seeders;

use Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'type' =>'admin',
           'name' =>'hosein',
           'email' =>'hosein3@gmail.com',
           'password' =>bcrypt('12345678')
       ]);
    }
}
