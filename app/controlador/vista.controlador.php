<?php
require_once './app/views/list.view.php';

//controlador de manejo de errores que utiliza el router, por default y parametros no definidos $params[1]
class vistaControlador{

    private $vista;

    public function __construct(){
        $this->vista = new AlertaVista();
    }

    public function demostrarError($error){
        $this->view->mostrarError($error);
    }
}