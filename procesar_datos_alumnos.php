<?php
$nombre = $_POST['txtnombre'];
$direccion = $_POST['txtdireccion'];
$edad = $_POST['txtedad'];
$msg = '';

if($edad>=1 && $edad<=2){
    $msg = 'Eres un bebe';
}else if($edad<=11){
    $msg='Eres un niño';
}else if($edad<=17){
    $msg = 'Eres un adolescente';
}else if($edad<=65){
    $msg='Eres un adulto, tienes responsabilidades';
}else if($edad>65){
    $msg = 'Larga Vida';
}else{
    $msg = 'Error en la edad';
}

echo "Hola $nombre; vives en $direccion; tu edad es: $edad; $msg";
?>