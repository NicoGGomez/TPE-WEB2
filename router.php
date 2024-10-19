<?php 

include_once 'app/controller/home.controller.php';
include_once 'app/controller/producto.controller.php';
include_once 'app/controller/categoria.controller.php';
include_once 'app/controller/auth.controller.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Leemos la acción que viene por parámetro
$action = 'login'; // Acción por defecto

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Parsea la acción ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

// login                    ->  authController->showLogin();
// logout                   ->  authController->showLogout(); 
// home                     ->  homeController->showHome();
// categories               ->  categoriesController->showCategoria();
// products                 ->  productsController->showProductos(); 
// add                      ->  productsController->addProductos();  
// validate                 ->  authController->auth(); 
// delete                   ->  productsController->deleteProducto(); 
// formActualizarProduct    ->  productsController->FormEditProducto();  
// updateProduct            ->  productsController->updateProducto(); 
// detalle                  ->  productsController->showProductoDetails(); 
// detalleCategorie         ->  categoriesController->showCategoriaDetails(); 
// filter                   ->  categoriesController->filter(); 
// addCategorie             ->  categoriesController->addCategoria();
// deleteCategorie          ->  categoriesController->deleteCategoria();
// editCategorie            ->  categoriesController->editCategoria();

switch ($params[0]) {
    case 'login':
        $controller = new authController();
        $controller -> showLogin();
        break;

    case 'logout':
        $controller = new authController();
        $controller -> showLogout();
        break;

    case 'home':
        $controller = new homeController();
        $controller-> showHome();
        break;
        
    case 'categoria':
        $controller = new categoriaController();
        $controller-> showCategoria();
        break;

    case 'producto':
        $controller = new productoController();
        $controller-> showProducto();
        break;
}

