<?php
require_once './app/vistas/autorizacion.vista.php';
require_once './app/modelos/usuario.modelo.php';
require_once './ayudas/autorizacion.ayuda.php';

class AutorizacionControlador{
    private $vista;
    private $modelo;

    public function __construct(){
        $this->modelo = new UsuarioModelo();
        $this->vista = new AutorizacionVista();
    }

    public function mostrarInicioSesion(){
        $this->vista->mostrarInicioSesion();
    }

    public function autorizacion(){ //autenticacion de Usuario
        $email = htmlspecialchars($_POST['email']);
        $password = $_POST['password'];

        if (empty($email) || empty($contraseña)) {
            $this->view->mostrarInicioSesion('Datos incompletos');
            return;
        }
        //busco al usuario en la base
        $usuario = $this->modelo->obtenerPorEmail($email);

        if ($usuario && password_verify($password, $usuario->password)) {
            //si es valida la utenticacion se loguea y redirije.
            AuthHelper::inicioSesion($usuario);
            header('Location: ' . BASE_URL . "lista");
            exit();
        } else {
            //no fue autenticado.
            $this->view->mostrarIniciosesion('Usuario inválido'); 
        }
    }

    public function cerrarSesion(){
        AuthHelper::cerrarSesion();
        header('Location: ' . BASE_URL);
    }

}
// $clave='admin';
// $hash= password_hash($clave,PASSWORD_BCRYPT);