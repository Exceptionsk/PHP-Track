<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
              'name' => $faker->name,
              'email' => $faker->unique()->safeEmail,
              'email_verified_at' => now(),
              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
              'remember_token' => Str::random(10),
              'created_at'  =>  now(),
              'updated_at'  => now()
            ]);
          }
    }
}
