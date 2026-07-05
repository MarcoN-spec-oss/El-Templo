<?php
require_once __DIR__ . "/../../config/database.php";
class DashboardModel
{
    private $cn;
    public function __construct()
    {
        $db = new Database();
        $this->cn = $db->conectar();
    }
    public function contarSocios()
    {
        return $this->cn->query("SELECT COUNT(*) AS total FROM socios")->fetch()["total"];
    }
    public function contarMembresias()
    {
        return $this->cn->query("SELECT COUNT(*) AS total FROM membresias")->fetch()["total"];
    }
    public function contarPagos()
    {
        return $this->cn->query("SELECT COUNT(*) AS total FROM pagos")->fetch()["total"];
    }
    public function contarAsistencias()
    {
        return $this->cn->query("SELECT COUNT(*) AS total FROM asistencias")->fetch()["total"];
    }
    public function totalDineroPagos()
    {
    return $this->cn->query("
        SELECT IFNULL(SUM(monto),0) AS total 
        FROM pagos
    ")->fetch()["total"];
    }
}