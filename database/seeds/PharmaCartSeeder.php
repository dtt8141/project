<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
use App\Sales;
use App\Distributors;
use App\Customers;
class PharmaCartSeeder extends Seeder {

    public function run() {
        $faker = Faker\Factory::create();
        User::create([
            'name' => 'Eubien John Suco',
            'email' => 'Sterbern@gmail.com',
            'password' => Hash::make('Deathgun'),
            'is_admin' => TRUE
        ]);
        for ($i = 0; $i < 10; $i++) {
            $distributor = $faker->sentence(2);
            $product = $faker->sentence(1);
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('123456'),
                'is_admin' => FALSE
            ]);
            Product::create([
                'name' => $product,
                'description' => $faker->sentence(5),
                'price' => rand(1, 500),
                'stocks' => rand(50, 10000),
                'distributor' => $distributor,
            ]);
            Sales::create([
                'name' => $product,
                'amount' => rand(1, 100)
            ]);
            Distributors::create([
                'name' => $distributor,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
            Customers::create([
                'name' => $faker->name,
                'address' => $faker->address,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }

}
