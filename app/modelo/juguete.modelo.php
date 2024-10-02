<?php

    class jugueteModelo {
        private $db;

        public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugueteria;charset=utf8', 'root', '');
        }

        public function mostrarJuguetes(){
        
            $query = $this->db->prepare('SELECT juguete.*, marca.origen FROM juguete JOIN marca ON juguete.id_Marca = marca.id_marca;');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        public function seleccionarJuguete($id) {
                $query = $this->db->prepare('SELECT * FROM `juguete` JOIN marca ON juguete.id_marca=marca.id_marca WHERE id_marca = ?');
                $query->execute([$id]);
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        public function obtenerJuguetesMarcaPorId($id){
            $query = $this->db->prepare('SELECT juguete.*, marca.marca FROM juguetes JOIN marca ON juguetes.id_marca = marca.id_marca WHERE juguete.id_marca=?');
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
           
            return $query;
        }


        public function insertarJuguete ($id_juguete,$nombreProducto,$precio, $material, $codigo, $img){
            $query =$this->db-> prepare ('INSERT INTO juguete (id_juguete,nombreProducto, precio, material, id_marca, codigo) VALUES (?, ?, ?, ?, ? )');
            $query ->execute ([$id_juguete, $nombreProducto, $precio, $material, $id_marca,$codigo, $img]);
    
            return $this->db->lastInsertId();
        }
       
        public function eliminarJuguete($id){
            $query = $this->db->prepare ('DELETE FROM juguete WHERE id = ?');
            $query->execute([$id]);
            return $query->rowCount();
        }
        
        public function actualizarJuguete($id_juguete,$nombreProducto,$precio, $material, $codigo, $img){
            $query = $this->db->prepare('UPDATE juguete SET nombreProducto=?,precio=?,material=?,codigo=?,img=? WHERE id_marca=?');
            $query->execute([$id_juguete,, $nombreProducto, $precio, $material, $codigo, $img]);
            return $query->rowCount();
        }
       
