<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         /*\App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => Hash::make(123456789)
         ]);*/

        /*\App\Models\Store::create([
            'name' => 'Store 1',
            'location' => 'gujarat'
        ]);

        for($i=1;$i<100;$i++){
            \App\Models\Stock::create([
                'item_name' => "item $i",
                'item_code' => "item$i",
                'quantity' => 10,
                'location' => 'gujarat',
                'store_id' => Store::first()->id,
                'in_stock' => now()->format('Y-m-d')
            ]);
        }*/
    }
}
