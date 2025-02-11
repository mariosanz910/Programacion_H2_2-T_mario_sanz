<?php
$id_usuario = htmlspecialchars($_GET["id_usuario"]); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h2 class="text-center m-0">Bienvenido</h2>
            </div>
            <div class="card-body text-center">
                <h3 class="mb-3">Hola, usuario con DNI: <strong><?php echo $id_usuario; ?></strong></h3>
                <p>Has iniciado sesión correctamente.</p>
                <a href="../index.php" class="btn btn-primary">Ir al menú principal</a>
            </div>
        </div>
    </div>
    <br>
    <?php
require_once "../controlador/RegistroController.php";
$controller = new UsuariosController();
$Usuarios = $controller->listartareas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Usuarios Registrados</h2>
            </div>
            <div class="card-body">
            <table class="table table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID Usuario</th>
            <th>Título</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($Usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario["id_usuario"] ?></td>
                <td><?= $usuario["titulo"] ?></td>
                <td><?= $usuario["descripcion"] ?></td>
                <td><?= $usuario["estado"] ?></td>
                <td>
                    <a href="editar_tarea.php?id=<?= $usuario["id_tarea"] ?>" class="btn btn-warning">Actualizar Estado</a>
                    <a href="eliminar_tarea.php?id=<?= $usuario["id_tarea"] ?>" class="btn btn-danger">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="text-center mt-3">
<a href="registrar_tarea.php?id_usuario=<?= urlencode($id_usuario) ?>" class="btn btn-success">Agregar tareas</a>

<a href="registrar_tarea.php" class="btn btn-danger">Cerrar sesión</a>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
