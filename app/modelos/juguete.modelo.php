<?php

    class jugueteModel {
        private $db;

        public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=db_jugueteria;charset=utf8', 'root', '');
        }
        public function seleccionarJuguetes(){
        
            $query = $this->db->prepare('SELECT * FROM juguete');
            $query->execute();
        
            // 3. Obtengo los datos en un arreglo de objetos
            $juguetes = $query->fetchAll(PDO::FETCH_OBJ); 
        
            return $juguetes;
        }
        public function seleccionarJuguete($id) {
        
            $query = $this->db->prepare('SELECT * FROM juguete WHERE id = ?');
            $query->execute([$id]);   
        
            $juguete = $query->fetch(PDO::FETCH_OBJ);
        
            return $juguete;
        }
        public function insertarJuguete ($nombreProducto,$precio, $material, $codigo){
            $query =$this->db-> prepare ('INSERT INTO juguete (nombreProducto, precio, material, id_marca, codigo) VALUES (?, ?, ?, ?, ? )');
            $query ->execute ([$nombreProducto, $precio, $material, $id_marca, $codigo]);
    
            $id = $this->db->lastInsertId();
    
            return $id;
    
        }
        public function eliminarJuguete($id){
            $query = $this->db->prepare ('DELETE FROM juguete WHERE id = ?');
            $query->execute([$id]);
        }
        function actualizarJuguete ($id){
            $query = $db->prepare('UPDATE juguete SET precio = 1 WHERE id = ?');
            $query->execute([$id]);
        }
}
