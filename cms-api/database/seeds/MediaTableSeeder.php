<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class MediaTableSeeder extends Seeder
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
            DB::table('media')->insert([
              'user_id' => $faker->randomElement($users),
              'title' => $faker->word,
              'media_url' => $faker->url,
              'created_at'  =>  now(),
              'updated_at'  => now()
            ]);
          }
    }
}
