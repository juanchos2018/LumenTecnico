<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Servicio extends Model
{
    

    public static function recordsServices(){
        return DB::table('servicios')
        ->join("clientes", "clientes.id", "=", "servicios.cliente_id")        
        ->join("categorias", "categorias.id", "=", "servicios.categoria_id")             
        ->select('servicios.id','clientes.nombres','clientes.apellidos','categorias.nombre_categoria','servicios.created_at')           
        ->orderBy('servicios.created_at','DESC')->get();      
    }

}
