<?php
require_once "../app/models/SocioModel.php";
require_once "../app/models/MembresiaModel.php";
require_once "../app/models/PagoModel.php";
require_once "../app/models/AsistenciaModel.php";
class SocioPortalController
{
    private $socioModelo;
    private $membresiaModelo;
    private $pagoModelo;
    private $asistenciaModelo;

    public function __construct()
    {
        $this->socioModelo = new SocioModel();
        $this->membresiaModelo = new MembresiaModel();
        $this->pagoModelo = new PagoModel();
        $this->asistenciaModelo = new AsistenciaModel();
    }
    public function index()
    {
        if (isset($_SESSION["idSocio"])) {
            header("Location: index.php?page=mi-cuenta");
            exit();
        }
        require "../app/views/portal/login.php";
    }
    public function ingresar()
    {
        $usuario = trim($_POST["usuario"] ?? "");
        $password = $_POST["password"] ?? "";
        $socio = $this->socioModelo->buscarPorUsuario($usuario);
        if ($socio && password_verify($password, $socio["password"])) {
            if ($socio["estado"] !== "Activo") {
                $error = "Tu cuenta de socio está inactiva. Comunícate con recepción.";
                require "../app/views/portal/login.php";
                return;
            }
            $_SESSION["idSocio"] = $socio["idSocio"];
            $_SESSION["socioNombre"] = $socio["nombres"] . " " . $socio["apellidos"];
            header("Location: index.php?page=mi-cuenta");
            exit();
        } else {
            $error = "Usuario o contraseña incorrectos";
            require "../app/views/portal/login.php";
        }
    }
    public function dashboard()
    {
        $this->verificarSesion();
        $idSocio = $_SESSION["idSocio"];
        $socio = $this->socioModelo->obtener($idSocio);
        $membresias = $this->membresiaModelo->listarPorSocio($idSocio);
        $membresiaActiva = $this->membresiaModelo->obtenerActivaPorSocio($idSocio);
        $pagos = $this->pagoModelo->listarPorSocio($idSocio);
        $asistencias = $this->asistenciaModelo->listarPorSocio($idSocio);
        require "../app/views/portal/dashboard.php";
    }
    public function salir()
    {
        unset($_SESSION["idSocio"]);
        unset($_SESSION["socioNombre"]);
        header("Location: index.php?page=login-socio");
        exit();
    }
    private function verificarSesion()
    {
        if (!isset($_SESSION["idSocio"])) {
            header("Location: index.php?page=login-socio");
            exit();
        }
    }
}
