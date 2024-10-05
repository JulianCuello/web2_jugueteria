<?php
abstract class Model {

    protected $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB . ';charset=utf8', MYSQL_USER, MYSQL_PASS);
        $this->_deploy();
    }

    private function _deploy(){
        $query = $this->db->query('mostrar tablas');
        $tablas = $query->fetchAll();
        if (count($tablas) == 0) {


    }
 }
}