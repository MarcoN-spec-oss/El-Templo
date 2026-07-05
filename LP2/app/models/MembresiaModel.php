<?php

require_once __DIR__ . "/../../config/database.php";

class MembresiaModel
{

    private $cn;

    public function __construct()
    {
        $db = new Database();
        $this->cn = $db->conectar();
    }

    public function listar()
    {
        $sql = "SELECT
                    m.*,
                    CONCAT(s.nombres,' ',s.apellidos) AS socio
                FROM membresias m
                INNER JOIN socios s
                ON m.idSocio=s.idSocio
                ORDER BY m.idMembresia DESC";

        return $this->cn->query($sql)->fetchAll();
    }

    public function listarSocios()
    {
        return $this->cn->query("SELECT idSocio,nombres,apellidos FROM socios WHERE estado='Activo'")->fetchAll();
    }

    public function guardar($datos)
    {
        $sql="INSERT INTO membresias
        (idSocio,tipo,fechaInicio,fechaFin,costo,estado)
        VALUES(?,?,?,?,?,?)";

        $stmt=$this->cn->prepare($sql);

        return $stmt->execute([

            $datos["idSocio"],
            $datos["tipo"],
            $datos["fechaInicio"],
            $datos["fechaFin"],
            $datos["costo"],
            $datos["estado"]

        ]);
    }

    public function obtener($id)
    {
        $stmt=$this->cn->prepare("SELECT * FROM membresias WHERE idMembresia=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function actualizar($datos)
    {
        $sql="UPDATE membresias
        SET
        idSocio=?,
        tipo=?,
        fechaInicio=?,
        fechaFin=?,
        costo=?,
        estado=?
        WHERE idMembresia=?";

        $stmt=$this->cn->prepare($sql);

        return $stmt->execute([

            $datos["idSocio"],
            $datos["tipo"],
            $datos["fechaInicio"],
            $datos["fechaFin"],
            $datos["costo"],
            $datos["estado"],
            $datos["idMembresia"]

        ]);
    }

    public function eliminar($id)
    {
        $stmt=$this->cn->prepare("DELETE FROM membresias WHERE idMembresia=?");
        return $stmt->execute([$id]);
    }

}