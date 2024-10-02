<?php
require_once './app/models/model.php';

class marcaModelo{
    
    //consulta todas las marcas
    
    public function obtenerMarca(){
        $query = $this->db->prepare('SELECT * FROM `marca`');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);       
    }
    public function obtenerMarcaPorId($id){
        $query = $this->db->prepare('SELECT * FROM `marca` WHERE id_marca=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);       
    }
    
    
    public function insertarMarca($origen, $caracteristica){
        $query = $this->db->prepare('INSERT INTO marca (origen, caracteristica) VALUES(?,?)');
        $query->execute([$origen, $caracteristica]);
        return $this->db->lastInsertId();
    }
    public function eliminarMarca($id){
        $query = $this->db->prepare('DELETE FROM marca WHERE id_marca = ?');
        $query->execute([$id]);
        return $query->rowCount();
    }
    public function modificarMarca($idCategoria, $material, $origen, $motor, $imagenCategoria){
        $query = $this->db->prepare('UPDATE marca SET origen=?,caracteristica=? WHERE id_marca=?');
        $query->execute([$origen, $caracteristica]);
        return $query->rowCount();
    }
    public function obtenerIdMarca(){ 
        $query = $this->db->prepare('SELECT marca.id_marca,marca.marca FROM marca;');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}