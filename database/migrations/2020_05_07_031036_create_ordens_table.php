<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cliente_id')->unsigned();
            $table->bigInteger('empleado_id')->unsigned();
            $table->string('estadoOrden')->default('Pendiente');
            $table->string('serialOrden')->unique();
            $table->string('marcaEquipo');
            $table->string('modeloEquipo');
            $table->string('descripcionFallo');
            $table->float('pvp', 8,2);
            $table->string('notificacion')->default('Pendiente');
            $table->timestamps();
            //creamos las foreign keys hay dos cliente_id y empleado_id
            $table->foreign('cliente_id')
            ->references('id')
            ->on('clientes')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('empleado_id')
            ->references('id')
            ->on('empleados')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordens');
    }
}
