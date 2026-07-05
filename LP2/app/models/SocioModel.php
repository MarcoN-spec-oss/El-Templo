<?php

require_once __DIR__."/../../config/database.php";

class SocioModel{

    private $cn;

    public function __construct(){

        $db = new Database();

        $this->cn = $db->conectar();

    }

    public function listar(){

        $sql = "SELECT * FROM socios ORDER BY idSocio DESC";

        return $this->cn->query($sql)->fetchAll();

    }

    public function guardar($datos){

        $sql = "INSERT INTO socios
        (dni,nombres,apellidos,telefono,direccion,estado,idUsuario_admin)
        VALUES(?,?,?,?,?,?,?)";

        $stmt = $this->cn->prepare($sql);

        return $stmt->execute([

            $datos["dni"],
            $datos["nombres"],
            $datos["apellidos"],
            $datos["telefono"],
            $datos["direccion"],
            "Activo",
            $_SESSION["idUsuario"]

        ]);

    }
    //============================================
// Buscar por ID
//============================================

    public function obtener($id)
    {
        $sql = "SELECT * FROM socios WHERE idSocio=?";
        $stmt = $this->cn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

//============================================
// Actualizar
//============================================

    public function actualizar($datos)
    {
        $sql = "UPDATE socios
                SET
                dni=?,
                nombres=?,
                apellidos=?,
                telefono=?,
                direccion=?,
                estado=?
                WHERE idSocio=?";

        $stmt = $this->cn->prepare($sql);
        return $stmt->execute([

            $datos["dni"],
            $datos["nombres"],
            $datos["apellidos"],
            $datos["telefono"],
            $datos["direccion"],
            $datos["estado"],
            $datos["idSocio"]

        ]);
    }

//============================================
// Eliminar
//============================================

    public function eliminar($id)
    {
        $sql="DELETE FROM socios WHERE idSocio=?";
        $stmt=$this->cn->prepare($sql);
        return $stmt->execute([$id]);
    }

}