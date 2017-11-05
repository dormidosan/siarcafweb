<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<pre style="font-family: Arial, Verdana; font-size: 16px;">
Respetables mienbros de la Asamblea General Universitaria

TODO ESTA PERDIDO , NO HAY MAS QUE HACER

Se les recuerda que pueden revisar la agenda xxxxxx digital con sus anexos (documentos escaneados)
de sesion del xx de octubre  del 2017 en el sitio  <a href="http://localhost/phpmyadmin">Enlace a Siarcaf</a>  ingresando con su usuario y clave personal

Datos de la proxima sesion
	<stron>Lugar: </stron>{!!$lugar!!}
	<stron>Fecha: </stron>{!!$fecha!!}
	<stron>Hora: </stron>{!!$hora!!}
	<stron>Mensaje: </stron>{!!$mensaje!!}

Atentamente 

Carlos Alberto Noyola Sanchez
Mienbro de Consejo Superior Universitario
	
</pre>
<img src="{!! $message->embed(public_path() . '/images/logo_agu.jpg') !!}" />
</body>
</html>


