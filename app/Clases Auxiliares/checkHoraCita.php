<?php
/**
 * Created by PhpStorm.
 * User: Jonatan Lopez
 * Date: 19/02/2017
 * Time: 1:03
 */

$localhost = 'localhost';
$user = 'jonatan';
$password = '44239029';
$db = 'guiasymfony';

$enlace = mysqli_connect($localhost, $user, $password, $db);

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    exit();
}

$email = $_POST["email"];
///query para determinar que ese correo existe o no
$query = "SELECT * FROM usuario WHERE email =" . "'" . $email . "'";
$result = mysqli_query($enlace, $query);

//si es cero es que esta disponible ese email
if (mysqli_num_rows($result) == 0) {
    echo 1;
} else {
    echo 0;
}

mysqli_close($enlace);
?>

