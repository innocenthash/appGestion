<?php
 class Controllers_Random{
    public static function token_random_string($length){
        
            $string = '01234567abcdefghijklmnopkrstuvwxyzABCDEFGHIJKLMNOPKRSTUVWXYZ' ;
            $token='' ;
            for($i=0 ; $i<$length;$i++){
              $token = $token.$string[rand(0,strlen($string)-1)] ;
            }
            return $token ;
           }
          
    }
 






?>