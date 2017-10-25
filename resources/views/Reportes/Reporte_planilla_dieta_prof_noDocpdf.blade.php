<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Dieta</title>
  <style type="text/css">  
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
  top: 2%;
  text-align: center;
  aling-items: center;
  text-transform: uppercase;
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
  font: bold;
  top: 15%;
}

#cp {
  position: fixed;
  font-family: "ARIAL", serif;
  font-size: 10pt;
  top: 13%;
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
                                         
                                               
 <div id="p" style="position:fixed;text-align: center;">
    ASAMBLEA GENERAL UNIVERSITARIA<br/>
    DETALLE DE DIETA  DE ASAMBLEISTAS DEL MES {{$mes}}<br/>
    SECTOR PROFESIONAL NO DOCENTE
    <hr  /> 
    PERIODO {{$anio}}
  </div>   
                   
</head>
  <body>

 <!--@if(!($resultados==NULL))
  @foreach($resultados as $result)
  {{$result->nom_sect}} {{$result->nom_fact}} 
   @endforeach
  @endif
-->
<div id="cp" > <!--style="page-break-before: always;"-->

                <table  border="1" cellpadding="0" cellspacing="0" style="text-align: center;">
                   
                  <thead>  <!-- ENCABEZADO TABLA-->
                    <tr>                     
                    <th>No. </th>                     
                    <th>SECTOR</th>                     
                    <th>NOMBRES</th>
                    <th>FACULTAD</th>
                    <th>1a. SESION</th>
                    <th>2a. SESION</th>
                    <th>3a. SESION</th>
                    <th>4a. SESION</th>
                    <th>TOTAL</th>
                    </tr>
                  </thead>

                    <tbody>  <!-- CUERPO DE LA TABLA-->
                    @php $i=1 @endphp
                     @foreach($resultados as $result)

                       <tr>                                     
                      <td>
                       {{$i}}
                      </td>
                      <td>
                         PROF. NO DOCENTE
                      </td>
                      <td>{{$result->primer_nombre}} {{$result->segundo_apellido}}</td>
                    
                      <td>{{$result->nom_fact}} </td>
                      <td> - </td>
                      <td> - </td>
                      <td> - </td>
                      <td> - </td>
                      <td>$ -  </td>                      
                    </tr> 
                  
                 @if($i>25)
                 <div style="page-break-before: always;">

                  
                  

                 </div> 
                 @endif
                       @php $i=$i+1 @endphp
   @endforeach           
                

                    <tr>                                     
                      <td>
                        
                      </td>
                      <td>
                        
                      </td>
                      <td>PASAN...</td>
                    
                      <td>$ - </td>
                      <td>$ - </td>
                      <td>$ - </td>
                      <td>$ - </td>
                      <td>$ - </td>
                      
                    </tr>

                   </tbody>

                </table>
              
 </div>
   
  </body>
</html>
