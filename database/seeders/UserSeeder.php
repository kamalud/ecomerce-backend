<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        User::create([
          'name'=>'User',
          'email'=>'User@gmail.com',
          'phone'=>'01761001704',
          'password'=>bcrypt('11111111'),
        ]);

        foreach (range(1,25) as $item){
            User::create([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email,
                'phone'=>$faker->phoneNumber(),
                'password'=>bcrypt('11111111'),
              ]);
        };
    }
}
