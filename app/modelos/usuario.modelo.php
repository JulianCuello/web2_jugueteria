<?php
require_once './app/modelos/usuario.modelo.php';

class UsuarioModelo /*extends Model*/{

    public function obtenerPorEmail($email) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$email]);
        return $query->fetch(PDO::FETCH_OBJ);
    }
}