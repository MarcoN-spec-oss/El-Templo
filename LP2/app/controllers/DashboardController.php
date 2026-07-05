<?php
require_once "../app/models/DashboardModel.php";
class DashboardController
{
    private $modelo;
    public function __construct()
    {
        $this->modelo = new DashboardModel();
    }
    public function index()
    {
        if(!isset($_SESSION["idUsuario"]))
        {
            header("Location: index.php?page=login");
            exit();
        }
        $socios = $this->modelo->contarSocios();
        $membresias = $this->modelo->contarMembresias();
        $pagos = $this->modelo->totalDineroPagos();
        $asistencias = $this->modelo->contarAsistencias();
        require "../app/views/dashboard/index.php";
    }
}