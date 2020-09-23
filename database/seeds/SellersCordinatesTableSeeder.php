<?php

use Illuminate\Database\Seeder;

class SellersCordinatesTableSeeder extends Seeder
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
            DB::table('sellers_cordinates')->insert($arr);       
        }
    }

    public function load()
    {
        $string = file_get_contents("/var/www/html/selet/database/seeds/sellers_cordinates.json");
        return json_decode($string,true);
    }
}