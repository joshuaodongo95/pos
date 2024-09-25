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
                'name' => 'Chicks',
                'slug' => 'chicks',
                'image' => '',
                'description' => '1-7 Days Old chicks',
                'status' =>'1'

            ],
            [
                'name' => 'Broilers',
                'slug' => 'broilers',
                'image' => '',
                'description' => 'broilers',
                'status' =>'1'

            ],
            [
                'name' => 'Layers',
                'slug' => 'layers',
                'image' => '',
                'description' => 'layers',
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
