<?php
require_once './app/controllers/discography.controller.php';
require_once './app/controllers/record.controller.php';
require_once './app/controllers/home.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
  $action = 'home'; 
}
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
    case 'home':
      $homeController = new HomeController();
      $homeController-> showHome();
      break;
    case 'showDiscography':
      $discographyController = new DiscographyController();
      $discographyController->showDiscography();
      break;
   //case 'records':
     // break;          
   case 'addAlbum':
      $discographyController = new DiscographyController();
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