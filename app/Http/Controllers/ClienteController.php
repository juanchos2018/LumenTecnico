<?php

namespace App\Http\Controllers;


use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    //


    public function records()
    {       
        $obj = Cliente::get();
        $array=array();
        if($obj != null){
            return response()->json(['status' => 200,'result' => $obj]);
        }else{
            return response()->json(['status' => 404,'result' => $array]);
        }
    }
}
