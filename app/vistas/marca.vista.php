<?php
   
class marcaVista{

    public function demostrarMarcas($marcas,$adm){
        require './templates/mostrar/marca.phtml';
    }

    public function mostrarJuguetesMarcaPorId($marca){
        require './templates/mostrar/obtenerMarcaPorId.phtml';
    }
    
    public function mostrarModificacionDeFormulario($marca){
        require './templates/formularios/modificar.marca.phtml';
    }
    
    public function mostrarFormularioMarca(){
        require './templates/formularios/agregar.marca.phtml';
    }
}