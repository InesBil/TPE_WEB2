<?php
require_once './app/controllers/discography.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // acción por defecto
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion Ej: dev/juan --> ['dev', juan]
$params = explode('/', $action);

$discographyController = new DiscographyController();


// tabla de ruteo
switch ($params[0]) {
    case 'home':
       $discographyController->showDiscography();
       break;
    //case 'add':
     // $discographyController->addDiscography();
      // break;
    case 'delete':
       $id = $params[1];
       $discographyController->deleteDiscography($id);  
       break; 
    default:
       echo('404 Page not found');
       break;
}