<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosagensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosagens', function (Blueprint $table) {

            $table->increments('id');

            $table->unsignedInteger('idproduto');
            $table->unsignedInteger('idcultura');
            $table->unsignedInteger('idpraga');

            $table->string('dosagem', 200);
            $table->timestamps();

            $table->unique(['idproduto', 'idcultura', 'idpraga'], 'produto_cultura_praga');

            $table->foreign('idproduto')->references('id')->on('produtos')->onDelete('CASCADE');
            $table->foreign('idcultura')->references('id')->on('culturas')->onDelete('CASCADE');
            $table->foreign('idpraga')->references('id')->on('pragas')->onDelete('CASCADE');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dosagens');
    }
}
