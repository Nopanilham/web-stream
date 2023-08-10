<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('packages')->insert([
            [
                'name'=> 'basic',
                'price' => 54000,
                'max_days'=> 30,
                'max_users'=> 2,
                'is_donwload'=> 1,
                'is_4k'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'standard',
                'price' => 65000,
                'max_days'=> 30,
                'max_users'=> 5,
                'is_donwload'=> 1,
                'is_4k'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'silver',
                'price' => 100000,
                'max_days'=> 60,
                'max_users'=> 6,
                'is_donwload'=> 1,
                'is_4k'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name'=> 'gold',
                'price' => 120000,
                'max_days'=> 60,
                'max_users'=> 8,
                'is_donwload'=> 1,
                'is_4k'=> 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
