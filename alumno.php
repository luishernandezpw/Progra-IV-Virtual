<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Alumnos</title>
</head>
<body>
    <form action="procesar_datos_alumnos.php" method="POST">
        <label for="txtnombre">NOMBRE: </label>
        <input type="text" name="txtnombre" id="txtnombre" 
            required title="Por favor ingrese su nombre">
        <br><br>
        
        <label for="txtdireccion">DIRECCION: </label>
        <input type="text" name="txtdireccion" id="txtdireccion" 
            required title="Por favor ingrese su direccion de residencia">
        <br><br>
        
        <label for="txtedad">EDAD:</label>
        <input type="number" name="txtedad" id="txtedad" 
            required title="Por favor ingrese su edad">
        <br><br>

        <input type="submit" value="ENVIAR DATOS">
    </form>
</body>
</html>