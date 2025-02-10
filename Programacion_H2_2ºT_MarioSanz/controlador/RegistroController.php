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
}