<?php
require_once './app/controllers/discography.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'showDiscography':
      $discographyController = new DiscographyController();
       $discographyController->showDiscography();
       break;
   //case 'records':
     // break;          
   case 'addAlbum':
      $discographyController = new   DiscographyController();
      $discographyController->addAlbum();
      break;
    /*case 'delete':
       $id = $params[1];
       $discographyController->deleteDiscography($id);  
       break; */
    default:
       echo('404 Page not found');
       break;
}