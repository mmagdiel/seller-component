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
        // $this->call(UserSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(ContactsWarehousesTableSeeder::class);
        $this->call(SellersCordinatesTableSeeder::class);
        $this->call(VisitsCustomersTableSeeder::class);
    }
}
