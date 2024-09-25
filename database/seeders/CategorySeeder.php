<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => 'electronics',
                'image' => '',
                'description' => 'smartphones, laptops, tablets, and other electronic devices',
                'status' =>'1'

            ],
            [
                'name' => 'Fashion & Apparel',
                'slug' => 'fashion-&-apparel',
                'image' => '',
                'description' => 'Clothing, shoes, accessories, and fashion-related items',
                'status' =>'1'

            ],
            [
                'name' => 'Home & Kitchen',
                'slug' => 'home-&-kitchen',
                'image' => '',
                'description' => 'kitchen gadgets, home decor items, and appliances',
                'status' =>'1'

            ],
            [
                'name' => 'Sports & Fitness',
                'slug' => 'sports-&-fitness',
                'image' => '',
                'description' => 'Exercise equipment, sports gear, and fitness accessories are common eCommerce products',
                'status' =>'1'

            ],
            [
                'name' => 'Appliances',
                'slug' => 'appliances',
                'image' => '',
                'description' => 'Appliances',
                'status' =>'1'

            ],
        ];

        foreach ($categories as $category) {
            DB::transaction(function() use ($category) {

                $createdCategory = Category::create(
                    [
                        'name' => $category['name'],
                        'slug' => $category['slug'],
                        'description' => $category['description'],
                        'image' => $category['image'],
                        'status' => $category['status'],
                    ]
                );
                
            });
        }
    }
}
