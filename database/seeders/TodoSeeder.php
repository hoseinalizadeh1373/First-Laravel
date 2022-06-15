<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(1,10) as $item){
            DB::table('todos')->insert([
                "title" => $faker->title(),
                "description" =>$faker->text(),
                "created_at" =>now(),
                "updated_at" =>now()
            ]);
        }
            
        
    }
}
