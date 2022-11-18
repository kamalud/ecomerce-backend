<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slider;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slider>
 */
class SliderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = "image/banner/" . $this->faker->numberBetween(1,5) . ".png";
        
        return [
            'name'=>$this->faker->name,
            'image'=>$image,
        ];
    }
}
