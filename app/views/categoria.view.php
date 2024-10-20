<?php 

class categoriaView {

    function show(){
        require 'templates/categoria.phtml';
    }

    function showCategorias($todasLasCategorias){
        $categorias = $todasLasCategorias;
        include 'templates/detalle.categoria.phtml';
    }

    function showDetailsCategorias($categorieById){
        $categorias = $categorieById;
        include 'templates/detalle.categoria.phtml';
    }

    function showResultFilter($ProductoAndCategoria){
        $prodYCat = $ProductoAndCategoria;
        require_once 'templates/filter.phtml';
    }

}

?>