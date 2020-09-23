<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
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
            DB::table('contacts')->insert($arr);       
        }
    }

    public function load()
    {
        $string = file_get_contents("/var/www/html/selet/database/seeds/contacts.json");
        return json_decode($string,true);
    }
}