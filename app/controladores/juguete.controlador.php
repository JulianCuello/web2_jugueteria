<?php
    require_once './app/modelo/juguete.modelo.php';
    require_once './app/vista/juguete.vista.php';

    class jugueteControlador {
        private $modelo;
        private $vista;

        public function __construct() {
            $this->modelo = new jugueteModelo();
            $this->vista = new jugueteVista();
        }

        public function mostrarJuguetes() {
            $juguetes = $this->modelo->seleccionarJuguetes();

            return $this->vista->mostrarJuguetes();
        } 
        public function mostrarJuguete($id) {
            $juguetes = $this->modelo->seleccionarJuguete();

            return $this->vista->mostrarJuguete($id);
        }

        public function agregarJuguetes () {
            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {  
                return $this->vista->mostrarError('el nomnbre es un requisito');
            }
            if (!isset($_POST['precio']) || empty($_POST['precio'])) {
                return $this->vista->mostrarError('falta completar el precio');

            }
            $id_juguete = $_POST['id_juguete'];
            $nombreProducto = $_POST['nombreProducto'];
            $precio = $_POST['precio'];
            $material = $_POST['material'];
            $id_marca = $_POST['id_marca'];
            $codigo = $_POST['codigo'];


            $id = $this->modelo->insertarJuguete($id_juguete, $nombreProducto, $precio, $material, $codigo, $id_marca);

            header('Location: ' . BASE_URL);
        }
        public function borrarJuguete ($id){
            $juguete = $this->modelo->seleccionarJuguete($id);

            if (!$juguete){
                return $this->vista->mostrarError('no existe el juguete seleccionado');
            }
            $this->modelo->elimiarJuguete($id);

            header('Location: ' . BASE_URL);
        } 
        public function guardarJuguete($id) { 
            $juguete = $this->modelo->seleccionarJuguete($id);

            if (!$juguete){
                return $this->vista->mostrarError('no se puede guardar el juguete');
                
            }
            $this->modelo->actualizarJuguete($id);
            header('Location: ' . BASE_URL);
        }    
    }

