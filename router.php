<?php
require_once "juguetes.php";
require_once "about.php";

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
        showJuguetes();
        break;
    case "juguete":
        if(isset($params[1])){
            showJugueteById($params[1]);
        }else{
            showJuguetes();
        }
        break;
        case 'about':
            if (isset($params[1]))
                showAbout($params[1]);
            else 
                showAbout();
            break;
        default: 
            show404();
            break;
    }
    

