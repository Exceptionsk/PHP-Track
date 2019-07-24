<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $users = User::all()->pluck('id')->toArray();
      // dd($faker->randomElement($users));
        foreach (range(1,10) as $index) {
            DB::table('articles')->insert([
              'user_id' => $faker->randomElement($users),
              'title' => $faker->word,
              'slug' => $faker->sentence,
              'content' => $faker->paragraph,
              'excerpt' => $faker->sentence,
              'is_visible' => $faker->randomDigitNotNull,
              'released_start_datetime'=>$faker->dateTime()
            ]);
          }
    }
}
