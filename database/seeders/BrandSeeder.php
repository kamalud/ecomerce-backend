<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;
use Faker\Factory;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach (range(1,25) as $item){
            Brand::create([
                'name'=>$faker->name,
                'image'=>$faker->imageUrl,
                'status'=>$faker->randomElement(['active','inactive']),
              ]);
        };
    }
}
