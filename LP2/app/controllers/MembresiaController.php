<?php
require_once "../app/models/MembresiaModel.php";
class MembresiaController
{
    private $modelo;
    public function __construct()
    {
        if(!isset($_SESSION["idUsuario"]))
        {
            header("Location:index.php?page=login");
            exit();
        }
        $this->modelo=new MembresiaModel();
    }

    public function index()
    {
        $membresias=$this->modelo->listar();
        require "../app/views/membresias/index.php";
    }

    public function crear()
    {
        $socios=$this->modelo->listarSocios();
        require "../app/views/membresias/crear.php";
    }

    public function guardar()
    {
        $this->modelo->guardar($_POST);
        header("Location:index.php?page=membresias");
    }

    public function editar()
    {
        $socios=$this->modelo->listarSocios();
        $membresia=$this->modelo->obtener($_GET["id"]);
        require "../app/views/membresias/editar.php";
    }

    public function actualizar()
    {
        $this->modelo->actualizar($_POST);
        header("Location:index.php?page=membresias");
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_GET["id"]);
        header("Location:index.php?page=membresias");
    }
}