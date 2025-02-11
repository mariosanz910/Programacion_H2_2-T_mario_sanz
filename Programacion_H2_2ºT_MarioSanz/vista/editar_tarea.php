<?php
require_once "../controlador/RegistroController.php";

$controller = new UsuariosController();

// Obtener el ID de la tarea desde el parámetro de la URL
$id_tarea = $_GET["id_tarea"] ?? null;

if (!$id_tarea) {
    die("ID de tarea no proporcionado.");
}

$tarea = $controller->obtenertareaPorId($id_tarea);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtener el nuevo estado desde el formulario
    $nuevoEstado = $_POST["estado"];

        // Condicionales para comprobar el estado del cambio
    if ($controller->editarTarea($id_tarea, $nuevoEstado)) {
        header("Location: inicio_sesion.php"); 
        exit();
    } else {
        header("Location: inicio_sesion.php"); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Editar Estado de Tarea</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título de la tarea</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?= htmlspecialchars($tarea['titulo']) ?>" disabled>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado de la tarea</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="pendiente" <?= ($tarea['estado'] == 'pendiente') ? 'selected' : '' ?>>Pendiente</option>
                    <option value="completada" <?= ($tarea['estado'] == 'completada') ? 'selected' : '' ?>>Completada</option>
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                <a href="tareas.php" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
