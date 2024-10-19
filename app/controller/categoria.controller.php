<?php 

require_once 'app/models/categoria.model.php';
require_once 'app/views/categoria.view.php';
// require_once 'app/helpers/auth.helper.php';

class categoriaController {
    private $model;
    private $view;
    private $helper;

    public function __construct(){
        // $this->model = new categoriesModel();
        $this->view = new categoriaView();
        // $this->helper = new authHelper();
    }
/* OBTIENE LAS CATEGORIAS DEL MODEL (getCategories) Y LAS ASIGNA A LA FUNCION DE LA VIEW (showCategories)*/
    public function showCategoria(){
        session_start();
        $categories = $this->model->getCategories();
        $this->view->showCategorias($categories);
    }

    public function showCategorieDetails($ID_categoria){
        $categorieDetails = $this->model->getcategorieDetails($ID_categoria);
        $this->view->showDetailsCategorias($categorieDetails);
    }

    // function showCategoria(){
    //     $this->view->show();
    // }
    
    function addCategorie() {
        // validar entrada de datos
        authHelper::verify();
        $ID_categoria = $_POST['ID_categoria'];
        $TIPO_DE_PRENDA = $_POST['TIPO_DE_PRENDA'];
        $DETALLE = $_POST['DETALLE'];

        $this->model->insertCategorie($ID_categoria, $TIPO_DE_PRENDA, $DETALLE);
        header("Location: " . BASE_URL. "categories"); 
    }

// Funcion borrar categoria
    function deleteCategorie($ID_categoria) {
        authHelper::verify();
        $this->model->deleteCategorieById($ID_categoria);
        header("Location: " . BASE_URL. "categories"); 
    }
}
