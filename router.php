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

switch ($params[0]) {
    case 'login':
        $controller = new authController();
        $controller -> showAuth();
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

