<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cliente;
use App\Models\Servicio;
use App\Models\DetalleServicio;
use App\Models\DetalleServicioImp;

use Illuminate\Support\Facades\Mail;

class ServicioController extends Controller
{
    


    public function records(){

        $result=  Servicio::recordsServices();        


        return response()->json(['status' => 200, 'result' => $result]);     

    }



    public function store(Request $request){

        try
        {  

        //$name_cliente=null;    
        $cliente_id=null;
        $clienteExis =  Cliente::where('ruc',$request->ruc)->first();
        if ($clienteExis) {
            $cliente_id=$clienteExis->id;
        }
        else{

            $cliente = new Cliente();
            $cliente->ruc=$request->ruc;
            $cliente->nombres=$request->nombres;
            $cliente->apellidos=$request->apellidos;
            $cliente->correo=$request->correo;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();
            $cliente_id=$cliente->id;
        }
            
        $tipo_service="";
        if ($request->sub_categoria_id=="1") {
            $tipo_service="Laptop";
        }
        else if ($request->sub_categoria_id=="2") {
            $tipo_service="Computadora";
        }

        else if ($request->sub_categoria_id=="3") {
            $tipo_service="Impresora";
        }
        else if ($request->sub_categoria_id=="4") {
            $tipo_service="Impresora";
        }
        else if ($request->sub_categoria_id=="5") {
            $tipo_service="Impresora";
        }

        $servicio = new Servicio();
        $servicio->categoria_id=$request->categoria_id;
        $servicio->sub_categoria_id=$request->sub_categoria_id;
        $servicio->cliente_id=$cliente_id;
        $servicio->fecha="2022-10-23";
        $servicio->total=100;
        $servicio->save();

        $servicio_id=$servicio->id;

        $detalle = new DetalleServicio();

        $detalle->marca_modelo=$request->marca_modelo;
        $detalle->marca_serie=$request->marca_serie;
        $detalle->bateria=$request->bateria;
        $detalle->bateria_serie=$request->bateria_serie;
        $detalle->cargador=$request->cargador;
        $detalle->cargador_serie=$request->cargador_serie;
        $detalle->pantalla=$request->pantalla;
        $detalle->pantalla_serie=$request->pantalla_serie;
        $detalle->hdd=$request->hdd;
        $detalle->hdd_serie=$request->hdd_serie;
        $detalle->ram=$request->ram;
        $detalle->ram_serie=$request->ram_serie;
        $detalle->mouse=$request->mouse;
        $detalle->mouse_serie=$request->mouse_serie;
        $detalle->teclado=$request->teclado;
        $detalle->teclado_serie=$request->teclado_serie;
        $detalle->problema=$request->problema;
        $detalle->servicio_id=$servicio_id;


        $detalle->save();

        $sendemail =self::SedEmail($request->nombres,$request->apellidos,$request->direccion,$request->correo,$request->telefono,$detalle,$tipo_service,$request->ruc);
        
        return response()->json(['status' => 200, 'result' => ['obj' => $detalle]]);     


     } catch (\Exception $e){   
       
         return response()->json(['status' => 404, 'result' => $e->getMessage()]);
        } 

    }
     
    public function storeimp(Request $request){

        try
        {  

        $cliente_id=null;
        $clienteExis =  Cliente::where('ruc',$request->ruc)->first();
        if ($clienteExis) {
            $cliente_id=$clienteExis->id;
        }
        else{

            $cliente = new Cliente();
            $cliente->ruc=$request->ruc;
            $cliente->nombres=$request->nombres;
            $cliente->apellidos=$request->apellidos;
            $cliente->correo=$request->correo;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();
            $cliente_id=$cliente->id;
        }
             

        $servicio = new Servicio();
        $servicio->categoria_id=$request->categoria_id;
        $servicio->sub_categoria_id=$request->sub_categoria_id;
        $servicio->cliente_id=$cliente_id;
        $servicio->fecha="2022-10-23";
        $servicio->total=100;
        $servicio->save();

        $servicio_id=$servicio->id;

        $detalle = new DetalleServicioImp();

        $detalle->marca_modelo=$request->marca_modelo;
        $detalle->marca_serie=$request->marca_serie;
        $detalle->adaptador=$request->adaptador;
        $detalle->adaptador_serie=$request->adaptador_serie;
        $detalle->tinta=$request->tinta;
        $detalle->tinta_serie=$request->tinta_serie;
        $detalle->toner=$request->toner;
        $detalle->toner_serie=$request->toner_serie;
        $detalle->cartucho=$request->cartucho;
        $detalle->cartucho_serie=$request->cartucho_serie;
        $detalle->cinta=$request->cinta;
        $detalle->cinta_serie=$request->cinta_serie;
        $detalle->cables=$request->cables;
        $detalle->cables_serie=$request->cables_serie;
        $detalle->problema=$request->problema;
        $detalle->otros=$request->otros;
        $detalle->servicio_id=$servicio_id;


        $detalle->save();

        return response()->json(['status' => 200, 'result' => ['obj' => $detalle]]);     


      } catch (\Exception $e){   
       
         return response()->json(['status' => 404, 'result' => $e->getMessage()]);
        } 

    }


    public function SedEmail($nombres,$apellidos,$direccion,$correo,$telefono,$detalle,$tipo_service,$ruc){
        try
        {  

         $data = array(
                'cliente'=> $nombres.' '.$apellidos,
                'direccion'=>$direccion,
                'correo'=>$correo,
                'telefono'=>$telefono,
                'marca_modelo'=>$detalle->marca_modelo,
                'marca_serie'=>$detalle->marca_serie,
                'bateria'=>$detalle->bateria,
                'bateria_serie'=>$detalle->bateria_serie,
                'cargador'=>$detalle->cargador,
                'cargador_serie'=>$detalle->cargador_serie,
                'pantalla'=>$detalle->pantalla,
                'pantalla_serie'=>$detalle->pantalla_serie,
                'hdd'=>$detalle->hdd,
                'hdd_serie'=>$detalle->hdd_serie,
                'ram'=>$detalle->ram,
                'ram_serie'=>$detalle->ram_serie,
                'mouse'=>$detalle->mouse,
                'mouse_serie'=>$detalle->mouse_serie,
                'teclado'=>$detalle->teclado,
                'teclado_serie'=>$detalle->teclado_serie,
                'problema'=>$detalle->problema,
                'id'=>$detalle->servicio_id,
                'tipo'=>$tipo_service,
                'ruc'=>$ruc,
               
         );

         $ruta_pdf = 'biller/holamundo.pdf';
                //to al cliente que va dirigido
        $data_mail = array(
            'from' => "jcarlossenati@gmail.com",
            'name_from' => "empresa  1",
            'to' =>"jc_nestas@gmail.com",
            'subject' => 'Comprobante de Pago',         
            'pdf' => $ruta_pdf,
            'name_pdf' => "docunetpo de prueba",
        );
        

      
        Mail::send('mail', $data, function($message) use ($data_mail) {
            $message->to($data_mail['to'],'')->subject($data_mail['subject']);
            $message->from($data_mail['from'],$data_mail['name_from']);
          
            // $message->attach($data_mail['pdf'], [
            //     'as' => $data_mail['name_pdf'],
            //     'mime' => 'application/pdf',
            // ]);
        
        });
        return response()->json(['status' => 200, 'result' => 'sucess']);     

        } catch (\Exception $e){   
       
        return response()->json(['status' => 404, 'result' => $e->getMessage()]);
       } 
    }
}
