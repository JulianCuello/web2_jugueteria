<?php

function getConnection() {
   return new PDO('mysql:host=localhost;dbname=db_jugueteria;charset=utf8', 'root', '');
}

function seleccionarJuguetes() {
    // 1. Abro la conexión
    $db = getConnection();
 
    // 2. Ejecuto la consulta
    $query = $db->prepare('SELECT * FROM juguete');
    $query->execute();
 
    // 3. Obtengo los datos en un arreglo de objetos
    $juguetes = $query->fetchAll(PDO::FETCH_OBJ); 
 
    return $juguetes;
  }
  function seleccionarJuguete($id) {
    $db = getConnection();
 
    $query = $db->prepare('SELECT * FROM juguete WHERE id = ?');
    $query->execute([$id]);   
 
    $juguete = $query->fetch(PDO::FETCH_OBJ);
 
    return $juguete;
  }
    function insertarJuguete($nombreProducto, $precio, $material, $id_marca, $codigo) {
        $db= getConnection();
        
        $query =$db -> prepare ('INSERT INTO juguete (nombre, precio, material, id_marca, codigo) VALUES (?, ?, ?, ?, ? )');
        $query ->execute ([$nombreProducto, $precio, $material, $id_marca, $codigo]);

        $db->lastInsertId();

        return $id;

    }
        function borrarJuguete ($id) {
            $db = getConnection ();

            $query = $db->prepare ('DELETE FROM juguete WHERE id =?');
            $query->execute ([$id]);
        }

        function modificarJuguete ($id){
            $db = getConnection ();

            $query = $db->prepare('UPDATE juguete SET precio = 1 WHERE id = ?');
            $query->execute([$id]);
        }
     
     
  
 
