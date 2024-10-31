<?php
   
class marcaVista{

    public function demostrarMarcas($marcas,$adm){
        require './templates/mostrar/marca.phtml';
    }

    public function mostrarMarcaId($marca){
        require './templates/mostrar/marcaPorId.phtml';
    }
    
    public function mostrarFormularioMarcaModificacion($marca){
        require './templates/formularios/modificar.marca.phtml';
    }
    
    public function mostrarFormularioMarca(){
        require './templates/formularios/agregar.marca.phtml';
    }
}