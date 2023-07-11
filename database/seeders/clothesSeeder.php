<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class clothesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // T-Shirt
        DB::table('clothes')->insert([
            'name' => 'White T-Shirt',
            'desc' => 'Relaxed-fit, cotton, round neckline.',
            'price' => 50000,
            'stock' => 10,
            'image' => 'storage/images/White T-Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Black T-Shirt',
            'desc' => 'Relaxed-fit, cotton, round neckline.',
            'price' => 50000,
            'stock' => 10,
            'image' => 'storage/images/Black T-Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Grey T-Shirt',
            'desc' => 'Relaxed-fit, cotton, round neckline.',
            'price' => 50000,
            'stock' => 10,
            'image' => 'storage/images/Grey T-Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Beige T-Shirt',
            'desc' => 'Relaxed-fit, cotton, round neckline.',
            'price' => 50000,
            'stock' => 10,
            'image' => 'storage/images/Beige T-Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Shirt
        DB::table('clothes')->insert([
            'name' => 'Green Shirt',
            'desc' => 'Relaxed-fit, corduroy, long sleeves.',
            'price' => 150000,
            'stock' => 10,
            'image' => 'storage/images/Green Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Grey Shirt',
            'desc' => 'Relaxed-fit, corduroy, long sleeves.',
            'price' => 150000,
            'stock' => 10,
            'image' => 'storage/images/Grey Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Black Shirt',
            'desc' => 'Relaxed-fit, cotton, short sleeves.',
            'price' => 150000,
            'stock' => 10,
            'image' => 'storage/images/Black Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'White Shirt',
            'desc' => 'Relaxed-fit, cotton, short sleeves.',
            'price' => 150000,
            'stock' => 10,
            'image' => 'storage/images/White Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Purple Shirt',
            'desc' => 'Relaxed-fit, cotton, short sleeves.',
            'price' => 150000,
            'stock' => 10,
            'image' => 'storage/images/Purple Shirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Pants
        DB::table('clothes')->insert([
            'name' => 'Blue Jeans',
            'desc' => 'Slim-fit, denim cotton.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Blue Jeans.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Grey Jeans',
            'desc' => 'Slim-fit, denim cotton.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Grey Jeans.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Grey Jogger',
            'desc' => 'Slim-fit, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Grey Jogger.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Black Jogger',
            'desc' => 'Slim-fit, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Black Jogger.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Beige Jogger',
            'desc' => 'Slim-fit, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Beige Jogger.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Skirt
        DB::table('clothes')->insert([
            'name' => 'Beige Skirt',
            'desc' => 'Short skirt, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Beige Skirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Black Skirt',
            'desc' => 'Short skirt, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Black Skirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Pink Skirt',
            'desc' => 'Short skirt, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Pink Skirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Green Skirt',
            'desc' => 'Short skirt, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/Green Skirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'White Skirt',
            'desc' => 'Short skirt, polyester.',
            'price' => 100000,
            'stock' => 10,
            'image' => 'storage/images/White Skirt.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Jacket
        DB::table('clothes')->insert([
            'name' => 'Purple Hoodie',
            'desc' => 'Relaxed-fit, cotton, long sleeves, pocket.',
            'price' => 200000,
            'stock' => 10,
            'image' => 'storage/images/Purple Hoodie.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Neon Hoodie',
            'desc' => 'Relaxed-fit, cotton, long sleeves, pocket.',
            'price' => 200000,
            'stock' => 10,
            'image' => 'storage/images/Neon Hoodie.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Orange Hoodie',
            'desc' => 'Relaxed-fit, cotton, long sleeves, pocket.',
            'price' => 200000,
            'stock' => 10,
            'image' => 'storage/images/Orange Hoodie.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Pink Hoodie',
            'desc' => 'Relaxed-fit, cotton, long sleeves, pocket.',
            'price' => 200000,
            'stock' => 10,
            'image' => 'storage/images/Pink Hoodie.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('clothes')->insert([
            'name' => 'Yellow Hoodie',
            'desc' => 'Relaxed-fit, cotton, long sleeves, pocket.',
            'price' => 200000,
            'stock' => 10,
            'image' => 'storage/images/Yellow Hoodie.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
