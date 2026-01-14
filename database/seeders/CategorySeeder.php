<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Yuridik',
                'slug' => 'primary'
            ],
            [
                'name' => 'Siyosatshunoslik',
                'slug' => 'secondary'
            ],
            [
                'name' => 'Pedagogika',
                'slug' => 'success'
            ],
            [
                'name' => 'Psixologiya',
                'slug' => 'danger'
            ],
            [
                'name' => 'Maxsus fanlar',
                'slug' => 'warning'
            ],
            [
                'name' => ' Maxsus-kasbiy fanlar',
                'slug' => 'info'
            ],
            [
                'name' => 'Jangovar',
                'slug' => 'primary'
            ],
            [
                'name' => 'Jismoniy',
                'slug' => 'success'
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => $category['slug'],
            ]);
        }
    }
}
