<?php
require_once __DIR__ . "/../../config/database.php";
class AsistenciaModel
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
                    a.*,
                    CONCAT(s.nombres,' ',s.apellidos) AS socio
                FROM asistencias a
                INNER JOIN socios s 
                ON a.idSocio = s.idSocio
                ORDER BY a.idAsistencia DESC";
        return $this->cn->query($sql)->fetchAll();
    }
    public function listarSocios()
    {
        return $this->cn->query("
            SELECT idSocio, nombres, apellidos 
            FROM socios 
            WHERE estado='Activo'
        ")->fetchAll();
    }
    public function guardar($datos)
    {
        $sql = "INSERT INTO asistencias 
                (idSocio, fecha, horaEntrada)
                VALUES (?,?,?)";
        $stmt = $this->cn->prepare($sql);
        return $stmt->execute([
            $datos["idSocio"],
            $datos["fecha"],
            $datos["horaEntrada"]
        ]);
    }
    public function eliminar($id)
    {
        $stmt = $this->cn->prepare("DELETE FROM asistencias WHERE idAsistencia=?");
        return $stmt->execute([$id]);
    }
}