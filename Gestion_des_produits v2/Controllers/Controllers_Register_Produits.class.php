<?php

class Controllers_Register_Produits {
    public  function Register_Produits(){
$produit = $_POST['produit'] ;
$fournisseur = $_POST['fournisseur'];
$date_e = "";
$date_s = "";
$interval = "" ;


if(isset($_POST['date_e'])  && isset($_POST['date_s']) ){
    $date_e = date('Y-m-d' , strtotime(str_replace('/','-',$_POST['date_e']))) ;
    $date_s = date('Y-m-d' , strtotime(str_replace('/','-',$_POST['date_s']))) ;
   
}

$date_a = new DateTime($date_e) ;
$date_b = new DateTime($date_s) ;

$interval = $date_a->diff($date_b) ;
$d= $interval->format('%R%d')."j" ;

  // extension valide
  $valid_extensions  = array('jpeg','jpg','png','gif') ;
  // repertoire des telechargements 
  $chemin = "Upload/" ;

if(!empty($_FILES['image'])){
$errorimg = $_FILES['image']['error'] ;
// stocke le nom de fichier d'origine du client
$img  = $_FILES['image']['name'];
// stocke le nom du fichier temporaire designe
$tmp = $_FILES['image']['tmp_name'] ;

// recupere l'extension du fichier telecharge
$ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)) ;
// on peut meme telecharger la meme image en utilisant rand
$image_finale = rand(1000 , 1000000).$img ;
// on verifie le format valide

if(in_array($ext,$valid_extensions)){
$chemin = $chemin.strtolower($image_finale) ;
}

if(move_uploaded_file($tmp,$chemin)){
    Manipulation_Produits::Sauve_Produits($produit,$fournisseur,$date_e,$date_s,$image_finale,$d);
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

    public function AfficheProduits(){
        $data=Manipulation_Produits::AfficherTousLesProduits() ;
        echo json_encode($data) ;
    }

    public function SuppressionProduits(){
        $id_produits = $_POST['id_produits'] ;
        $data=Manipulation_Produits::SupprimerUnProduits($id_produits) ;
        if($data==true){
            echo 'success' ;
        } else {
            echo 'echec' ;
        }

    }

    public function mise_a_jour(){
        $produit = $_POST['produit_mj'] ;
$fournisseur = $_POST['fournisseur_mj'];
$date_e = "";
$date_s = "";
$id=$_POST['id_mj'] ;


if(isset($_POST['date_e_mj'])  && isset($_POST['date_s_mj']) ){
    $date_e = date('Y-m-d' , strtotime(str_replace('/','-',$_POST['date_e_mj']))) ;
    $date_s = date('Y-m-d' , strtotime(str_replace('/','-',$_POST['date_s_mj']))) ;
}



  // extension valide
  $valid_extensions  = array('jpeg','jpg','png','gif') ;
  // repertoire des telechargements 
  $chemin = "Upload/" ;

if(!empty($_FILES['image_mj'])){
$errorimg = $_FILES['image_mj']['error'] ;
// stocke le nom de fichier d'origine du client
$img  = $_FILES['image_mj']['name'];
// stocke le nom du fichier temporaire designe
$tmp = $_FILES['image_mj']['tmp_name'] ;

// recupere l'extension du fichier telecharge
$ext = strtolower(pathinfo($img,PATHINFO_EXTENSION)) ;
// on peut meme telecharger la meme image en utilisant rand
$image_finale = rand(1000 , 1000000).$img ;
// on verifie le format valide

if(in_array($ext,$valid_extensions)){
$chemin = $chemin.strtolower($image_finale) ;
}

if(move_uploaded_file($tmp,$chemin)){
    Manipulation_Produits::UpdateProduits($produit,$fournisseur,$date_e,$date_s,$image_finale,$id) ;
echo 'success'  ;
}
      
       


if($errorimg > 0){
echo 'error_image' ;
}

}else{ 
echo "image vide !" ;
}

Manipulation_Produits::UpdateProduitsWithoutimg($produit,$fournisseur,$date_e,$date_s,$id) ;
  
   
       

    }

    public function SelectImageProduits(){
     
       $_SESSION['id_info']=$_POST['id_info'];
       echo "success" ;
    }
    public function SelectImageProduitsAffiche(){
        $data=Manipulation_Produits::ImageProduits($_SESSION['id_info']) ;
         echo json_encode($data) ;
     }

     public function Search(){

        
        $dat=Manipulation_Produits::SearchVerif($_POST['search']."%") ;
        if($dat!=0){
            $_SESSION['search']=$_POST['search']  ;
            echo "success" ;
        }else{
            echo 'false' ;
        }
       
     }

     public function SearchAffiche(){
        $data=Manipulation_Produits::Search($_SESSION['search']."%") ;
        echo json_encode($data) ;
     }
 


}


?>