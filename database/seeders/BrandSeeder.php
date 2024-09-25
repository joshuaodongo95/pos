<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'description' => 'Apple Inc. is an American multinational corporation and technology company headquartered in Cupertino, California, in Silicon Valley. It is best known for its consumer electronics, software, and services. ',
                'image' => '',
                'status' =>'1'

            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'description' => 'SΛMSUNG is a South Korean multinational manufacturing conglomerate headquartered in Samsung Digital City, Suwon, South Korea.It comprises numerous affiliated businesses,most of them united under the Samsung brand, and is the largest South Korean chaebol (business conglomerate). As of 2020',
                'image' => '',
                'status' =>'1'

            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'description' => 'Huawei Technologies Co., Ltd is a Chinese multinational digital communications technology conglomerate corporation headquartered in Bantian, Longgang District, Shenzhen, Guangdong. It designs, develops, manufactures and sells telecommunications equipment, consumer electronics, smart devices and various rooftop solar products.',
                'image' => '',
                'status' =>'1'

            ],
            [
                'name' => 'Adidas',
                'slug' => 'adidas',
                'description' => 'Adidas AG  is a German athletic apparel and footwear corporation headquartered in Herzogenaurach, Bavaria, Germany. It is the largest sportswear manufacturer in Europe',
                'image' => '',
                'status' =>'1'

            ],
            [
                'name' => 'Hisense',
                'slug' => 'hisense',
                'description' => 'Hisense Group is a Chinese multinational major appliance and electronics manufacturer headquartered in Qingdao, Shandong Province, China.Televisions are the main products of Hisense, and it is the largest TV manufacturer in China by market share since 2004',
                'image'=>'',
                'status'=> '1'
            ]
        ];

        foreach ($brands as $brand) {
            DB::transaction(function() use ($brand) {

                $createdBrand = Brand::create(
                    [
                        'name' => $brand['name'],
                        'slug' => $brand['slug'],
                        'description' => $brand['description'],
                        'image' => $brand['image'],
                        'status' => $brand['status']
                    ]
                );
                
            });
        }
    }
}
