<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de selección</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }
        .boton {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 18px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .boton:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Seleccione una opción</h1>
    <a href="vista/registro_usuarios.php" class="boton">Registro de Usuarios</a>
    <a href="vista/inicio_sesion.php" class="boton">Inicio de sesión</a>

</body>
</html>
