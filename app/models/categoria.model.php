<?php 

class categoriesModel {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tiendaderopa;charset=utf8','root','');
    }

    function getCategorias(){
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        return $categories;
    }

    public function getcategoriaDetails($ID_categoria){
        $query = $this->db->prepare("SELECT * FROM categoria WHERE id_categoria = ?");
        $query->execute([$ID_categoria]);
        $categorieById = $query->fetchAll(PDO::FETCH_OBJ);    
        
        return $categorieById;
    }

    function getProductoAndCategoria($selected){
        $query = $this->db->prepare("SELECT * FROM producto a INNER JOIN  categoria b ON a.id_categoria = b.id_categoria WHERE a.id_categoria=?");
        $query->execute(array($selected));
        $ProductAndCategorie = $query->fetchAll(PDO::FETCH_OBJ);

        return $ProductAndCategorie;
    }

    public function insertCategoria($ID_categoria, $TIPO_DE_PRENDA, $DETALLE) {
        $query = $this->db->prepare('INSERT INTO categoria (id_categoria, tipo_prenda, detalle) VALUES (?, ?, ?)');
        $query->execute([$ID_categoria, $TIPO_DE_PRENDA, $DETALLE]);
    
        return $this->db->lastInsertId();
    }
    
    public function deleteCategoriaById($ID_categoria) {
        $query = $this->db->prepare("DELETE FROM categoria WHERE id_categoria = ?");
        $query->execute([$ID_categoria]);
    }
    
}

?>