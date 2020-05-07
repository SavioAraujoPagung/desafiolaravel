<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaccaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faccoes', function (Blueprint $table) {
            $table->id();
            $table->string('nomeFantasia');
            $table->string('razaoSocial');
            $table->string('endereço');
            $table->string('telefone');
            $table->string('cnpj');
            $table->boolean('situacao'); 
            $table->crypt('senha');   
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
        Schema::dropIfExists('faccoes');
    }
}
