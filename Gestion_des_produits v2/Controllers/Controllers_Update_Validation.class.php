<?php


class Controllers_Update_Validation{
    public  function Verification($destinataire,$token){
     
            if(!empty($destinataire) && !empty($token)){
                $mails=Manipulation_Utilisateurs::VerificationMailToken($destinataire,$token) ;
                  if($mails==1){

                    //echo "existe" ;  on confirme l'inscription 
                    Manipulation_Utilisateurs::UpdateMailToken($destinataire,$token,1,$destinataire) ;
                   
                       header('location:http://localhost/Gestion_des_produits/ControllersViewsConnection ') ;
                       echo "Votre adresse email est bien verifié !" ;
              
                  } else{
                   
                    ControllersViews::getViews('ErreurDeConfirmationMail.php');
                  }
           }else{
            echo "vide" ;
           }
  
    }

    
    

    }










?>