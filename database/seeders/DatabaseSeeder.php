<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(AdminsSeeder::class);
        $this->call(PublishersSeeder::class);
        $this->call(CreatorsSeeder::class);
        $this->call(TagsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
