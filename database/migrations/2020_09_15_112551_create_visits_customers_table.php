<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitsCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits_customers', function (Blueprint $table) {
            $table->id()->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->integer('contact_warehouse_id')->nullable();
            $table->integer('visit_type')->nullable();
            $table->string('latitude_checkin', 255)->nullable();
            $table->string('longitude_checkin', 255)->nullable();
            $table->string('latitude_checkout', 255)->nullable();
            $table->string('longitude_checkout', 255)->nullable();
            $table->smallInteger('test')->default(0)->nullable();
            $table->integer('distance')->nullable();
            $table->dateTime('checkin_date', 0)->nullable();
            $table->dateTime('checkout_date', 0)->nullable();
            $table->string('observation', 255)->nullable();
            $table->string('photo', 255)->nullable();
            $table->string('checkout_ok', 255)->default('NO')->nullable();
            $table->dateTime('created_at', 0)->nullable();
            $table->dateTime('updated_at', 0)->nullable();
            $table->boolean('sales_management')->default(False)->nullable();
            $table->boolean('collection')->default(False)->nullable();
            $table->boolean('training')->default(False)->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->foreign('contact_warehouse_id')->references('id')->on('contacts_warehouses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits_customers');
    }
}
