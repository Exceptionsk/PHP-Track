<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Article;
use App\Media;
class ArticleMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $media = Media::all()->pluck('id')->toArray();
      $article = Article::all()->pluck('id')->toArray();
        foreach (range(1,10) as $index) {
            DB::table('article_media')->insert([
              'media_id' => $faker->randomElement($media),
              'article_id' => $faker->randomElement($article),
              'created_at'  =>  now(),
              'updated_at'  => now()
            ]);
          }
    }
}
