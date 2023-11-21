<?php
session_start() ;
include("Core/Autoload.class.php") ;
// s'il existe un url
if(isset($_GET["action"])){
    Root::executer($_GET["action"],"error404.php") ;
}else {
    // ControllersViews::getViews("AccueilPrincipale.php") ;
    ControllersViews::getViews("inscription.php") ;
}




?>
