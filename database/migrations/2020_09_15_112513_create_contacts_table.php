<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id()->nullable();
            $table->integer('subscriber_id')->nullable();
            $table->integer('identification_type')->nullable();
            $table->string('identification', 20)->nullable();
            $table->string('check_digit', 1)->nullable();
            $table->string('name', 150)->nullable();
            $table->string('surname', 60)->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('gender')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('address', 100)->nullable();
            $table->string('stratum', 1)->nullable();
            $table->string('code_ciiu', 45)->nullable();
            $table->string('main_telephone', 30)->nullable();
            $table->string('secondary_telephone', 30)->nullable();
            $table->string('fax', 30)->nullable();
            $table->string('cell_phone', 30)->nullable();
            $table->string('email', 60)->nullable();
            $table->string('web_page', 200)->nullable();
            $table->string('latitude', 45)->nullable();
            $table->string('length', 45)->nullable();
            $table->boolean('is_customer')->default(False)->nullable();
            $table->boolean('is_provider')->default(False)->nullable();
            $table->boolean('is_employee')->default(False)->nullable();
            $table->integer('class_person')->nullable();
            $table->integer('taxpayer_type')->nullable();
            $table->integer('tax_regime')->nullable();
            $table->boolean('declarant')->default(False)->nullable();
            $table->boolean('self_retainer')->default(False)->nullable();
            $table->dateTime('created_at', 0)->nullable();
            $table->dateTime('updated_at', 0)->nullable();
            $table->dateTime('deleted_at', 0)->nullable();
            $table->string('email_electronic_invoice', 60)->nullable();
            $table->string('observations', 2500)->nullable();
            $table->string('erp_id')->nullable();
            $table->string('physical_file_number')->nullable();
            $table->integer('pay_days')->nullable();
            $table->string('date_opening')->nullable();
            $table->string('tradename', 200)->nullable();
            $table->string('ERP_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
