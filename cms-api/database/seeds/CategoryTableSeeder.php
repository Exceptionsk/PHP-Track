<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;
class CategoryTableSeeder extends Seeder
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
            DB::table('categories')->insert([
              'user_id' => $faker->randomElement($users),
              'name' => $faker->word,
              'slug' => $faker->sentence,
              'description' => $faker->paragraph,
              'created_at'  =>  now(),
              'updated_at'  => now()
            ]);
          }
    }
}
