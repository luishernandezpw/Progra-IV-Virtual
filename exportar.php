<?php
include('seguridad.php');
include('Config/Config.php');

$conexion->consultas('SELECT * FROM docentes');
$docentes = $conexion->obtener_datos();

if( $_GET && isset($_GET['tipo']) ){
    $tipo = $_GET['tipo'];
    switch($tipo){
        case 'pdf':
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="docentes.pdf"');
            break;
        case 'excel':
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment; filename="docentes.xls"');
            break;
    }
}else{
    //header('location:CRUD_docente/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Docente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>

</head>
<body>
    <div class="container-fluid"><br>
        <h2 class="text-center">LISTADO DE DOCENTES</h2><br><br>
        <table class="table table-sm" id="tblDocentes">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>DIRECCION</th>
                    <th>TELEFONO</th>
                    <th>DUI</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($docentes as $index => $docente ){ ?>
                <tr>
                    <td><?php echo $docente['nombre'] ?></td>
                    <td><?php echo $docente['direccion'] ?></td>
                    <td><?php echo $docente['telefono'] ?></td>
                    <td><?php echo $docente['dui'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>