<?php

class ControllersViews{
    public static function getTemplateParts($name){
       include("Views/Template-Parts/".$name) ;
    }
    public static function getViews($name){
        include("Views/".$name) ;
     }
}








?>