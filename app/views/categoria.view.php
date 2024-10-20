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

    // function showResultFilter($ProductAndCategorie){
    //     $this->smarty->assign('ProductAndCategorie', $ProductAndCategorie);
    //     $this->smarty->display('filter.tpl');

    // }

}

?>