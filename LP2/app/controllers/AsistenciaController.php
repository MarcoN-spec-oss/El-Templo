<?php
require_once "../app/models/AsistenciaModel.php";
class AsistenciaController
{
    private $modelo;
    public function __construct()
    {
        if(!isset($_SESSION["idUsuario"]))
        {
            header("Location:index.php?page=login");
            exit();
        }
        $this->modelo = new AsistenciaModel();
    }
    public function index()
    {
        $asistencias = $this->modelo->listar();
        require "../app/views/asistencias/index.php";
    }
    public function crear()
    {
        $socios = $this->modelo->listarSocios();
        require "../app/views/asistencias/crear.php";
    }
    public function guardar()
    {
        $this->modelo->guardar($_POST);
        header("Location:index.php?page=asistencias");
    }
    public function eliminar()
    {
        $this->modelo->eliminar($_GET["id"]);
        header("Location:index.php?page=asistencias");
    }
}