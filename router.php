<?php
require_once './app/controllers/beer.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

$discographyController = new $discographyController();


// tabla de ruteo
switch ($params[0]) {
    case 'home':
       $discographyController->showBeers();
       break;
    case 'add':
      $discographyController->addBeers();
       break;
    case 'delete':
       $id = $params[1];
       $discographyController->deleteBeer($id);  
       break; 
    default:
       echo('404 Page not found');
       break;
}