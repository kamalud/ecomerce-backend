<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;
use Faker\Factory;
class ColorSeeder extends Seeder
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
            Color::create([
                'name'=>$faker->name,
                'image'=>$faker->imageUrl,
                'status'=>$faker->randomElement(['active','inactive']),
              ]);
        };
    }
}
