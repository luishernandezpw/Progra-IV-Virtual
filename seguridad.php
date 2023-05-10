<?php
@session_start();
if( !isset($_SESSION['logueado']) || $_SESSION['logueado']!=='si'){
    header('location:../login.php');
}
?>