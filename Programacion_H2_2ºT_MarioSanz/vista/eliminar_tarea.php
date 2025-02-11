<?php 
require_once "../controlador/RegistroController.php";

// Inicializa variables
$id_tarea = $_GET["id_tarea"] ?? null;
$controller = new UsuariosController(); // Asegúrate de instanciar el controlador correctamente

if ($id_tarea) {
    // Obtener datos de la tarea a eliminar
    $tarea = $controller->obtenertareaPorId($id_tarea);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controller->eliminartarea($id_tarea);
    header("Location: inicio_sesion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Eliminar Tarea</h2>
        <form method="POST" action="">
            <div class="alert alert-warning" role="alert">
                ¿Estás seguro de que deseas eliminar la tarea <?= htmlspecialchars($tarea["titulo"] ?? "") ?>?
            </div>
            <div class="d-flex justify-content-between">    
                <button type="submit" class="btn btn-danger">Eliminar Tarea</button>
                <a href="controlsesion.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
