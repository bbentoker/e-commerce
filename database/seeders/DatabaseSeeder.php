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
        
        Category::create(['name' => 'Kids']);
        Category::create(['name' => 'Dad Stuff']);
        Category::create(['name' => 'Kitchen']);
        Category::create(['name' => 'Accessories']);

        Product::create(['name' => 'Toy','category_id'=>1,'description' => 'Rubber duck for kids','brand' => 'Disney']);
        Product::create(['name' => 'Tool','category_id'=>2,'description' => 'Tools for dads','brand' => 'Wilson\'s Tools']);
        Product::create(['name' => 'Plate','category_id'=>3,'description' => 'Nice plates for nice tables','brand' => 'HomeStuff']);
        Product::create(['name' => 'Bag','category_id'=>4,'description' => 'A fashionable bag for your taste','brand' => 'Gucci']);

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
