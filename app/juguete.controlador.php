<?php

    class jugueteControlador {
        private $modelo;
        private $vista;

        public function __construct() {
            $this->modelo = new jugueteModelo();
            $this->vista = new jugueteVista();
        }

        public function mostrarJuguetes() {
            $juguetes = $this->modelo->obtenerJuguetes();

            return $this->vista->mostrarJuguetes();
            } 

        public function agregarJuguetes () {
            if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {  
                return $this->vista->mostrarError('el nomnbre es un requisito');
            }
            if (!isset($_POST['precio']) || empty($_POST['precio'])) {
                return $this->vista->mostrarError('falta completar el precio');

            }
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $material = $_POST['material'];
            $codigo = $_POST['codigo'];

            $id = $this->modelo->insertarJuguete($nombre, $precio, $material, $codigo);

            header('Location: ' . BASE_URL);
        }
        public function borrarJuguete ($id){
            $juguete = $this->modelo->obtenerJuguete($id);

            if (!$juguete){
                return $this->vista->mostrarError('no existe el juguete seleccionado');
            }
            $this->model->elimiarJuguete($id);

            header('Location: ' . BASE_URL);
        } 
        public function guardarJuguete($id) { 
            $juguete = $this->modelo->obtenerJuguete($id);

            if (!$juguete){
                return $this->vista->mostrarError('no se puede guardar el juguete');
                header('Location: ' . BASE_URL);
            }
        }    
    }

