<?php 
//vista de autenticacion
class AutorizacionVista {
    
    public function inicioSesion($error = null) {
        require './templates/autorizacion/inicioSesion.phtml';
    } 
}