<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['arte', 'sport', 'cinema', 'tecnologia', 'musica', 'motori'];

        foreach ($categories as $category) {
          $category_obj = new Category();
          $category_obj->name = $category;
          $category_obj->slug = Str::slug($category, '-');
          $category_obj->save();
        }
    }
}
