
<?php

use Illuminate\Database\Seeder;
use App\Page;
use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factory as Factory;
class PagesTableSeeder extends Seeder
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
        foreach (range(1,10) as $index) {
            DB::table('pages')->insert([
              'user_id' => $faker->randomElement($users),
              'title' => $faker->word,
              'slug' => $faker->sentence,
              'content' => $faker->paragraph,
              'parent_id' => $faker->randomDigit,
              'is_visible' => $faker->randomDigit,
              'display_start_datetime' => $faker->dateTime,
              'display_end_datetime' => $faker->dateTime,
              'created_at'  =>  now(),
              'updated_at'  => now()
            ]);
          }
    }
}
