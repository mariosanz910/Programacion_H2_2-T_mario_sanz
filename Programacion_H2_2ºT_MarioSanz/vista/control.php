<?php
// Capturamos el id_usuario pasado por la URL
if (isset($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];
} else {
    $id_usuario = null;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h2 class="text-center m-0">Control de Usuario</h2>
            </div>
            <div class="card-body">
                <?php if ($id_usuario): ?>
                    <div class="alert alert-success">
                        <strong>Usuario con ID: <?= htmlspecialchars($id_usuario) ?> registrado correctamente.</strong>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning">
                        <strong>Error: No se ha registrado ningún usuario.</strong>
                    </div>
                <?php endif; ?>
                <a href="../index.php" class="btn btn-primary">Volver al Formulario</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
