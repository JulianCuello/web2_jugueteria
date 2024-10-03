<?php
require_once './app/views/auth.view.php';
require_once './app/models/user.model.php';
require_once './helpers/auth.helper.php';

class AutorizacionController{
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
            $this->view->showLogin('Datos incompletos');
            return;
        }
        //busco al usuario en la base
        $usuario = $this->modelo->obtenerPorEmail($email);

        if ($usuario && password_verify($password, $usuario->password)) {
            //si es valida la utenticacion se loguea y redirije.
            AuthHelper::login($usuario);
            header('Location: ' . BASE_URL . "lista");
            exit();
        } else {
            //no fue autenticado.
            $this->view->mostrarIniciosesion('Usuario inválido'); 
        }
    }

    public function logout(){
        AuthHelper::logout();
        header('Location: ' . BASE_URL);
    }

}


// $clave='admin';
// $hash= password_hash($clave,PASSWORD_BCRYPT);