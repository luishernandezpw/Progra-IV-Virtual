<?php
$url_con = file_exists('../Conexion/Conexion.php') ? '../Conexion/Conexion.php' : 'Conexion/Conexion.php';
include($url_con);

$conexion = new Conexion('mysql:host=localhost; charset=utf8; dbname=db_sistema_academico',
    'root', '');
?>