<?php

use Illuminate\Database\Seeder;

class VisitsCustomersTableSeeder extends Seeder
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
            DB::table('visits_customers')->insert($arr);       
        }
    }

    public function load()
    {
        $string = file_get_contents("/var/www/html/selet/database/seeds/visits_customers.json");
        return json_decode($string,true);
    }
}