<?php 

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

// Leemos la acción que viene por parámetro
$action = 'home'; // Acción por defecto

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// Parsea la acción ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

switch ($params[0]) {
}
