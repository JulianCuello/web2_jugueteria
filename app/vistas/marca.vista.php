<?php
   
class marcaVista{

    public function mostrarMarcas($marca,$adm){
        require './templates/mostrar/lista.marcas.phtml';
    }

    public function mostrarJuguetesMarcaPorId($marca){
        require './templates/mostrar/marcaPorId.phtml';
    }
    
    public function mostrarModificacionDeFormulario($marca){
        require './templates/formularios/modificar.marca.phtml';
    }
    
    public function mostrarFormularioMarca(){
        require './templates/formularios/agregar.marca.phtml';
    }
}