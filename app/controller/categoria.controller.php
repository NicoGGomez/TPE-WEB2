<?php 

require_once 'app/models/categoria.model.php';
require_once 'app/views/categoria.view.php';
require_once 'app/helper/auth.helper.php';

class categoriaController {
    private $model;
    private $view;
    private $helper;

    public function __construct(){
        $this->model = new categoriesModel();
        $this->view = new categoriaView();
        $this->helper = new authHelper();
    }

    public function showCategoria(){
        session_start();
        $categories = $this->model->getCategorias();
        $this->view->showCategorias($categories);
    }

    public function showCategoriaDetails($ID_categoria){
        $categoriaDetails = $this->model->getcategoriaDetails($ID_categoria);
        $this->view->showDetailsCategorias($categoriaDetails);
    }
    
    function addCategoria() {
        // validar entrada de datos
        authHelper::verify();
        $ID_categoria = $_POST['id_categoria'];
        $TIPO_DE_PRENDA = $_POST['tipo_prenda'];
        $DETALLE = $_POST['detalle'];

        $this->model->insertCategoria($ID_categoria, $TIPO_DE_PRENDA, $DETALLE);
        header("Location: " . BASE_URL. "categoria"); 
    }

    function deleteCategoria($ID_categoria) {
        authHelper::verify();
        $this->model->deleteCategoriaById($ID_categoria);
        header("Location: " . BASE_URL. "categoria"); 
    }
}
