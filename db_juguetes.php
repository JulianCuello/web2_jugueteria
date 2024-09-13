<?php
/**
 * Archivo php para simular una colección de noticias como si salieran de una base de datos.
 * 
 * Este archivo se comparte con las otras pàginas para que puedan acceder al arreglo indexado $juguetes.
 */
function getJuguetes(){
    
    $n1 = new stdClass();
    $n1->nombre = "autos chiquitos";
    $n1->edad = " 1 a 4 años";
    $n1->imagen = "./img/autos.jpg";

    $n2 = new stdClass();
    $n2->nombre = "cocina";
    $n2->edad = " 2 a 6 años";
    $n2->imagen = "./img/cocina.jpg";

    $n3 = new stdClass();
    $n3->nombre = "dinosaurios";
    $n3->edad = " 4 a 9 años";
    $n3->imagen = "./img/dinosaurios.jpg";

    $n4 = new stdClass();
    $n4->nombre = "mario";
    $n4->edad = " 4 a 14 años";
    $n4->imagen = "./img/mario.jpg";

   

    // declaro el arreglo de juguetes
    $juguetes = [$n1, $n2, $n3, $n4]; 
    return $juguetes;
}

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
