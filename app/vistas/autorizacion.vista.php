<?php 
//vista de autenticacion
class AutorizacionVista {
    
    public function mostrarinicioCesion($error = null) {
        require './templates/autorizaciones/login.phtml';
    } 
}