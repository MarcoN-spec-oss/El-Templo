<?php

session_start();

require_once "../config/database.php";

$pagina = $_GET["page"] ?? "login";

switch ($pagina) {

    case "login":
        require_once "../app/controllers/LoginController.php";
        $controller = new LoginController();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $controller->ingresar();
        } else {
            $controller->index();
        }
        break;

    case "dashboard":
        require_once "../app/controllers/DashboardController.php";
        $controller = new DashboardController();
        $controller->index();
        break;

    case "socios":
    require_once "../app/controllers/SocioController.php";
    $controller = new SocioController();
    $accion = $_GET["accion"] ?? "index";
    switch($accion){
        case "crear":
            $controller->crear();
        break;
        case "guardar":
            $controller->guardar();
        break;
        case "editar":
            $controller->editar();
        break;
        case "actualizar":
            $controller->actualizar();
        break;
        case "eliminar":
            $controller->eliminar();
        break;
        default:
            $controller->index();
        }
        break;

    case "membresias":
    require_once "../app/controllers/MembresiaController.php";
    $controller = new MembresiaController();
    $accion = $_GET["accion"] ?? "index";
    switch($accion){
        case "crear":
            $controller->crear();
            break;
        case "guardar":
            $controller->guardar();
            break;
        case "editar":
            $controller->editar();
            break;
        case "actualizar":
            $controller->actualizar();
            break;
        case "eliminar":
            $controller->eliminar();
            break;
        default:
            $controller->index();
            break;
        }
        break;

    case "pagos":
    require_once "../app/controllers/PagoController.php";
    $controller = new PagoController();
    $accion = $_GET["accion"] ?? "index";
    switch($accion){
        case "crear":
            $controller->crear();
        break;
        case "guardar":
            $controller->guardar();
        break;
        case "editar":
            $controller->editar();
        break;
        case "actualizar":
            $controller->actualizar();
        break;
        case "eliminar":
            $controller->eliminar();
        break;
        default:
            $controller->index();
    }
        break;

    case "asistencias":
    require_once "../app/controllers/AsistenciaController.php";
    $controller = new AsistenciaController();
    $accion = $_GET["accion"] ?? "index";
    switch($accion){
        case "crear":
            $controller->crear();
        break;
        case "guardar":
            $controller->guardar();
        break;
        case "eliminar":
            $controller->eliminar();
        break;
        default:
            $controller->index();
    }
        break;
    
    case "logout":
        session_destroy();
        header("Location:index.php?page=login");
        break;

    default:
        echo "Página no encontrada";
}