<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\SubCategory;
use Faker\Factory;
class SubCategorySeeder extends Seeder
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
            SubCategory::create([
                // 'category_id'=>$faker->randomElement(Category::pluck('id')->toArray()),
                'name'=>$faker->name,
                'status'=>$faker->randomElement(['active','inactive']),
              ]);
        };
    }
}
