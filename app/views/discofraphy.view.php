<?php
require_once './libs/smarty/libs/Smarty.class.php';
// class BeerView {

//     function showBeers($beers) {

//         include './templates/header.tpl';    
//         include './templates/form_alta.tpl';
        
//         echo '<ul class="list-group">';
//         foreach ($beers as $beer) {
//            echo "<li class='list-group-item d-flex justify-content-between align-items-center'>
//                     <span> $beer->type - $beer->container - $beer->stock - $beer->price </span>
//                     <a href='delete/$beer->id' type='button' class='btn btn-danger ml-auto'>Borrar</a>
//                     </li>";
//                   }
//                   echo "</ul>";
                  
//         include './templates/footer.php';
//       }
//     }

class DiscographyView {
    private $smarty;

    public function __construct() {
        $this->smarty = new Smarty(); // inicializo Smarty
    }
    function showDiscography($discography) {
       // asigno variables al tpl smarty
        $this->smarty->assign('count', count($discography)); 
        $this->smarty->assign('beers', $discography);

        // mostrar el tpl
        $this->smarty->display('beerView.tpl');
    }
} 