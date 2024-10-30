<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['category_name'=>'Agencias de Viaje']);
        Category::create(['category_name'=>'Trasporte']);
        Category::create(['category_name'=>'Centro Arqueológico']);
        Category::create(['category_name'=>'Restaurante']);
        Category::create(['category_name'=>'Hotel']);
        
    }
}
