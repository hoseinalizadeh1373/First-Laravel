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
        for($i=11;$i<25;$i++){
       User::create([
           'type' =>'user',
           'name' =>'hosein'.$i,
           'email' =>'hosein'.$i.'@gmail.com',
           'password' =>bcrypt('12345678')
       ]);
      }
    //   User::create([
    //     'type' =>'admin',
    //     'name' =>'hosein3',
    //     'email' =>'hosein3@gmail.com',
    //     'password' =>bcrypt('12345678')
    // ]);
    }
}
