<?php

class productoModel {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tiendaderopa;charset=utf8','root','');
    }

    /* OBTIENE TODOS LOS REGISTROS DE LA TABLA PRODUCTOS */
    function getProductos(){
        $query = $this->db->prepare('SELECT * FROM producto');
        $query->execute();

        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

/* OBTIENE CATEGORIAS POR PRODUCTO */
function getCategorieAndProduct($selected){ // ARREGLAR ESTO <3 !!!!!
    $query = $this->db->prepare("SELECT producto. *, categoria.tipo FROM producto a INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria WHERE producto.id_producto = ?;");
    $query->execute(array($selected)); // no anda !!!!!!!!!
    $CategorieAndProduct = $query->fetchAll(PDO::FETCH_OBJ);

    return $CategorieAndProduct;
}

    /* OBTIENE PRODUCTOS POR ID */
    function getProductoById($ID_producto){
        $query = $this->db->prepare('SELECT * FROM producto WHERE id_producto=?');
        $query->execute([$ID_producto]);
        $productById = $query->fetch(PDO::FETCH_OBJ);

        return $productById;
    }


/* INSERTA UN PRODUCTO */
    public function insertarProducto($id_categoria, $tipo, $talle, $precio) {
        $query = $this->db->prepare('INSERT INTO producto (id_categoria_fk, tipo, talle, precio) VALUES (?, ?, ?, ?)');
        $query->execute([$id_categoria, $tipo, $talle, $precio]);

        return $this->db->lastInsertId();
    }

    /* FUNCION PARA BORRAR POR ID */ 
    function deleteProductoById($id_producto) {
        $query = $this->db->prepare("DELETE FROM producto WHERE id_producto = ?");
        $query->execute([$id_producto]);
    }
    
// FUNCION PARA ACTUALIZAR LOS PRODUCTOS DE LA TABLA
        public function updateProduct($id_producto, $TIPO, $TALLE, $PRECIO) {
            $query = $this->db->prepare('UPDATE producto SET tipo=?, talle=?, precio=? WHERE id_producto=?');
            $query->execute([$TIPO, $TALLE, $PRECIO, $id_producto]);
    }          

    public function getproductDetails($ID_producto){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
        $query->execute([$ID_producto]);
        $productById = $query->fetchAll(PDO::FETCH_OBJ);    
        
        return $productById;
    }
}