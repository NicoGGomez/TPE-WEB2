<?php 

require 'app/views/producto.view.php';

class productoController {
    // private $model;
    private $view;

    public function __construct() {
        // $this->$model = new ProductoModel();
        $this->view = new productoView();
    }

    public function showProducto(){
        $this->view->show();
    }

}