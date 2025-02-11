<?php
// Incluye el controlador necesario
require_once "../controlador/RegistroController.php";
$controller = new UsuariosController();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $contrasena = $_POST["contrasena"];

    $usuarioValido = $controller->validarUsuario($id, $contrasena);

    if ($usuarioValido = 1) {  
        header("Location: controlsesion.php?id_usuario=" . urlencode($id));
        exit();
    } elseif ($usuarioValido = 0) {
        header("Location: errorsesion.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Inicio de Sesión</h2>
            </div>
            <div class="card-body">
                <form method="POST">
                <div class="mb-3">
                        <label for="id" class="form-label">DNI <strong>Sin letra</strong></label>
                        <input type="text" class="form-control" id="id" name="id" required maxlength="8" pattern="^\d{8}$" title="DNI sin letra" />
                    </div>
                    <div class="mb-3">
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
