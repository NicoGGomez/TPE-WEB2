<?php 

class categoriaView {
    private $tpl;

    function show(){
        require 'templates/categoria.phtml';
    }

    function showCategorias($categories){
        
    }

    function showDetailsCategorias($categorieById){
        require 'detalle.categoria.phtml';
        // $this->smarty->assign('categorieById', $categorieById);
        // $this->smarty->display('details.categorie.tpl');
    }

    // function showResultFilter($ProductAndCategorie){
    //     $this->smarty->assign('ProductAndCategorie', $ProductAndCategorie);
    //     $this->smarty->display('filter.tpl');

    // }

}

?>