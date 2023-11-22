<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('terminal', 4);
            $table->string('evento', 100);
            $table->foreignId('id_categoria');
            $table->longText('descrip');
            $table->integer('prioridad');
            $table->timestamp('fecha_crea');
            $table->timestamp('fecha_cierre')->nullable();
            $table->integer('status');
            $table->foreignId('user', 25);
            $table->foreignId('atiende', 25)->nullable()->index();
            $table->longText('solucion')->nullable();;
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
        Schema::dropIfExists('tickets');
    }
}