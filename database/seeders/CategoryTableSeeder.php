<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [

            ["title" => 'Java'],
            ["title" => 'Php'],
            ["title" => 'Phython'],
            ["title" => 'Javascript'],
            ["title" => 'Jquery'],
            ["title" => 'Html'],
            ["title" => 'Css'],
            ["title" => 'Bootstrap'],
            ["title" => 'Ajax'],
            ["title" => 'Data-Structure'],
            ["title" => 'Laravel'],
            ["title" => 'Codeigniter'],
        ];

        Category::insert($data);
    }
}
