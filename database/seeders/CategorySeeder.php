<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if categories already exist
        $existingCount = DB::table('categories')->count();
        
        // Only seed if no categories exist
        if ($existingCount > 0) {
            return;
        }

        $categories = [
            ['name' => 'Fiksi'],
            ['name' => 'Sejarah'],
            ['name' => 'Referensi'],
            ['name' => 'Pelajaran'],
            ['name' => 'Bahasa'],
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name' => $category['name'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
