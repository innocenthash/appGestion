<?php
class ControllersViewsConnection{
    public function connecter(){
        echo "teste mandeha  " ;
    }
    public function index(){
       
            ControllersViews::getViews("connection.php") ;
        
       
    }
}

