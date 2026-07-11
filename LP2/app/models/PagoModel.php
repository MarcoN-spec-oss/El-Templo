<?php
require_once __DIR__ . "/../../config/database.php";
class PagoModel
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
                    p.*,
                    CONCAT(s.nombres,' ',s.apellidos) AS socio
                FROM pagos p
                INNER JOIN socios s
                ON p.idSocio=s.idSocio
                ORDER BY p.idPago DESC";

        return $this->cn->query($sql)->fetchAll();
    }

    public function listarSocios()
    {
        return $this->cn->query("SELECT idSocio,nombres,apellidos FROM socios WHERE estado='Activo'")->fetchAll();
    }

    public function listarPorSocio($idSocio)
    {
        $sql = "SELECT * FROM pagos WHERE idSocio=? ORDER BY fechaPago DESC";
        $stmt = $this->cn->prepare($sql);
        $stmt->execute([$idSocio]);
        return $stmt->fetchAll();
    }

    public function guardar($datos)
    {
        $sql="INSERT INTO pagos
        (idSocio,fechaPago,monto,metodoPago,estado)
        VALUES(?,?,?,?,?)";
        $stmt=$this->cn->prepare($sql);
        return $stmt->execute([
            $datos["idSocio"],
            $datos["fechaPago"],
            $datos["monto"],
            $datos["metodoPago"],
            $datos["estado"]
        ]);
    }

    public function obtener($id)
    {
        $stmt=$this->cn->prepare("SELECT * FROM pagos WHERE idPago=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function actualizar($datos)
    {
        $sql="UPDATE pagos
              SET
              idSocio=?,
              fechaPago=?,
              monto=?,
              metodoPago=?,
              estado=?
              WHERE idPago=?";

        $stmt=$this->cn->prepare($sql);
        return $stmt->execute([
            $datos["idSocio"],
            $datos["fechaPago"],
            $datos["monto"],
            $datos["metodoPago"],
            $datos["estado"],
            $datos["idPago"]
        ]);
    }

    public function eliminar($id)
    {
        $stmt=$this->cn->prepare("DELETE FROM pagos WHERE idPago=?");
        return $stmt->execute([$id]);
    }
}