<?php
class ControllersViewsInscription{
    public function connecter(){
        echo "teste mandeha  " ;
    }
    public function index(){
        
            ControllersViews::getViews("inscription.php") ;
        
       
    }
}




?>