<?php

namespace Database\Seeders;

use App\Models\Seller;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();
        Seller::create([
            'name'=>'Seller',
            'email'=>'seller@gmail.com',
            'phone'=>'01761001705',
            'password'=>bcrypt('11111111'),
          ]);

          foreach (range(1,25) as $item){
            Seller::create([
                'name'=>$faker->name,
                'email'=>$faker->unique()->email,
                'phone'=>$faker->phoneNumber(),
                'password'=>bcrypt('11111111'),
              ]);
        };
    }
}
