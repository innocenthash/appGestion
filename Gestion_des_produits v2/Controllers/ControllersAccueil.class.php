<?php
class ControllersAccueil {
    public function Accueil(){
       if(isset($_SESSION['email'])){
        ControllersViews::getViews("AccueilPrincipale.php") ;
       }else{
        ControllersViews::getViews("error404.php") ;
       }
    }
    public function menu(){
        ControllersViews::getViews("menu.php") ;
    }
    
    public function Fournisseur(){
        if(isset($_SESSION['email'])){
        ControllersViews::getViews("Fournisseur.php") ;
    }else{
        ControllersViews::getViews("error404.php") ;
       }
}
}







?>