<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $john = Seller::create(['name' => 'John']);
        $jimmy = Seller::create(['name' => 'Jimmy']);
        $saul = Seller::create(['name' => 'Saul']);
        $mike = Seller::create(['name' => 'Mike']);
        $fring = Seller::create(['name' => 'Fring']);
        
        Product::create(['name' => 'Toy','description' => 'Rubber duck for kids']);
        Product::create(['name' => 'Tool','description' => 'Tools for dads']);
        Product::create(['name' => 'Plate','description' => 'Nice plates for nice tables']);
        Product::create(['name' => 'Bag','description' => 'A fashionable bag for your taste']);

        $john->products()->attach([1 =>['price' => 10,'quantity' => 5]]);
        $john->products()->attach([3 =>['price' => 7,'quantity' => 4]]);

        $jimmy->products()->attach([2 =>['price' => 5,'quantity' => 3]]);
        $jimmy->products()->attach([4 =>['price' => 8,'quantity' => 2]]);

        $saul->products()->attach([1 =>['price' => 15,'quantity' => 1]]);
        $saul->products()->attach([2 =>['price' => 8,'quantity' => 2]]);

        $mike->products()->attach([3 =>['price' => 7,'quantity' => 4]]);
        $mike->products()->attach([4 =>['price' => 8,'quantity' => 2]]);

        $fring->products()->attach([1 =>['price' => 10,'quantity' => 5]]);
        $fring->products()->attach([2 =>['price' => 5,'quantity' => 3]]);


    }
}
