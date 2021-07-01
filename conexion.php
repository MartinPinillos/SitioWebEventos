<?php

session_start(); //para guardar datos en esta sesion

//Conexion a la base de dato
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'SitioWebEventos'
);
 /*
//para chequear conexion con la base de datos
if (isset($conn)){
    echo 'DB is connected';
    //http://macintosh.local/SitioWebEventos/conexion.php
}
*/
?>