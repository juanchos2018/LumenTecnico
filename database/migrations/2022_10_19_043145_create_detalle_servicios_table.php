<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        ///para ordenadores

        Schema::create('detalle_servicios', function (Blueprint $table) {
            
            $table->increments('id'); 

            $table->string('marca_modelo', 100); 
            $table->string('marca_serie', 100); 

            $table->string('bateria', 100)->nullable(); 
            $table->string('bateria_serie', 100)->nullable(); 

            $table->string('cargador', 100)->nullable(); 
            $table->string('cargador_serie', 100)->nullable();
            
            $table->string('pantalla', 100)->nullable(); 
            $table->string('pantalla_serie', 100)->nullable();


            $table->string('hdd', 100)->nullable(); 
            $table->string('hdd_serie', 100)->nullable();


            $table->string('ram', 100)->nullable(); 
            $table->string('ram_serie', 100)->nullable();


            $table->string('mouse', 100)->nullable(); 
            $table->string('mouse_serie', 100)->nullable();



            $table->string('teclado', 100)->nullable(); 
            $table->string('teclado_serie', 100)->nullable();

            $table->string('otros', 100)->nullable(); 
     
            $table->string('problema', 200)->nullable(); 



            $table->integer('servicio_id')->unsigned();
            $table->foreign('servicio_id')->references('id')->on('servicios');


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
        Schema::dropIfExists('detalle_servicios');
    }
}
