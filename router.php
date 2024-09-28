<?php
require_once "app/controlador/juguete.controlador.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


//**
//    TABLA DE RUTEO
//    Action        Funcion
//    home          showNJuguetes()
//    noticia/:id   showJuguete($id) 
//    about         showAbout()
//    about/:dev    showAbout($dev)

if (!empty($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "home";
}

$params = explode("/",$action);

switch ($params[0]) {
    case "home":
        $controlador = new jugueteControlador();
        $controlador->mostrarJuguetes();
        break;
    case "juguete":
        $controlador = new jugueteControlador();
        if(isset($params[1])){
            $controlador->mostrarJuguete($params[1]);
        }else{
            $controlador->mostrarJuguetes();
        }
        break;
    case 'modificar':
        $controlador = new jugueteControlador();
        $controlador->guardarJuguete();
        break;
    case 'borrar':
        $controlador = new jugueteControlador();
        $controlador->borrarJuguete();
        break;
    default: 
        // show404();
        echo "404 Pagina no encontrada";
        break;
    }
    

