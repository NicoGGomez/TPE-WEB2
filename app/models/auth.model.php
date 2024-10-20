<?php

class authModel {

    private $db;

    public function __construct() {
        $this -> db = new PDO('mysql:host=localhost;'.'dbname=db_tiendaderopa;charset=utf8', 'root', '');
    }

    public function getByUser($user) {
        $query = $this->db->prepare('SELECT * FROM usuario WHERE user = ?');
        $query->execute([$user]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;  
    }

}