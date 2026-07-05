<?php

require_once __DIR__ . "/../../config/database.php";

class UsuarioModel
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    // Buscar usuario por nombre de usuario
    public function buscarUsuario($usuario)
    {
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute([$usuario]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}