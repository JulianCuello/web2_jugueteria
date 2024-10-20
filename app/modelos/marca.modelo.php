<?php
require_once './app/modelos/modelo.php';

class marcaModelo extends Modelo {
    
   function obtenerMarcas(){
    
        $query = $this->db->prepare('SELECT * FROM `marca`');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);       
    }
    
    function obtenerMarcaPorId($id){
        $query = $this->db->prepare('SELECT * FROM `marca` WHERE id_marca=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);       
    }
    
    function insertarMarca($id_marca,$origen, $caracteristica, $nombreMarca, $imgMarca){
        $query = $this->db->prepare('INSERT INTO marca (id_marca, origen, caracteristica, nombreMarca, imgMarca) VALUES(?,?,?,?,?)');
        $query->execute([$origen, $caracteristica]);
        return $this->db->lastInsertId();
    }
    function eliminarMarca($id){
        $query = $this->db->prepare('DELETE FROM marca WHERE id_marca = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }
    function modificarMarca($id_marca, $origen, $caracteristica,$nombreMarca, $imgMarca){
        $query = $this->db->prepare('UPDATE marca SET origen=?,caracteristica=? WHERE id_marca=?');
        $query->execute([$origen, $caracteristica]);
        return $query->rowCount();
    }
    function obtenerIdMarca(){ 
        $query = $this->db->prepare('SELECT marca.id_marca FROM marca;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
  }