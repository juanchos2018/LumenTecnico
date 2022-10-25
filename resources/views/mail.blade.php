<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<center><h2>Recepcion de {{$tipo_service}}</h2> </center>
    <table class="table" width="100%"  >
        <th>
            <tr>
               <td>Cliente</td> 
               <td>{{ $cliente }}</td> 
               <td>Ci/Ruc</td> 
               <td>{{$ruc}}</td>               
               <td></td>    
            </tr>           
        </th>
        <tbody>
            <tr>
                <td>Direccion</td>
                <td>{{$direccion}}</td>
                <td>   </td>
            </tr>

            <tr>
                <td>{{$correo}}</td>
                <td><strong>Orden de Trabajo</strong></td>
                <td>Nº {{$servicio_id}}</td>
            </tr>
            <tr></tr>
            
        </tbody>
    </table>

    <table class="table-bordered" width="100%" >
        <tr>
            <td></td>
            <td>Detalle</td>
            <td>N/Serie</td>
           
            <td></td>
            <td>Detalle</td>
            <td>Serie</td>

        </tr>
        <tr>
            <td>Modelo</td>
            <td>{{$marca_modelo}}</td>
            <td>{{$marca_serie}}</td>
         
            <td>Disco</td>
            <td>{{$hdd}}</td>
            <td>{{$hdd_serie}}</td>

        </tr>

        <tr>
            <td>Cargador</td>
            <td>Marca Cargador</td>
            <td>serieCargador</td>
         
            <td>Pantalla</td>
            <td>Marca Pantalla</td>
            <td>Serie Pantalla</td>
            
        </tr>
       <tr>
        <td>Problema</td>
        <td>{{$problema}}</td>
       </tr>
    </table>
</body>
</html>