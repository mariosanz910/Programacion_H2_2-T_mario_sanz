<?php
require_once '../config/class_conexion.php';

class usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function agregarusuario($id, $nombre_usuario, $correo, $contrasena,) {
        $query = "INSERT INTO usuarios (id, nombre_usuario, correo, contrasena) VALUES (?, ?, ?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("isss", $id, $nombre_usuario, $correo, $contrasena);

        if ($sentencia->execute()) {
            echo "usuario agregado con éxito.";
        } else {
            echo "Error al agregar usuario: " . $sentencia->error;
        }

        $sentencia->close();
    }
}