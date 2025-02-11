<?php
require_once "../modelo/class_registro.php";

class UsuariosController {
    private $Usuario;

    public function __construct() {
        $this->Usuario = new Usuario();
    }

    public function agregarusuario($id, $nombre_usuario, $correo, $contrasena) {
        $this->Usuario->agregarusuario($id, $nombre_usuario, $correo, $contrasena);
    }

    public function agregartarea($id_usuario, $titulo, $descripcion, $estado) {
        $this->Usuario->agregartarea($id_usuario, $titulo, $descripcion, $estado);
    }

    public function validarUsuario($id, $contrasena) {
        $this->Usuario->validarUsuario($id, $contrasena);
    }

    public function listartareas() {
        return $this->Usuario->obtenertareas();
    }

    public function eliminartarea($id_tarea) {
        $this->Usuario->eliminartarea($id_tarea);
    }

    public function obtenertareaPorId($id_Usuario) {
        return $this->Usuario->obtenertareaPorId($id_Usuario);
    }

    public function editarTarea($id_tarea, $estado) {
        $this->Usuario->editarTarea($id_tarea, $estado);
    }
}