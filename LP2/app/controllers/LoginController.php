<?php

require_once "../app/models/UsuarioModel.php";

class LoginController
{
    private $modelo;

    public function __construct()
    {
        $this->modelo = new UsuarioModel();
    }

    // Mostrar vista
    public function index()
    {
        require "../app/views/login/index.php";
    }

    // Validar Login
    public function ingresar()
    {
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        $datos = $this->modelo->buscarUsuario($usuario);

        if ($datos) {

            if($password == $datos["password"]) {

                $_SESSION["idUsuario"] = $datos["idUsuario"];
                $_SESSION["nombre"] = $datos["nombre"];

                header("Location: index.php?page=dashboard");
                exit();

            } else {

                $error = "Contraseña incorrecta";
                require "../app/views/login/index.php";
            }

        } else {

            $error = "Usuario no encontrado";
            require "../app/views/login/index.php";

        }
    }

    public function salir()
    {
        session_destroy();

        header("Location: index.php?page=login");
    }
}