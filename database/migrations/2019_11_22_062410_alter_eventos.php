<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEventos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('eventos', function($table)
      {
        $table->foreign('quien_contrato')->references('id')->on('users');
        $table->foreign('cliente_id')->references('id')->on('users');
        $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
