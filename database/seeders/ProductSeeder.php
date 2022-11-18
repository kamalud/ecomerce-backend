<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Seller;
use Faker\Factory;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $mImges =[$faker->imageUrl(450,450),$faker->imageUrl(450,450),$faker->imageUrl(450,450),$faker->imageUrl(450,450)];
        foreach (range(1,25) as $item){
            Product::create([
                'seller_id'=>$faker->randomElement(Seller::pluck('id')->toArray()),
                'color_id'=>$faker->randomElement(Color::pluck('id')->toArray()),
                // 'brand_id'=>$faker->randomElement(Brand::pluck('id')->toArray()),
                // 'category_id'=>$faker->randomElement(Category::pluck('id')->toArray()),
                // 'sub_category_id'=>$faker->randomElement(SubCategory::pluck('id')->toArray()),
                'name'=>$faker->name,
                'description'=>$faker->text,
                'description2'=>$faker->text,
                'price'=>$faker->numberBetween(400,3000),
                'discount'=>$faker->numberBetween(1,99),
                'stock'=>$faker->numberBetween(100,300),
                'sale'=>$faker->numberBetween(0,1),
                'thumbnail'=>$faker->imageUrl(450,450),
                'images'=>$faker->randomElement($mImges),
                'conditions'=>$faker->randomElement(['new','popular','winter','feature']),
                'added_by'=>$faker->randomElement(['admin','seller']),
                'status'=>$faker->randomElement(['active','inactive']),
              ]);
        };
    }
}
