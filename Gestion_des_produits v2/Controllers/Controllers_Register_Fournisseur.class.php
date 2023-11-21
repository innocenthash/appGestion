<?php

class Controllers_Register_Fournisseur {
    public function Register_Fournisseur(){
        $produit = $_POST['produit_nom'] ;
        $email = $_POST['fournisseur_email'] ;
$fournisseur = $_POST['fournisseur_nom'];
$date_e = "";
$date_s = "";
$interval = "" ;


if(isset($_POST['date_l'])  && isset($_POST['date_p']) ){
    $date_e = date('Y-m-d' , strtotime(str_replace('/','-',$_POST['date_l']))) ;
    $date_s = date('Y-m-d' , strtotime(str_replace('/','-',$_POST['date_p']))) ;
   
}

$date_a = new DateTime($date_e) ;
$date_b = new DateTime($date_s) ;

$interval = $date_a->diff($date_b) ;
$d= $interval->format('%R%d');

  // extension valide
  $valid_extensions  = array('jpeg','jpg','png','gif') ;
  // repertoire des telechargements 
  $chemin = "Upload/" ;

if(!empty($_FILES['image_fournisseur'])){
$errorimg = $_FILES['image_fournisseur']['error'] ;
// stocke le nom de fichier d'origine du client
$img  = $_FILES['image_fournisseur']['name'];
// stocke le nom du fichier temporaire designe
$tmp = $_FILES['image_fournisseur']['tmp_name'] ;

// recupere l'extension du fichier telecharge
$ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)) ;
// on peut meme telecharger la meme image en utilisant rand
$image_finale = rand(1000 , 1000000).$img ;
// on verifie le format valide

if(in_array($ext,$valid_extensions)){
$chemin = $chemin.strtolower($image_finale) ;
}

if(move_uploaded_file($tmp,$chemin)){
    Manipulation_Fournisseur::Sauve_Fournisseur($fournisseur,$produit,$email,$date_e,$date_s,$d,$image_finale);
    $_SESSION['image'] = $image_finale ;
echo 'success'  ;
} else {
echo "invalide" ;
}

if($errorimg > 0){
echo 'error_image' ;
}

} else{
echo "image vide !" ;
}
  
   

       
    }

    public function Affiche_Fournisseur(){
        $data=Manipulation_Fournisseur::Apropos_Fournisseur() ;
        echo json_encode($data) ;
    }

    public function SelectImageFournisseur(){
     
        $_SESSION['id_fourn']=$_POST['id_fourn'];
        echo "success" ;
     }
     public function SelectImageFournisseurAffiche(){
        $data=Manipulation_Fournisseur::ImageFournisseur($_SESSION['id_fourn']) ;
          echo json_encode($data) ;
      }

      public function Supprime_Fournisseur(){
     
        $data=Manipulation_Fournisseur::SupprimerUnFournisseur($_POST['id_fourn']) ;
        echo "success" ;
     }

    //  payement   UpdatePayement

    public function Payement_Fournisseur(){
     
        $data=Manipulation_Fournisseur::UpdatePayement(1,$_POST['id_fourn']) ;
        echo "success" ;
     }


 
}






?>