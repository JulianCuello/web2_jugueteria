
<?php

require_once 'app/controladores/juguete.controlador.php';

class jugueteVista {

    public function mostrarError($error) {
        echo "<h2> $error</h2>";
    }

    public function mostrarJuguete($juguete,$adm) {
        require('./templates/mostrar/tabla.juguete.phtml');        
    }
    
    public function mostrarJuguetePorId($lista) {
        require './templates/mostrar/juguetePorId.phtml';   
    }

    public function mostrarModificacionDeUsuario($marca, $item) {
        require './templates/formularios/modificarJuguete.phtml';          
    }
    
    public function mostrarFormulario($marca){
        require './templates/formularios/agregar.juguete.phtml';
    }
}