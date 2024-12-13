<?php
require_once './config.php';
require_once './app/controladores/juguete.controlador.php';
require_once './app/controladores/marca.controlador.php';
require_once './app/controladores/autorizacion.controlador.php';
require_once './app/controladores/mostrar.controlador.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//                                              TABLA DE RUTEO
/*
  tabla ruteo                controller                                          descripc                                    
| lista                  -> |ListaControlador |mostrarJuguetes()       |lista productos (juguetes)            |
| listaId/:id            -> |ListaControlador |mostrarListaPorId(id)   |lista producto por id                 |
| eliminarJuguete/:id    -> |ListaControlador    |eliminarJugete(id)          |elimina registro de juguete    |
| modificarJugeteFormulario/:id-> |ListaControlador   |mostrarFormularioModificacion(id)      |redirige a formulario de modificacion |
| modificarJuguete          -> |ListaControlador   |mostrarModificacion()    |envia formulario con modificacion     |
| agregarJugueteFormulario  -> |ListaControlador    |mostrarFormularioAlta() |redirige a formulario alta producto   |
| agregarJuguete()                -> |ListaControlador    |agregarJuguete()  |envia formulario y crea nuevo producto|
|---------------------------|------------------|------------------------|--------------------------------------|
| marca                     -> |marcacontrolador|mostrarMarcas()            |lista marcas                      |
| marcaId/:id               -> |marcacontrolador|mostrarMarcaPorId()          |lista marca por id                |
| elminarMarca/:id     -> |marcacontrolador|elminiarMarca()                 |elimina registro de marca         |
| modificarMarcaFormulario/:id -> |marcacontrolador|FormularioMarcaModificacion()|redirige a formulario de modificacion |
| modificarMarca         -> |marcacontrolador|mostrarMarcaModificacion()    |envia formulario con modificacion     |
| agregarMarcaFormulario  -> |marcacontrolador|mostrarFormularioMarca()   |redirige a formulario alta marca  |
| agregarMarca            -> |marcacontrolador|agregarMarca()                |envia formulario ,crea nueva marca|
|---------------------------|------------------|------------------------|--------------------------------------|
| inicioSesion                  -> |AutorizacionControlador    |inicioSesion()             |                                      |
| cerrarSesion                 -> |AutorizacionControlador    |cerrarSesion()            |                                      |
*/


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
        $jugueteControlador->mostrarModificacion($params[1]);
        else $mostrarControlador->mostrarError("404-Not-Found");
        break;
        case 'modificarJuguete':
            if(isset($params[1]))
            $jugueteControlador->modificarJuguete($params[1]);
            else $mostrarControlador->mostrarError("esta entrando con error");
            break;
    case 'agregarJugueteFormulario':
        $jugueteControlador->mostrarFormularioAlta();
        break;
    case 'agregarJuguete':
        $jugueteControlador->agregarJuguete();
        break;
    case 'marca':
        $marcaControlador->mostrarMarcas();
        break;
    case 'marcaId':
        if(isset($params[1]))
        $marcaControlador->mostrarMarcaId($params[1]);
        else $marcaControlador->mostrarMarcas();
        break;
    case 'eliminarMarca':
        if(isset($params[1]))
        $marcaControlador->eliminarMarca($params[1]);
        else $mostrarControlador->mostrarError("404-Not-Found");
        break;
        case 'agregarMarcaFormulario':
            $marcaControlador->formularioMarca();
            break;
    case 'modificarMarca':
        $marcaControlador->mostrarMarcaModificada();
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
    

