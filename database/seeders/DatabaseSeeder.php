<?php

namespace Database\Seeders;


use App\Models\Article;
use App\Models\Buys_cont;
use App\Models\Buyscont;
use App\Models\Categorie;
use App\Models\config;
use App\Models\detail;
use App\Models\Income_conts;
use App\Models\incomes;
use App\Models\Provider;
use App\Models\Role;
use App\Models\sales;
use App\Models\sales_details;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        config::insert([
            [
                //id: 1
                'iva_percent' => 19, //porcentaje iva
                'shipping_price' => 0, //valor domicilio

            ],
        ]);

        Role::factory(2)->create();
        Role::insert([
            [
                //id: 1
                'name' => 'Administrator',
                'description' => 'User with all application privileges',

            ],
        ]);
        Categorie::factory(4)->create();
        Provider::factory(10)->create();
        Article::factory(1)->create();
        incomes::factory(10)->create();
        Income_conts::factory(10)->create();
        User::insert(
            [
                'roles_id' =>  3, //admin role id
                'name' =>  'Karolina', //default name
                'email' => 'ksegura1@misena.edu.co', //default email
                'email_verified_at' => date("Y/m/d"), //verified today
                'created_at' => date("Y/m/d"), //created today
                'password' => Hash::make('karolina123') //default admin password: admin123
            ]
        );
        User::factory(10)->create();
        detail::factory(10)->create();
        Sales::factory(10)->create();
        sales_details::factory(10)->create();
    }
}
