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
        $authController = new authController();
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

    case 'formActualizarProdcuto':
        $productoController = new productoController();
        $id_prod = $params[1];
        $productoController -> FormEditProducto($id_prod);
        break;

    case 'updateProduct':
        $productoController = new productoController();
        $ID_producto = $params[1];
        $productoController -> updateProducto($ID_producto);
        break;

    case 'detalle':
        $productoController = new productoController();
        $ID_producto = $params[1];
        $productoController -> showProductoDetails($ID_producto);
        break;

    case 'detalleCategoria':
        $categoriaController = new categoriaController();
        $ID_categoria = $params[1];
        $categoriaController -> showCategoriaDetails($ID_categoria);
        break;

    case 'filter':
        $categoriaController = new categoriaController();
        $categoriaController -> filter();
        break;

    case 'addCategoria':
        $categoriaController = new categoriaController();
        $categoriaController -> addCategoria();
        break;

    case 'deleteCategoria':
        $categoriaController = new categoriaController();
        $ID_categoria = $params[1];
        $categoriaController -> deleteCategoria($ID_categoria);
        break;

    default:
        echo 'No encontrado papa';
        break;
}
