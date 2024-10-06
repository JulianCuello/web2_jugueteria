<?php
require_once './app/vistas/autorizacion.vista.php';
require_once './app/modelos/usuario.modelo.php';
require_once './ayudas/autorizacion.ayuda.php';

class autorizacionControlador{
    private $vista;
    private $modelo;

    public function __construct(){
        $this->modelo = new UsuarioModelo();
        $this->vista = new AutorizacionVista();
    }

    public function mostrarInicioSesion(){
        $this->vista->inicioSesion();
    }

    public function autorizacion(){ //autenticacion de Usuario
        $email = htmlspecialchars($_POST['email']);
        $contraseña = $_POST['contraseña'];

        if (empty($email) || empty($contraseña)) {
            $this->vista->mostrarInicioSesion('Datos incompletos');
            return;
        }
        //busco al usuario en la base
        $usuario = $this->modelo->obtenerPorEmail($email);

        if ($usuario && verificarContraseña($contraseña, $usuario->contraseña)) {
            //si es valida la utenticacion se loguea y redirije.
            AutorizacionAyuda::inicioSesion($usuario);
            header('Location: ' . BASE_URL . "lista");
            exit();
        } else {
            //no fue autenticado.
            $this->vista->mostrarInicioSesion('Usuario inválido'); 
        }
    }

    public function cerrarSesion(){
        AutorizacionAyuda::cerrarSesion();
        header('Location: ' . BASE_URL);
    }

}
// $clave='admin';
// $hash= password_hash($clave,PASSWORD_BCRYPT);