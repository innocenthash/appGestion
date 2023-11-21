<?php
// pour resoudre le probleme de fiare du require a chaque fois 
function charger($file){

// si le fichier existe on fait parcourir chaque fichier pour trouver sa racine 
    if(file_exists("Controllers/".$file.".class.php")){
        require "Controllers/".$file.".class.php" ;
    }else if (file_exists("Core/".$file.".class.php")){
        require "Core/".$file.".class.php" ;
    }else if (file_exists("Models/".$file.".class.php")){
        require "Models/".$file.".class.php" ;
    }
   
}
spl_autoload_register("charger") ;
define("BASE_URL","http://localhost/Gestion_des_produits/") ;


?>