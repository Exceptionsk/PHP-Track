<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;
use App\Article;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $category = Category::all()->pluck('id')->toArray();
      $article = Article::all()->pluck('id')->toArray();
        foreach (range(1,10) as $index) {
            DB::table('article_categories')->insert([
              'category_id' => $faker->randomElement($category),
              'articles_id' => $faker->randomElement($article),
              'created_at'  =>  now(),
              'updated_at'  => now()
            ]);
          }
    }
}
