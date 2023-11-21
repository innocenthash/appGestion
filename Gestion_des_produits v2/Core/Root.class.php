<?php
class Root {
public static function executer($url,$page) {
    $nomfile = "" ;
    $nommethode = "" ;
$url = htmlspecialchars(trim($url)) ;
// verification s'il y a un slash dans l'url


if(strpos($url,'/')>-1){
    // s'il y en a un , on separe l'url par le slash (delimiteur (/))
    $tab  = explode('/',$url) ;
    
    $nomfile = $tab[0];
    $nommethode = $tab[1];
    if(count($tab)==2){
        // on test lorsque i'url a deux paramettre , on test si le fichier existe
    // donc les fichiers sont dans controllers avec extension class.php
        if(file_exists("Controllers/".$nomfile.".class.php")){
                // on teste aussi si la methode existe 
                if(method_exists($nomfile,$nommethode)) {
                    // s'il existe on execute
                    $reflect = new ReflectionMethod($nomfile , $nommethode) ;
                    $reflect->invoke(new $nomfile) ;
                }else {
                    ControllersViews::getViews($page) ;
                }
        } else {
            echo "fichier n'existe pas" ;
        }

    } else {
        $params = array() ;
        $j = 0 ;
    
    for($i=2 ; $i<count($tab) ; $i++){
        $params[$j]=$tab[$i] ;
        $j++ ;
    }

    //var_dump($params) ;

    // on teste si le fichier et la methode existe 

    if(file_exists("Controllers/".$nomfile.".class.php")){
        if(method_exists($nomfile , $nommethode)){
            // execution 
            $reflect = new ReflectionMethod($nomfile , $nommethode) ;
            $reflect->invokeArgs( new $nomfile , $params) ;

        }else{
            echo "methode de l'argument n'existe pas" ;
        }
    } else {
        echo "fichier n'existe pour l'argument" ;
    }

    }

   
} else {
    // s'il y a un url sans slash : on fait appelle automatiquement a un method dans controller (index) si le file existe
    if(file_exists("Controllers/".$url.".class.php")){
        $reflect = new ReflectionMethod($url,"index") ;
        $reflect->invoke(new $url) ;
    }else{
        ControllersViews::getViews($page) ;
    }
}
}
}






?>