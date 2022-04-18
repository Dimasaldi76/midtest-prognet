<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\ProductCategories;
use App\Models\Products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        Admin::create([
<<<<<<< HEAD
        'name'	=> 'dimdim',
        'username'	=> 'wahbim',
        'password'	=> bcrypt('22279861'),
        'phone' => '08162362344'
=======
            'admin_name' => 'Dewa Adhigamika',
            'username' => 'fogikkun',
            'password' => bcrypt('12345678'),
            'admin_address' => 'Kuta Bali',
            'phone' => '081236227037'
>>>>>>> c1e7f82294dd2d121c1ffab284f8ad7502a5c9d6
        ]);

        ProductCategories::create([
            'category_name' => 'Fiksi'
        ]);

        ProductCategories::create([
            'category_name' => 'Komedi'
        ]);

        ProductCategories::create([
            'category_name' => 'Horor'
        ]);

        ProductCategories::create([
            'category_name' => 'Drama'
        ]);

        ProductCategories::create([
            'category_name' => 'Medis'
        ]);

        ProductCategories::create([
            'category_name' => 'Sejarah'
        ]);

        Products::factory(20)->create();
    }
}
