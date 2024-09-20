<?php

$db = new PDO ('mysql:host=localhost;dbname=db_jugueteria;charset=utf8', 'root', '');

$sentencia = $db->prepare( "select * from juguete");
$sentencia->execute();

$juguetes = $sentencia->fetchAll(PDO::FETCH_OBJ);
foreach($juguetes as $juguete) {
echo $juguete->nombreProducto;
echo $juguete->precio;
echo $juguete->id_marca;
echo "<br>";
}


/**
 * Archivo php para simular una colección de noticias como si salieran de una base de datos.
 * 
 * Este archivo se comparte con las otras pàginas para que puedan acceder al arreglo indexado $juguetes.
 */

function getjugueteById($id){
    $juguetes = getJuguetes();
    $juguete = $juguetes[$id]; 
    return $juguete;
}

/**
 * Obtiene todos los developers
 */
function getDevelopers() {
    $d1 = new stdClass();
    $d1->id = "franco";
    $d1->name = "Franco Stramana";
    $d1->email = "franco.stramana@diariotudai.com";
    $d1->role = "Full Stack Developer";
    
    $d2 = new stdClass();
    $d2->id = "nico";
    $d2->name = "Nico Dazeo";
    $d2->email = "nico.dazeo@diariotudai.com";
    $d2->role = "Backend Developer";
    
    $d3 = new stdClass();
    $d3->id = "belen";
    $d3->name = "Belén Enemark";
    $d3->email = "belen.enemark@diariotudai.com";
    $d3->role = "Frontend Developer";

    $developers = [$d1, $d2, $d3];

    return $developers;
}

/**
 * Obtiene el developer segun un id pasado como parametro
 */
function getDeveloperById($id) {
    $developers = getDevelopers();
    foreach($developers as $developer) {
        if ($id == $developer->id)
            return $developer;
    }
}
