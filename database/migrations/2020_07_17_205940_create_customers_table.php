<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->length(40);
            $table->integer('cpf')->length(20); // ou cnpj.
            $table->string('street')->length(50);
            $table->integer('number')->length(10);
            $table->integer('zipcode')->length(10);
            $table->integer('fone')->length(11);
            $table->integer('fone_2')->length(11)->nullable();
            $table->tinyInteger('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customers');
    }
}
