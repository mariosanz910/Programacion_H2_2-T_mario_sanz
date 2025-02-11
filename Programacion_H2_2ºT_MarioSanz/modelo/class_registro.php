<?php
require_once '../config/class_conexion.php';

class usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    /* *********************************************************************** */
    public function agregartarea($id_usuario, $titulo, $descripcion, $estado){
        $query = "INSERT INTO tareas (id_usuario, titulo, descripcion, estado) VALUES (?, ?, ?, ?)";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("isss", $id_usuario, $titulo, $descripcion, $estado);
    
        if ($sentencia->execute()) {
            echo "Tarea agregada con éxito.";
        } else {
            echo "Error al agregar tarea: " . $sentencia->error;
        }
    
        $sentencia->close();
    }
    /* *********************************************************************** */
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

    
    public function validarUsuario($id, $contrasena) {
        $query = "SELECT * FROM usuarios WHERE id = ? AND contrasena = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("is", $id, $contrasena);  
        $sesion = 0;
    
        // Ejecuta la consulta
        $sentencia->execute();
        $resultado = $sentencia->get_result();
    
        if ($resultado->num_rows > 0) {
            $sesion = 1;
        } else {
            $sesion = 0;
        }
        return $sesion;
    }

    public function obtenertareas() {
        $query = "SELECT * FROM tareas";
        $resultado = $this->conexion->conexion->query($query);
        $usuarios = [];
        while ($fila = $resultado->fetch_assoc()) {
            $usuarios[] = $fila;
        }
        return $usuarios;
    }

    public function eliminartarea($id_tarea) {
        $query = "DELETE FROM tareas WHERE id_tarea = ?";
        $sentencia = $this->conexion->conexion->prepare($query);
        $sentencia->bind_param("i", $id_tarea);
    
        if ($sentencia->execute()) {
            echo "Tarea eliminada con éxito.";
        } else {
            echo "Error al eliminar tarea: " . $sentencia->error;
        }
    
        $sentencia->close();
    }
    

    public function obtenertareaPorId($id_tarea) {
        // Asegúrate de que la consulta esté correcta
        $query = "SELECT * FROM tareas WHERE id_tarea = ?";
        
        // Preparar la consulta
        $sentencia = $this->conexion->conexion->prepare($query);
        
        // Verificar si la preparación fue exitosa
        if ($sentencia === false) {
            die('Error en la preparación de la consulta: ' . $this->conexion->conexion->error);
        }
    
        // Vincular los parámetros
        $sentencia->bind_param("i", $id_tarea);
    
        // Ejecutar la consulta
        $sentencia->execute();
    
        // Obtener el resultado
        $resultado = $sentencia->get_result();
    
        // Si hay un resultado, devolverlo
        if ($resultado->num_rows > 0) {
            return $resultado->fetch_assoc(); // Devolver la fila asociada
        } else {
            return null; // No se encontró ninguna tarea con ese ID
        }
    }
    
}