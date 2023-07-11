<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin1',
            'email' => 'maiboutiqueAdmin1@gmail.com',
            'password' => bcrypt('kamunanya'),
            'phone' => '0811111111',
            'address' => 'Serpong',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'admin2',
            'email' => 'maiboutiqueAdmin2@gmail.com',
            'password' => bcrypt('kamunanya'),
            'phone' => '0822222222',
            'address' => 'Tangerang',
            'role' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'member1',
            'email' => 'member1@gmail.com',
            'password' => bcrypt('kamunanya'),
            'phone' => '0811111111',
            'address' => 'Bandung',
            'role' => 'member',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'username' => 'member2',
            'email' => 'member2@gmail.com',
            'password' => bcrypt('kamunanya'),
            'phone' => '0822222222',
            'address' => 'Bogor',
            'role' => 'member',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
