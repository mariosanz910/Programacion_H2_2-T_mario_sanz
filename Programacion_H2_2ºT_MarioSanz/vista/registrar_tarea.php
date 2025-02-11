<?php
// Incluir el controlador necesario
require_once "../controlador/RegistroController.php";  
$controller = new UsuariosController();  

// Obtener el id_usuario desde la URL y validar
$id_usuario = isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario']) ? (int) $_GET['id_usuario'] : null;

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = isset($_POST["id_usuario"]) && is_numeric($_POST["id_usuario"]) ? (int) $_POST["id_usuario"] : null;
    $titulo = trim($_POST["titulo"]);
    $descripcion = trim($_POST["descripcion"]);
    $estado = $_POST["estado"];
    
    if ($id_usuario && !empty($titulo) && !empty($descripcion)) {
        if ($controller->agregartarea($id_usuario, $titulo, $descripcion, $estado)) {
            header("Location: controlsesion.php?id_usuario=" . urlencode($id_usuario) . "&mensaje=exito");
            exit();
        } else {
            header("Location: controlsesion.php?id_usuario=" . urlencode($id_usuario) . "&mensaje=exito");
            exit();
            $mensaje = "Error al agregar la tarea.";
        }
    } else {
        $mensaje = "Todos los campos son obligatorios.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h2 class="text-center m-0">Nueva Tarea</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input type="hidden" name="id_usuario" value="<?= htmlspecialchars($id_usuario) ?>">
                    
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Título de la Tarea</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="estado" class="form-label">Estado</label>
                        <select class="form-control" id="estado" name="estado" required>
                            <option value="pendiente">Pendiente</option>
                            <option value="completada">Completada</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-success w-100">Agregar Tarea</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
