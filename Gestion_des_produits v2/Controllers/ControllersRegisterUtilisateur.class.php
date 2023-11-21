<?php

 
 class ControllersRegisterUtilisateur{
  
    public function Utilisateur(){
// insertion users
      
        //  verition nom s'il exise deja 
       $pseudo= Manipulation_Utilisateurs::VerificationNom($_POST['pseudo']) ;

        $email=Manipulation_Utilisateurs::VerificationEmail($_POST['email']) ;

        $pass=Manipulation_Utilisateurs::VerificationMotDePass($_POST['password']) ;
// fomba fi specifiena 
        $token=Controllers_Random::token_random_string(20);

        $pass1= $_POST['password'] ;
        $pass2=$_POST['confirme_password'] ;

        if($pseudo==!0){
            echo "nom_existe" ;
         } else if($email==!0){
            echo "email_existe" ;
         }else if($pass==!0){
            echo "pass_existe" ;
         }
         else if($pass1!=$pass2){
                echo "confirme_incorrect" ;
         } 
         else{
            
            Controllers_Mail::php_mail($_POST['email'],$token)  ;
            Manipulation_Utilisateurs::Utilisateurs($_POST['pseudo'],$_POST['email'],$_POST['password'],$_POST['confirme_password'],$token) ;
        
              echo "success" ;  
   
              
         }
        
        
      
      
    
     
      
    }

    // pour se deconnecter 

    public function Deconnexion(){
      session_destroy() ;
      header("location:http://localhost/Gestion_Alimentaire/connexion/testcookies") ;
      //header("location:".BASE_URL) ;
    }


 }






?>