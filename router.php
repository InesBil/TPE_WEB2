<?php
require_once './app/controllers/discography.controller.php';
require_once './app/controllers/record.controller.php';
require_once './app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
  $action = 'showDiscography'; 
}
$params = explode('/', $action);

// tabla de ruteo
switch ($params[0]) {
  case 'showDiscography':
    $discographyController = new DiscographyController();
    $discographyController->showDiscography();
    break;   
  case 'showRecords':
    $recordsController = new RecordController();
    $recordsController->showRecords();
    break;
  case 'detail':
    $id = $params[1];
    $discographyController = new DiscographyController();
    $discographyController->showDetail($id);
    break;           
  case 'addAlbum':
    $discographyController = new DiscographyController();
    $discographyController->addAlbum();
    break;   
  case 'addRecords':
    $recordController = new RecordController();
    $recordController->addRecords();
    break;
  case 'editAlbum':
    $id = $params[1];
    $albumController = new DiscographyController();
    $albumController->insertEditAlbum($id);
    break;
  case 'showEditAlbum':
    $id = $params[1];
    $discographyController  = new DiscographyController();
    $discographyController ->showEditAlbum($id);  
    break;    
  case 'showEditRecords':  
    $id = $params[1];
    $recordController = new RecordController();
    $recordController->showEditRecords($id);  
    break;
  case 'editRecord':
    $id = $params[1];
    $recordController = new RecordController();
    $recordController ->insertEditRecords($id);  
    break;  
  case 'deleteAlbum':
    $id = $params[1];
    $discographyController = new DiscographyController();
    $discographyController->deleteDiscography($id);
    break;
  case 'deleteRecords':
    $id = $params[1];
    $recordController = new RecordController();
    $recordController->deleteRecords($id);
     break;
     /*case 'login':
        $authController = new AuthController();
        $authController->showFormLogin();
        break;
    case 'validate':
        $authController = new AuthController();
        $authController->validateUser();
        break;
    case 'logout':
        $authController = new AuthController();
        $authController->logout();
        break;
    case 'filter':
        $id = $params[1];
        $homeController = new HomeController();
        $homeController->filterCategory($id);
        break;  */
       
    default:
      echo('404 Page not found');
      break;
}