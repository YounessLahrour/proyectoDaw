<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('dni')->unique();
            $table->string('direccion');
            $table->string('provincia');
            $table->enum("estadoEmpleo", ["Alta","Baja" ]);
            $table->string('telefono')->unique();
            $table->date('fechaNacimiento');
            $table->string('mail')->unique();
            $table->string('foto')->default('/img/empleados/default.jpg');
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
        Schema::dropIfExists('empleados');
    }
}
