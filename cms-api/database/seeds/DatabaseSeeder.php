<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ArticleCategoriesTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(ArticleMediaTableSeeder::class);

    }
}
