<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte Dieta</title>

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
  top: 2%;
  text-align: center;
  text-transform: uppercase;
  text-align: center;
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
    <div style="position: absolute;"  align="left">
  <IMG SRC="{{ asset('images/Logo_UES.jpg') }}" width="13%" height="10%" >
</div>                                  
 <div  align="right">
  <IMG SRC="{{ asset('images/agu_web.jpg') }}" width="15%" height="15%" >
</div>                                                                
                                                                
                                               
 <div id="p" style="text-align: center;position: absolute;right: 25%;top: 3%">
    ASAMBLEA GENERAL UNIVERSITARIA<br/>
    DETALLE DE DIETA  DE ASAMBLEISTAS DEL MES {{$mes}} <br/>
    SECTOR PROFESIONAL NO DOCENTE
    
    PERIODO {{$anio}}
  </div>   

                   
</head>
  <body>

 
 <!--style="page-break-before: always;"-->

                <table id="cp"  border="1" cellpadding="0" cellspacing="0" >
                   
                  <thead>  <!-- ENCABEZADO TABLA-->
                    <tr>                     
                    <th>No. </th>                     
                    <th>SECTOR</th>                     
                    <th>NOMBRES</th>
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
                      <td>{{$result->primer_nombre}} {{$result->segundo_nombre}} {{$result->primer_apellido}}{{$result->segundo_apellido}}</td>
                    
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      <td> </td>
                      
                    </tr> 
                      
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

                

<!--<div class="page">
    First page
</div>
<div class="page">
    Second page
</div>-->
              
 
  <!--  <div style="page-break-before: always;">
    </div>   -->
  </body>
  <script type="text/php">
 $text = 'pagina: {PAGE_NUM} / {PAGE_COUNT}';
 $font = Font_Metrics::get_font("helvetica", "bold");
 $pdf->page_text(36, 18, $text, $font, 9);
</script>
</html>
