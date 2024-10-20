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
        $productosById = $this->model->getProductoById($id);
        $this->view->showFormEdit($productosById);
    }

    function updateProducto($ID_producto){
        authHelper::verify();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $TIPO = $_POST['tipo'];
            $TALLE = $_POST['talle'];
            $PRECIO = $_POST['precio'];
            try {
                if (empty($TIPO) || empty($TALLE) || empty($PRECIO)) {
                $this->view->showError("Debe completar todos los campos");
                return;
                }
                $this->model->updateProduct($ID_producto, $TIPO, $TALLE, $PRECIO);
                if ($ID_producto) {
                    header('Location: ' . BASE_URL . 'producto');
                }
            } catch (PDOException $e) {
                $this->view->showError("No se puede actualizar: " . $e->getMessage());
            }
            } else {
            $this->view->showError("Error al actualizar");
            }
    }

    public function showProductoDetails($ID_producto){
        $productDetails = $this->model->getproductoDetails($ID_producto);
        $this->view->showDetails($productDetails);
    }

}