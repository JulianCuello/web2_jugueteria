<?php
    require_once './app/modelos/modelo.php';

    class JugueteModelo extends Modelo{
       
        public function mostrarJuguetes(){
            $query = $this->db->prepare('SELECT * FROM juguete JOIN marca ON juguete.id_marca = marca.id_marca;');
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);            
        }

        public function seleccionarJuguete($id) {
                $query = $this->db->prepare('SELECT * FROM `juguete` JOIN marca ON juguete.id_marca=marca.id_marca WHERE id_marca = ?');
                $query->execute([$id]);
                return $query->fetchAll(PDO::FETCH_OBJ);
            }
        }
        function obtenerJuguetePorId($id){
            $query = $this->db->prepare('SELECT * FROM juguete JOIN marca ON juguetes.id_marca = marca.id_marca WHERE juguete.id_marca=?');
            $query->execute([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
           
            return $query;
        }


        function insertarJuguete ($id_juguete,$nombreProducto,$precio, $material, $codigo, $img){
            $query =$this->db-> prepare ('INSERT INTO juguete (id_juguete,nombreProducto, precio, material, id_marca, codigo) VALUES (?, ?, ?, ?, ? )');
            $query ->execute ([$id_juguete, $nombreProducto, $precio, $material, $id_marca,$codigo, $img]);
    
            return $this->db->lastInsertId();
        }
       
        function borrarJuguete($id) {
            $query = $this->db->prepare('DELETE FROM juguete WHERE id_juguete = ?');
            $query->execute([$id]);
            return $query->rowCount();
        }
    
        
        function actualizarJuguete($id_juguete,$nombreProducto,$precio, $material, $codigo, $img){
            $query = $this->db->prepare('UPDATE juguete SET nombreProducto=?,precio=?,material=?,codigo=?,img=? WHERE id_marca=?');
            $query->execute([$id_juguete, $nombreProducto, $precio, $material, $codigo, $img]);
            return $query->rowCount();
        }
       
