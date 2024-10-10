<?php

require_once './app/controladores/juguete.controlador.php';
require_once './app/controladores/marca.controlador.php';
require_once './app/controladores/autorizacion.controlador.php';
require_once './app/controladores/mostrar.controlador.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//    TABLA DE RUTEO


if (!empty($_GET["action"])){
    $action = $_GET["action"];
} else {
    $action = "lista";
}

$params = explode("/",$action);

//instancio una sola vez
$jugueteControlador = new JugueteControlador();
$marcaControlador = new MarcaControlador();
$autorizacionControlador = new AutorizacionControlador();
$mostrarControlador = new MostrarControlador();

switch ($params[0]) {

    case 'lista':
        $jugueteControlador->mostrarJuguetes();
        break;
    case 'jugueteId':
        if(isset($params[1]))
        $jugueteControlador->mostrarJuguetePorId($params[1]);
        else $listaControlador->mostrarJuguetes();
        break;
    case 'eliminarJuguete':
        if(isset($params[1]))
        $jugueteControlador->eliminarJuguete($params[1]);
        else $mostrarControlador->mostrarError("404-Not-Found");
        break;
    case 'modificarFormularioJuguete':
        if(isset($params[1]))
        $jugueteControlador->mostrarFormularioModificacion($params[1]);
        else $mostrarControlador->mostrarError("404-Not-Found");
        break;
    case 'modificarJuguete':
        $jugueteControlador->mostrarModificacion();
        break;
    case 'AgregarJugueteFormulario':
        $jugueteControlador->mostrarFormularioAlta();
        break;
    case 'agregarJuguete':
        $jugueteControlador->agregarJuguete();
        break;
    case 'marca':
        $marcaControlador->mostrarMarca();
        break;
    case 'marcaId':
        if(isset($params[1]))
        $marcaControlador->mostrarMarcaPorId($params[1]);
        else $marcaControlador->mostrarMarca();
        break;
    case 'eliminarMarca':
        if(isset($params[1]))
        $marcaControlador->eliminarMarca($params[1]);
        else $mostrarControlador->mostrarError("404-Not-Found");
        break;
    case 'modificarMarcaFormulario':
        if(isset($params[1]))
        $marcaControlador->mostrarFormularioMarcaModificacion($params[1]);
        else $marcaControlador->mostrarError("404-Not-Found");
        break;
    case 'modificarMarca':
        $marcaControlador->mostrarMarcaModificacion();
        break;
    case 'agregarMarcaFormulario':
        $marcaControlador->mostrarFormularioMarca();
        break;
    case 'agregarMarca':
        $marcaControlador->agregarMarca();
        break;
    case 'inicioSesion':
        $autorizacionControlador->mostrarInicioSesion();
        break;
    case 'cierreSesion':
        $autorizacionControlador->cerrarSesion();
        break;
    case 'autorizacion':
        $autorizacionControlador->autorizacion();
        break;
    default:
        $mostrarControlador->demostrarError("404-Not-Found");
        break;
}
    

