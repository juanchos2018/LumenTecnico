<?php

namespace App\Http\Controllers;

use App\Models\Usuario;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function Login(Reqesut $request){

        $user= Usuario::where('usuario',$request->usuario)->where('password',$request->password)->first();

        if ($user) {
              return response()->json(['status' => 200, 'result' => ['user' => $user]]);
        }else{
            return response()->json(['status' => 400,'result'=>null]);
        }
    
    }

    public function records()
    {
        try
        { 
            $rescords = Usuario::get();
            if($rescords){           
                return response()->json(['status' => 200, 'result' =>  $rescords]);
            }else{           
                return response()->json(['status' => 404,'result'=>null]);
            }
        } catch (\Exception $e){   
            return response()->json(['status' => 404,'result'=>$e->getMessage()]);
           
        } 
    }

}
