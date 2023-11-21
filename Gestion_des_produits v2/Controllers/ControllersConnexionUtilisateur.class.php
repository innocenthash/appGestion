<?php
class ControllersConnexionUtilisateur{

   public function SeConnecter(){
    // verification 

//    $n=Manipulation_Utilisateurs::VerificationConnexionMembre($_POST['email'],$_POST['pass-connect']) ;
   $email=Manipulation_Utilisateurs::VerificationEmail($_POST['email']) ;
 $n=Manipulation_Utilisateurs::VerificationConnexionMembreValidation($_POST['email'],$_POST['pass-connect'],1) ;
   //***********id de l'utilisateur actuel***********//
   $id=Manipulation_Utilisateurs::Selectmonid($_POST['email']);
   $token=Controllers_Random::token_random_string(20);
   foreach($id as $da){
      $_SESSION['monid'] = $da->id_utilisateur;
  }
 //***********id de l'utilisateur actuel***********//

   $mdp=Manipulation_Utilisateurs::VerificationMotDePass($_POST['pass-connect']) ;
   
     if($email==0){
               echo 'email_incorrect' ;
     
     }else if($mdp==0){
      echo "pass_incorrect" ;
     }else if($n==0){
           echo "no-confirme";
           Manipulation_Utilisateurs::UpdateMailTokenConnexion($token,$_POST['email']) ;
           Controllers_Mail_Connexion::mail_Connexion($_POST['email'],$token) ;
       
     } else{
      $_SESSION["email"]=$_POST['email'] ;
        echo "success" ;
     }
     
    
   }
    // pour se deconnecter 

    public function Deconnexion(){
      session_destroy() ;
      header("location:http://localhost/Gestion_des_produits/ControllersViewsInscription") ;
      //header("location:".BASE_URL) ;
    }

}

?>
  
  