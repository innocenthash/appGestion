<?php

class ControllersPublics {

    public static function getJs($js){
        for($i=0;$i<count($js);$i++){
            echo '<script src="'.BASE_URL.'Publics/js/'.$js[$i].'"></script>' ;
        }
    }

    public static function getCss($css){
        for($i=0;$i<count($css);$i++){
           echo '<link rel="stylesheet" href="'.BASE_URL.'Publics/css/'.$css[$i].'">' ;
        }
    }

    public static function getImage($image){
        for($i=0;$i<count($image);$i++){
          echo '<img src="'.BASE_URL.'Publics/images/'.$image[$i].'" class="img-fluid border border-light rounded-circle" width="15%" height="80">' ;
    }
    
}

public static function getImageScreen($image){
    for($i=0;$i<count($image);$i++){
      echo '<img src="'.BASE_URL.'Publics/images/'.$image[$i].'" class="img-fluid border border-light rounded-circle" width="30%" height="80">' ;
}
}

}
?>

