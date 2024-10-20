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

// login                    ->  authController          ->  showLogin();
// logout                   ->  authController          ->  showLogout(); 
// validate                 ->  authController          ->  auth();
// home                     ->  homeController          ->  showHome();
// categories               ->  categoriaController     ->  showCategoria();
// products                 ->  productoController      ->  showProductos(); 
// add                      ->  productoController      ->  addProductos();   
// delete                   ->  productoController      ->  deleteProducto($id_prod); 
// formActualizarProduct    ->  productoController      ->  FormEditProducto();  
// updateProduct            ->  productoController      ->  updateProducto(); 
// detalle                  ->  productoController      ->  showProductoDetails(); 
// detalleCategorie         ->  categoriaController     ->  showCategoriaDetails(); 
// filter                   ->  categoriaController     ->  filter(); 
// addCategorie             ->  categoriaController     ->  addCategoria();
// deleteCategorie          ->  categoriaController     ->  deleteCategoria();
// editCategorie            ->  categoriaController     ->  editCategoria();

switch ($params[0]) {
    case 'login':
        $authController = new authController();
        $authController -> showLogin();
        break;

    case 'logout':
        $authController = new authController();
        $authController -> showLogout();
        break;

    case 'validate':
        $authController  = new authController();
        $authController -> auth();
        break;

    case 'home':
        $homeController = new homeController();
        $homeController -> showHome();
        break;
        
    case 'categoria':
        $categoriaController = new categoriaController();
        $categoriaController -> showCategoria();
        break;

    case 'producto':
        $productoController = new productoController();
        $productoController -> showProducto();
        break;

    case 'add':
        $productoController = new productoController();
        $productoController -> addProducto();
        break;

    case 'delete':
        $productoController = new productoController();
        $id_prod = $params[1];
        $productoController -> deleteProducto($id_prod);
        break;

    case 'formActualizarProdcut':
        $$productoController = new productoController();
        $id_prod = $params[1];
        $productoController -> FormEditProducto($id_prod);
        break;

    case 'updateProduct':
        $productsController = new productoController();
        $ID_producto = $params[1];
        $productsController -> updateProduct($ID_producto);
        break;

    case 'detalle':
        $productsController = new productoController();
        $ID_producto = $params[1];
        $productsController -> showProductDetails($ID_producto);
        break;

    case 'detalleCategoria':
        $categoriesController = new categoriaController();
        $ID_categoria = $params[1];
        $categoriesController -> showCategoriaDetails($ID_categoria);
        break;

    case 'filter':
        $categoriesController = new categoriaController();
        $categoriesController -> filter();
        break;

    case 'addCategorie':
        $categoriesController = new categoriaController();
        $categoriesController -> addCategoria();
        break;

    case 'deleteCategorie':
        $categoriesController = new categoriaController();
        $ID_categoria = $params[1];
        $categoriesController -> deleteCategoria($ID_categoria);
        break;

    default:
        echo 'No encontrado papa';
        break;
}


// <link rel="stylesheet" href="<?= BASE_URL ? > apps/Css/formulario.css"> 


