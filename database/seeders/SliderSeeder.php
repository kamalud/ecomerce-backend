<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $image = "image/banner/" . $this->faker->numberBetween(1,5) . ".png";
        
        foreach (range(1,5) as $item){
            Slider::create([
                'name'=>$faker->name,
                'image'=>$image,
              ]);
        };
    }
}
