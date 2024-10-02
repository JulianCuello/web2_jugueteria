<?php
   
class CategoryView{

    public function mostrarMarca($marca,$adm){
        require './templates/mostrar/lista.marca.phtml';
    }

    public function mostrarJuguetesMarcaPorId($marca){
        require './templates/show/marcaPorId.phtml';
    }
    
    public function mostrarModificacionDeFormulario($marca){
        require './templates/formularios/modificar.marca.phtml';
    }
    
    public function mostrarFormularioMarca(){
        require './templates/formularios/agregar.marca.phtml';
    }
}