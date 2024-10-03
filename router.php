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
    $action = "lista";
}

$params = explode("/",$action);

//instancio una sola vez
$listaController = new ListaContrololador();
$marcaControlador = new marcaControlador();
$AutorizacionControlador = new AutorizacionControlador();
$mostrarControlador = new mostrarControlador();

switch ($params[0]) {

    case 'list':
        $listController->showList();
        break;
    case 'listId':
        if(isset($params[1]))
        $listController->showListById($params[1]);
        else $listController->showList();
        break;
    case 'removeItem':
        if(isset($params[1]))
        $listController->removeItem($params[1]);
        else $showController->showError("404-Not-Found");
        break;
    case 'updateItemForm':
        if(isset($params[1]))
        $listController->showFormUpdate($params[1]);
        else $showController->showError("404-Not-Found");
        break;
    case 'updateItem':
        $listController->showUpdate();
        break;
    case 'addItemForm':
        $listController->showFormAlta();
        break;
    case 'addItem':
        $listController->addItem();
        break;
    case 'category':
        $categoryController->showCategory();
        break;
    case 'categoryId':
        if(isset($params[1]))
        $categoryController->showCategoryById($params[1]);
        else $categoryController->showCategory();
        break;
    case 'removeCategory':
        if(isset($params[1]))
        $categoryController->removeCategory($params[1]);
        else $showController->showError("404-Not-Found");
        break;
    case 'updateCategoryForm':
        if(isset($params[1]))
        $categoryController->showFormCategoryUpdate($params[1]);
        else $showController->showError("404-Not-Found");
        break;
    case 'updateCategory':
        $categoryController->showCategoryUpdate();
        break;
    case 'addCategoryForm':
        $categoryController->showFormCategory();
        break;
    case 'addCategory':
        $categoryController->addCategory();
        break;
    case 'login':
        $authController->showLogin();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'auth':
        $authController->auth();
        break;
    default:
        $showController->showError("404-Not-Found");
        break;
}
    

