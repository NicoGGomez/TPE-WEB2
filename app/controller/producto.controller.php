<?php 

require 'app/models/producto.model.php';
require 'app/views/producto.view.php';
require 'app/helper/auth.helper.php';

class productoController {
    private $model;
    private $view;

    public function __construct() {
        $this->model = new ProductoModel();
        $this->view = new productoView();
    }

    function showProducto(){
        session_start();
        $productos = $this->model->getProductos();
        $this->view->showProducto($productos);
    }

    function addProducto() {
        // validar entrada de datos
        authHelper::verify();
        if((isset($_POST['id_categoria']) && ($_POST['tipo']) && (isset($_POST['talle']) && (isset($_POST['precio']))))) {
        $id_categoria= $_POST['id_categoria'];
        $tipo = $_POST['tipo'];
        $talle = $_POST['talle'];
        $precio = $_POST['precio'];

        $this->model->insertarProducto($id_categoria, $tipo, $talle, $precio);
        header("Location: " . BASE_URL. "producto"); 
        }
    }

    function deleteProducto($id){
        authHelper::verify();
        $this->model->deleteProductoById($id);
        header("location: " . BASE_URL. "producto");
    }

    function FormEditProducto($id){
        $productoById = $this->model->getProductoById($id);
        $this->view->showFormEdit($productoById);
    }

}