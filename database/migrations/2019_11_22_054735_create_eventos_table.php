<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('eventos', function (Blueprint $table) {
      $table->BigIncrements('id')->unsigned();
      $table->dateTime('fecha');
      $table->string('tipo');
      $table->float('precio');
      $table->bigInteger('quien_contrato')->unsigned()->nullable();
      $table->integer('confirmado');
      $table->bigInteger('cliente_id')->unsigned();
      $table->bigInteger('paquete_id')->unsigned();
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
    Schema::dropIfExists('eventos');
  }
}
