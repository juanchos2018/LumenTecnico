<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleServicioImpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_servicio_imps', function (Blueprint $table) {


            
            $table->increments('id'); 

            $table->string('marca_modelo', 100); 
            $table->string('marca_serie', 100); 

            $table->string('adaptador', 100)->nullable(); 
            $table->string('adaptador_serie', 100)->nullable(); 


            $table->string('tinta', 100)->nullable(); 
            $table->string('tinta_serie', 100)->nullable(); 

            $table->string('toner', 100)->nullable(); 
            $table->string('toner_serie', 100)->nullable(); 


            $table->string('cartucho', 100)->nullable(); 
            $table->string('cartucho_serie', 100)->nullable(); 


            $table->string('cinta', 100)->nullable(); 
            $table->string('cinta_serie', 100)->nullable(); 


            $table->string('cables', 100)->nullable(); 
            $table->string('cables_serie', 100)->nullable(); 
      

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
        Schema::dropIfExists('detalle_servicio_imps');
    }
}
