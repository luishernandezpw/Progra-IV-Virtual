<?php
@session_start();
$_SESSION['logueado'] = 'no';
session_destroy();

if ($_POST && isset($_POST['txtusuario']) && isset($_POST['txtclave']) && strlen($_POST['txtusuario'])>=5) {
    $usuario = htmlentities($_POST['txtusuario'], ENT_QUOTES);
    $clave = htmlentities($_POST['txtclave'], ENT_QUOTES);

    include('Config/Config.php');
    $conexion->consultas('select * from usuarios where usuario=? AND clave=?',
        $usuario, $clave);
    $usuarios = $conexion->obtener_datos();
    if( count($usuarios)>0 ){
        @session_start();
        $_SESSION['logueado'] = 'si';
        header('location:CRUD_docente/index.php');
    }else{
        echo '<br><br>Usuarioy/o Clave incorrecto... por favor inteneto de NUEVO';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIAR SESSION</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>
</head>
<body>
    <form action="login.php" method="POST">
        <div class="container-fluid">
            <div class="row p-1">
                <div class="col-12">LOGIN.</div>
            </div>
            <div class="row p-1">
                <div class="mb-3">
                    <label for="txtusuario" class="form-label">USUARIO:</label>
                    <input type="text" class="form-control" id="txtusuario" name="txtusuario" placeholder="usuario"
                        required pattern="[a-z0-9]{5,15}">
                </div>
            </div>
            <div class="row p-1">
                <div class="mb-3">
                    <label for="txtclave" class="form-label">CLAVE:</label>
                    <input type="password" class="form-control" id="txtclave" name="txtclave" placeholder="clave"
                        required pattern="[a-z0-9]{5,15}">
                </div>
            </div>
            <div class="row p-1">
                <div class="mb-3">
                    <input type="submit" value="INICIAR SESSION" class="btn btn-success">
                </div>
            </div>
        </div>
    </form>
</body>
</html>