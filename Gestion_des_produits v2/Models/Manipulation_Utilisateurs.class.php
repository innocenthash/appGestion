<?php
   class Manipulation_Utilisateurs{
    //insertion 
    public static function Utilisateurs($nom , $email ,$mdp ,$mdpc,$token){
        $nom = htmlspecialchars(trim($nom)) ;
        $email = htmlspecialchars(trim($email)) ;
        $mdp = sha1($mdp) ;
        $mdpc = sha1($mdpc) ;
       

        $bd = new Database() ;
        $bd->insert('utilisateurs')
           ->parametters(array("pseudo_utilisateur" , "email_utilisateur" ,"pass_utilisateur" ,"confirme_utilisateur","token"))
           ->execute(array($nom , $email ,$mdp,$mdpc,$token)) ;

    }

    // verification

    public static function VerificationNom($nom ){
        $nom = htmlspecialchars(trim($nom));
       
        $bd = new Database() ;
       $res =$bd->select('utilisateurs')
           ->where("pseudo_utilisateur","=")
           ->execute(array($nom )) ;
           return count($res) ;
    }

    public static function VerificationEmail($email ){
        $email= htmlspecialchars(trim($email));
       
        $bd = new Database() ;
       $res =$bd->select('utilisateurs')
           ->where("email_utilisateur","=")
           ->execute(array($email )) ;
           return count($res) ;
    }

    public static function VerificationMotDePass($pass){
        $pass= sha1($pass) ;
       
        $bd = new Database() ;
       $res =$bd->select('utilisateurs')
           ->where("pass_utilisateur","=")
           ->execute(array($pass)) ;
           return count($res) ;
    }

    // fin

    // connexion
    public static function VerificationConnexionMembre($mail , $pass){
        $mail = htmlspecialchars(trim($mail)) ;
        
    $pass = sha1($pass);
    $bd = new Database() ;
    $res =$bd->select('utilisateurs')
        ->where("email_utilisateur","=")
        ->and("pass_utilisateur","=")
       
        ->execute(array($mail,$pass)) ;
        return count($res) ;
}

public static function Selectmonid($id){
      
    $bd = new Database() ;
    $res =$bd->select('utilisateurs')
             ->where('email_utilisateur',"=")
             ->execute(array($id) ) ;
        return $res ;
        
}
    // fin 

    // inscription avec mail de confirmation 

    public static function VerificationMailToken($mail, $token){
        $mail = htmlspecialchars(trim($mail));
        $token = htmlspecialchars(trim($token));
       
        $bd = new Database() ;
       $mail =$bd->select('utilisateurs')
           ->where("email_utilisateur","=")
           ->and('token','=')
           ->execute(array($mail , $token )) ;
           return count($mail) ;
    }

    public static function UpdateMailToken($mail,$token ,$validation,$mail1){
        $bd = new Database() ;
        $upd =$bd->update('utilisateurs')
            ->set(array('email_utilisateur','token','validation'),'=') 
            ->where('email_utilisateur','=')       
            ->execute(array($mail,$token ,$validation,$mail1)) ;
            return $upd ;

    }


    // fin 

    // verification email connexion

    public static function VerificationConnexionMembreValidation($mail , $pass,$validation){
        $mail = htmlspecialchars(trim($mail)) ;
        $validation = htmlspecialchars(trim($validation)) ;
    $pass = sha1($pass);
    $bd = new Database() ;
    $res =$bd->select('utilisateurs')
        ->where("email_utilisateur","=")
        ->and("pass_utilisateur","=")
        ->and("validation","=")
        ->execute(array($mail,$pass,$validation )) ;
        return count($res) ;
}

public static function UpdateMailTokenConnexion($token,$mail){
    $bd = new Database() ;
    $upd =$bd->update('utilisateurs')
        ->set(array('token'),'=') 
        ->where('email_utilisateur','=')       
        ->execute(array($token,$mail)) ;
        return $upd ;

}


// fin
















    // ************ update avatar ************************
    public static function UpdateAvatar($nom , $email ,$avatar,$id){
        $bd = new Database() ;
        $res =$bd->update('personne')
            ->set(array('nom','adresse_email','avatar'),'=')
   
            ->where("idpersonne","=")
            
            ->execute(array($nom,$email,$avatar,$id)) ;
            return $res ;

    }

    //  ************* insert imagE *************
    // ************ update avatar ************************
    public static function InsertAvatar($avatar,$id){
        $bd = new Database() ;
        $res =$bd->insert('personne')
            
            ->parametters(array('avatar'))
            ->where("idpersonne","=")
            
            ->execute(array($avatar,$id)) ;
            return $res ;

    }


    

   

    public static function InformationUtilisateur($information) {
        $information= htmlspecialchars(trim($information));
       
        $bd = new Database() ;
       $res =$bd->select('personne')
          
           ->execute(array($information )) ;
           return $res ;
    }

        
    public static function VerificationEmailPassOublie($mail,$validation){
        $mail = htmlspecialchars(trim($mail)) ;
        $validation = htmlspecialchars(trim($validation)) ;
    
    $bd = new Database() ;
    $res =$bd->select('personne')
        ->where("adresse_email","=")
        
        ->and("validation","=")
        ->execute(array($mail,$validation )) ;
        return count($res) ;
}

    // public static function VerificationValidationMembre($validation){
        
    //     $validation = htmlspecialchars(trim($validation)) ;
        
    //     $bd = new Database() ;
    //     $res =$bd->select('personne')
    //         ->where("validation","=")

    //         ->execute(array($validation )) ;
    //         return count($res) ;
    // }
//AfficheMembre
    public static function AfficherTousLesMembre(){
      
        $bd = new Database() ;
        $res =$bd->select('personne')
            
            ->execute(null) ;
            return $res ;
    }
// on affiche tous les membres apart moi 
    public static function AfficherTousLesMembreSaufMe($me){
      
        $bd = new Database() ;
        $res =$bd->select('personne')
                 ->where('adresse_email',"!=")
                 ->execute(array($me) ) ;
            return $res ;
    }
//  on affiche le profil de l'utilisateur 
    public static function AfficheUserProfil($me){
      
        $bd = new Database() ;
        $res =$bd->select('personne')
                 ->where('idpersonne',"=")
                 ->execute(array($me) ) ;
            return $res ;
    }

    //  on affiche lmon profil
    public static function AfficheMonProfil($me){
      
        $bd = new Database() ;
        $res =$bd->select('personne')
                 ->where('adresse_email',"=")
                 ->execute(array($me) ) ;
            return $res ;
    }
   


    // public static function SelectId($me){
      
    //     $bd = new Database() ;
    //     $res =$bd->select('personne')
    //              ->where("idpersonne","=")
    //              ->execute(array($me)) ;
    //         return $res ;
    // }


    // suppression 
    public static function SupprimerUnMembre($idpersonne){
        $bd = new Database() ;
        $res =$bd->delete('personne')
            ->where("idpersonne","=")
            
            ->execute(array($idpersonne)) ;
            return $res ;

    }

    // mise a jour 
    public static function Update($nom ,$email ,$mdp ,$idpersonne){
        $bd = new Database() ;
        $res =$bd->update('personne')
            ->set(array('nom','adresse_email','motdepass'),'=')
           
            ->where("idpersonne","=")
            
            ->execute(array($nom ,$email,$mdp,$idpersonne)) ;
            return $res ;

    }

     // mise a jour nouveau mot de pass
     public static function UpdateNouveauMotDePass($mdp ,$mdpc,$email){
        $mdp = sha1($mdp) ;
        $mdpc = sha1($mdpc);
        $bd = new Database() ;
        $res =$bd->update('personne')
            ->set(array('motdepass','motdepassconfirme'),'=')
           
            ->where("adresse_email","=")
            
            ->execute(array($mdp ,$mdpc,$email)) ;
            return $res ;

    }


    

     // mise a jour 
     
   


    //******** relation entre les utilisateurs **********//
//*********verification lien d'amitie************//
    public static function VerifRelation($id_receveur,$id_demandeur,$id_demandeu,$id_receveu){
        $bd = new Database() ;
        $verifRel =$bd->selectrelation('relationclient')
            
            ->execute(array($id_receveur,$id_demandeur,$id_demandeu ,$id_receveu)) ;
            return count($verifRel) ;

    }

    //*********verification status************//
    public static function VerifStatus($id_receveur,$id_demandeur,$id_demandeu,$id_receveu){
        $bd = new Database() ;
        $verifRel =$bd->selectrelation('relationclient')
            
            ->execute(array($id_receveur,$id_demandeur,$id_demandeu ,$id_receveu)) ;
            return $verifRel;

    }

      //*********verification count relation************//
      public static function VerifStatusC($id_receveur,$id_demandeur,$id_demandeu,$id_receveu){
        $bd = new Database() ;
        $verifRel =$bd->selectrelation('relationclient')
            
            ->execute(array($id_receveur,$id_demandeur,$id_demandeu ,$id_receveu)) ;
            return count($verifRel);

    }
//*********insertion d'amie************//
    public static function InsertRelation($id_demandeur, $id_receveur,$status){
        $id_demandeur = htmlspecialchars(trim($id_demandeur)) ;
        $id_receveur = htmlspecialchars(trim($id_receveur)) ;
        $status = htmlspecialchars(trim($status)) ;
        $bd = new Database() ;
        $bd->insert('relationclient')
           ->parametters(array("id_demandeur" , "id_receveur","status"))
           ->execute(array($id_demandeur, $id_receveur,$status)) ;

    }

    // public static function UpdateStatus($id_demandeur , $id_receveur,$status,$id_demandeurw , $id_receveurw){
    //     $bd = new Database() ;
    //     $res =$bd->updaterelation('relationclient')
    //         ->set(array('id_demandeur','id_receveur','status'),'=')
           
            
    //         ->execute(array($id_demandeur , $id_receveur,$status,$id_demandeurw , $id_receveurw)) ;
    //         return $res ;

    // }

    // ***************mise a jour status *********************
    public static function UpdateStatus($id_demandeur , $id_receveur,$status,$id_demandeurw , $id_receveurw, $id_receveurw1,$id_demandeurw1 ){
        $bd = new Database() ;
        $res =$bd->updaterelation('relationclient')
            
            ->execute(array($id_demandeur , $id_receveur,$status,$id_demandeurw , $id_receveurw, $id_receveurw1,$id_demandeurw1 )) ;
            return $res ;

    }
// *********** mise a jour bloque ************
    public static function UpdateBloque($id_demandeur , $id_receveur,$status,$id_bloque,$id_demandeurw , $id_receveurw, $id_receveurw1,$id_demandeurw1 ){
        $bd = new Database() ;
        $res =$bd->updaterelationbloque('relationclient')
            
            ->execute(array($id_demandeur , $id_receveur,$status,$id_bloque,$id_demandeurw , $id_receveurw, $id_receveurw1,$id_demandeurw1 )) ;
            return $res ;

    }
 // ***************mise a jour status *********************
    //*********insertion d'amie************//
    public static function InsertAmieBloquer($id_demandeur, $id_receveur,$status,$id_bloquer){
        $id_demandeur = htmlspecialchars(trim($id_demandeur)) ;
        $id_receveur = htmlspecialchars(trim($id_receveur)) ;
        $status = htmlspecialchars(trim($status)) ;
        $id_bloquer = htmlspecialchars(trim($id_bloquer)) ;
        $bd = new Database() ;
        $bd->insert('relationclient')
           ->parametters(array("id_demandeur" , "id_receveur","status","id_bloquer"))
           ->execute(array($id_demandeur, $id_receveur,$status,$id_bloquer)) ;

    }
// *********************supprimer amie**************************

// *********************supprimer amie**************************


public static function SupprRelation($id_receveur,$id_demandeur,$id_demandeu,$id_receveu){
    $bd = new Database() ;
    $verifRel =$bd->supprimerelation('relationclient')
        
        ->execute(array($id_receveur,$id_demandeur,$id_demandeu ,$id_receveu)) ;
        return $verifRel;

}

// pour savoir qui est le receveur ou le demandeur 

public static function SectionDemRec($id_receveur,$id_demandeur,$id_pers){
       $db = new Database();

       $select = $db->selectdemrec('personne','relationclient')
       ->execute(array($id_receveur,$id_demandeur,$id_pers)) ;
        return $select;

}

// **************************messagerie ************************//
public static function nombreamie($idrecdem , $idrecdem1,$status2){
    $db = new Database() ;
    $selectnbr = $db->nombreamie('relationclient')
                    ->execute(array($idrecdem , $idrecdem1, $status2 )) ;
                    return count($selectnbr) ;
                   
} 
public static function message($idrecdem , $idrecdem1, $idrecdem2,$status2,$id_from){
    $db = new Database() ;
    $selectnbr = $db->message()
                    ->execute(array($idrecdem , $idrecdem1, $idrecdem2,$status2,$id_from)) ;
                    return $selectnbr ;
                    
}
// ******************* conversations ***********************************
public static function conversations($status1 , $status2, $status3,$status4){
    $db=new Database() ;
    $conv = $db->conversations('messagerie')
               -> execute(array($status1 , $status2, $status3,$status4)) ;
               return  $conv ;
}

//****************************** insertion message************
public static function insertionconversation($id_from, $id_to ,$message,$date_message ,$lu){
    $id_from = htmlspecialchars(trim($id_from)) ;
    $id_to = htmlspecialchars(trim($id_to)) ;
    $date_message= htmlspecialchars(trim($date_message)) ; 
    $lu = htmlspecialchars(trim($lu)) ;
   
    $bd = new Database() ;
    $bd->insert('messagerie')
       ->parametters(array("id_from" , "id_to" ,"message","date_message","lu"))
       ->execute(array($id_from, $id_to ,$message,$date_message ,$lu)) ;

}

// ******************** lorsqu'on clique sur le lien de l'utilisateur qu'on veut chater ************ lu 0

 // mise a jour nouveau mot de pass
 public static function Updatelu($lu,$id_from, $id_to){
    $id_from = htmlspecialchars(trim($id_from)) ;
    $id_to = htmlspecialchars(trim($id_to)) ;
    $lu = htmlspecialchars(trim($lu)) ;
    $bd = new Database() ;
    $res =$bd->update('messagerie')
        ->set(array('lu'),'=')
       
        ->where("id_to","=")
        ->and('id_from','=')
        
        ->execute(array($lu,$id_from, $id_to)) ;
        return $res ;

}

public static function voir_plus($id_from, $id_to,$id_from1, $id_to1){

    $bd = new Database() ;
    $res =$bd->voir('messagerie')
    ->execute(array($id_from, $id_to,$id_from1, $id_to1)) ;
        return $res ;
}



// ************************ voir album ****************************

   }









?>