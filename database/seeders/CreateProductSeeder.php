<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class CreateProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
               'product_code'=>'EA001',
               'name'=>'Shoe',
               'slug'=>'shoe',
               'brand'=> 'Reebok',
               'description'=>'Energy Runner LP Nacho/Conavy/None Running Shoes',
               'original_price'=>1500,
               'selling_price'=>1200,
               'quantity'=> 5,
               'status'=> 1,
            ],
            [
                'product_code'=>'EA012',
                'name'=>'Mens Revolution 6 Nn Running Shoe',
                'slug'=>'mens revolution 6 nn running shoe',
                'brand'=> 'Nike',
                'description'=>'mens revolution 6 nn running shoemens revolution 6 nn running shoe',
                'original_price'=>3695,
                'selling_price'=>2586,
                'quantity'=>1,
                'status'=> 1,
            ],
            [
                'product_code'=>'EA112',
                'name'=>'OnePlus 5 Midnight Black',
                'slug'=>'oneplus 5 midnight black',
                'brand'=> 'OnePlus',
                'description'=>'Camera: 20 MP Rear camera with Portrait mode, Pro mode, smart capture, Fast Auto focus | 16MP front camera',
                'original_price'=>27000,
                'selling_price'=>20000,
                'quantity'=>1,
                'status'=> 1,
            ],
            [
                'product_code'=>'EA122',
                'name'=>'APPLE iPad',
                'slug'=>'apple ipad',
                'brand'=> 'Apple',
                'description'=>'Battery life is good; last me more than a day on normal usage',        
                'original_price'=>27990,
                'selling_price'=>25990,
                'quantity'=>1,
                'status'=> 1,
            ],
            [
                'product_code'=>'EA142',
                'name'=>'HP Ryzen 7 Octa Core 5700U',
                'slug'=>'hp ryzen 7 octa Ccre 5700u',
                'brand'=> 'HP',
                'description'=>'Stylish & Portable Thin and Light Laptop 14 Inch Full HD, IPS, micro-edge,',
                'original_price'=>56990,
                'selling_price'=>54990,
                'quantity'=>1,
                'status'=> 1,
            ],
        ];
        foreach ($products as $key => $product) {
            Product::create($product);
        }
    }
}
