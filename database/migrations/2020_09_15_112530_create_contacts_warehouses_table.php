<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts_warehouses', function (Blueprint $table) {
            $table->id()->nullable();
            $table->integer('contact_id')->nullable();
            $table->string('code', 15)->nullable();
            $table->string('description', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('latitude', 45)->nullable();
            $table->string('length', 45)->nullable();
            $table->string('telephone', 30)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('contact', 60)->nullable();
            $table->text('observation')->nullable();
            $table->boolean('state')->default(True)->nullable();
            $table->dateTime('created_at', 0)->nullable();
            $table->dateTime('updated_at', 0)->nullable();
            $table->dateTime('deleted_at', 0)->nullable();
            $table->integer('seller_id')->nullable();
            $table->integer('price_list_id')->nullable();
            $table->double('credit_quota')->nullable();
            $table->integer('erp_id')->nullable();
            $table->string('pay_condition', 255)->nullable();
            $table->string('send_point', 255)->nullable();
            $table->string('picture', 255)->nullable();
            $table->string('telephone2', 30)->nullable();
            $table->string('cellphone', 30)->nullable();
            $table->integer('minimum_order_value')->default(0)->nullable();
            $table->bigInteger('zone_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->boolean('retention_source')->nullable();
            $table->double('percentage_retention_source')->nullable();
            $table->boolean('retention_iva')->nullable();
            $table->double('percentage_retention_iva')->nullable();
            $table->boolean('retention_ica')->nullable();
            $table->double('percentage_retention_ica')->nullable();
            $table->double('ret_fue_prod_vr_limit')->nullable();
            $table->double('ret_fue_prod_percentage')->nullable();
            $table->double('ret_fue_serv_vr_limit')->nullable();
            $table->double('ret_fue_serv_percentage')->nullable();
            $table->double('ret_iva_prod_vr_limit')->nullable();
            $table->double('ret_iva_prod_percentage')->nullable();
            $table->double('ret_iva_serv_vr_limit')->nullable();
            $table->double('ret_iva_serv_percentage')->nullable();
            $table->double('ret_ica_prod_vr_limit')->nullable();
            $table->double('ret_ica_prod_percentage')->nullable();
            $table->double('ret_ica_serv_vr_limit')->nullable();
            $table->double('ret_ica_serv_percentage')->nullable();
            $table->integer('branchoffice_id')->nullable();
            $table->date('creation_date')->nullable();
            $table->string('other_telephones', 200)->nullable();
            $table->integer('payment_type_id')->nullable();
            $table->double('discount_percentage')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts_warehouses');
    }
}
