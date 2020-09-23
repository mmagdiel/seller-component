<?php

use Illuminate\Database\Seeder;

class ContactsWarehousesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $for_load = $this->load();
        foreach($for_load as $arr) {
            DB::table('contacts_warehouses')->insert($arr);       
        }
    }

    public function load()
    {
        $string = file_get_contents("/var/www/html/selet/database/seeds/contacts_warehouses.json");
        return json_decode($string,true);
    }
}