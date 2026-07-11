<?php
require_once "../app/models/PagoModel.php";
class PagoController
{
    private $modelo;

    public function __construct()
    {
        if(!isset($_SESSION["idUsuario"]))
        {
            header("Location:index.php?page=login");
            exit();
        }
        $this->modelo=new PagoModel();
    }

    public function index()
    {
        $pagos=$this->modelo->listar();
        require "../app/views/pagos/index.php";
    }

    public function crear()
    {
    $socios = $this->modelo->listarSocios();
    require "../app/views/pagos/crear.php";
    }

    public function guardar()
    {
        $this->modelo->guardar($_POST);
        header("Location:index.php?page=pagos");
    }

    public function editar()
    {
        $socios=$this->modelo->listarSocios();
        $pago=$this->modelo->obtener($_GET["id"]);
        require "../app/views/pagos/editar.php";
    }

    public function actualizar()
    {
        $this->modelo->actualizar($_POST);
        header("Location:index.php?page=pagos");
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_GET["id"]);
        header("Location:index.php?page=pagos");
    }
}