<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Permisos Temporales</title>
  <style type="text/css" media="print">  
  #watermark {
    position: fixed;
    top: 45%;
    width: 100%;
    text-align: center;
    opacity: .4;
    transform: rotate(270deg);
    transform-origin: 50% 50%;
    z-index: -1000;
    
  }
  #centrar{

    position: fixed;
    top: 45%;
    width: 100%;
     text-align: center;
  }

  #p {
  font-family: "ARIAL", serif;
  font-size: 12pt;
  font: bold;
  top: 5%;
  text-align: center;
  aling-items: center;
}

#mp {
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  top: 9%;
}

#nt {
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  
  top: 30%;
}

#cp {
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  top: 20%;
}

#cp1 {
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  font: bold;
  top: 25%;
}

#cp2{
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
 
  top: 30%;
}

#cp3{
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  font: bold;
  top: 35%;
}

#cp4{
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  
  top: 40%;
}

#cp5{
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  
  top: 50%;
}


#footer{
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  font: bold;
  top: 85%;
}

#footer1{
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  top: 88%;
}


</style>
                                         
                                               
 <div id="p" >
    Sesión Plenaria de Asamblea General Universitaria Fecha: {{$fecha}}<br/>
    Solicitud de PERMISO TEMPORAL<br/>
     
  </div>   
                   
</head>
  <body>
 
<div id="nt">
                <table  border="1" cellpadding="0" cellspacing="0" style="text-align: center;">
                   
                  <thead>  <!-- ENCABEZADO TABLA-->
                    <tr>                     
                    <th>Nombre del solicitante</th>                     
                    <th>Firma</th>                     
               
                    <th>Hora Salida</th>
                    <th>Firma del secretario de Junta Directiva en el que hace constar la hora en que regreso el/la Asambleista</th>
                   
                    </tr>
                  </thead>

                    <tbody>  <!-- CUERPO DE LA TABLA-->
                      @foreach($resultados as $result)
                          <tr>                                     
                           <td>Asambleista: {{$result->primer_nombre}} {{$result->primer_apellido}}  <br/>Delego a: _____________</td>
                           <td><pre>_________________</pre></td>
                          
                           <td>{{$result->salida}}</td>
                           <td>Hora a la que se reincorporo el/la Asambleista: {{$result->entrada}}</td>              
                          </tr> 
                       @endforeach                        
                   </tbody>

                </table>
 </div>

  </body>
</html>
