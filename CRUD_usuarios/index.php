<?php
include('../seguridad.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"/>

</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA ACADEMICO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../CRUD_docente/index.php">Docentes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page">Registrar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../login.php">Cerrar Sesion</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6">
                <form method="POST" id="frmUsuario">
                    <div class="row p-1">
                        <div class="col-3 col-md-3">
                            <label for="txtusuario">USUARIO:</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" name="txtusuario" id="txtusuario" 
                                placeholder="usuario" class="form-control" required pattern="[a-z0-9]{5,15}">
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-3 col-md-3">
                            <label for="txtclave">CLAVE:</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="password" name="txtclave" id="txtclave" 
                                placeholder="clave" class="form-control" required pattern="[a-z0-9]{5,15}">
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-3 col-md-3">
                            <label for="txtnombre">NOMBRE:</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <input type="text" name="txtnombre" id="txtnombre" 
                                placeholder="nombre" class="form-control" required pattern="[a-Z ]{3,75}">
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-3 col-md-3">
                            <label for="cbotipo">TIPO:</label>
                        </div>
                        <div class="col-9 col-md-9">
                            <select name="cbotipo" id="cbotipo" class="form-select">
                                <option value="administrador">ADMINISTRADOR</option>
                                <option value="usuario">USUARIO</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="submit" value="GUARDAR" name="btnGuardar" id="btnGuardar"
                                class="btn btn-primary">
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="reset" value="NUEVO" name="btnNuevo" id="btnNuevo"
                                class="btn btn-warning">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-6">
                <table class="table table-sm" id="tblUsuarios">
                    <thead>
                        <tr>
                            <th>USUARIO</th>
                            <th>NOMBRE</th>
                            <th>TIPO</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="usuario.js"></script>
</body>
</html>