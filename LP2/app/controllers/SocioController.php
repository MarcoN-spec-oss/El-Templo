<?php

require_once "../app/models/SocioModel.php";

class SocioController{

    private $modelo;

    public function __construct(){

        if(!isset($_SESSION["idUsuario"])){
            header("Location:index.php?page=login");
            exit();
        }
        $this->modelo = new SocioModel();
    }

    public function index(){
        $socios = $this->modelo->listar();
        require "../app/views/socios/index.php";
    }

    public function crear(){
        require "../app/views/socios/crear.php";
    }

    public function guardar(){

        $this->modelo->guardar($_POST);
        header("Location:index.php?page=socios");
    }

    public function editar()
    {
        $socio = $this->modelo->obtener($_GET["id"]);
        require "../app/views/socios/editar.php";
    }

    public function actualizar()
    {
        $this->modelo->actualizar($_POST);
        header("Location:index.php?page=socios");
    }

    public function eliminar()
    {
        $this->modelo->eliminar($_GET["id"]);
        header("Location:index.php?page=socios");
    }

}