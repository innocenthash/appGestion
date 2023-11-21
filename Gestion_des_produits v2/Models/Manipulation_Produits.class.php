<?php
 class Manipulation_Produits {
    public static function Sauve_Produits($nomp,$nomf,$date_e,$date_s,$image,$interval){
        $nomp = htmlspecialchars(trim($nomp)) ;
        $nomf = htmlspecialchars(trim($nomf)) ;
        $date_e= htmlspecialchars(trim($date_e)) ;
        $image= htmlspecialchars(trim($image)) ;
        $date_s = htmlspecialchars(trim($date_s)) ;
        $interval = htmlspecialchars(trim($interval)) ;

        $bd = new Database() ;
        $bd->insert('informations')
           ->parametters(array("nom_produit" , "nom_fournisseur" ,"date_e" ,"date_s","image","interval_temps"))
           ->execute(array($nomp,$nomf,$date_e,$date_s,$image,$interval)) ;

    }

    public static function AfficherTousLesProduits(){
      
      $bd = new Database() ;
      $res =$bd->select('informations')
          
          ->execute(null) ;
          return $res ;
  }

  public static function SupprimerUnProduits($id_produits){
    $bd = new Database() ;
    $res =$bd->delete('informations')
        ->where("id_info","=")
        
        ->execute(array($id_produits)) ;
        return $res ;

}

public static function UpdateProduits($p,$f,$de ,$ds,$image,$id){
  $p = htmlspecialchars(trim($p));
  $f = htmlspecialchars(trim($f));
  $de= htmlspecialchars(trim($de));
  $ds= htmlspecialchars(trim($ds));
  $image = htmlspecialchars(trim($image));
  $bd = new Database() ;
  $res =$bd->update('informations')
      ->set(array('nom_produit','nom_fournisseur','date_e',"date_s","image"),'=')
     
      ->where("id_info","=")
      
      ->execute(array($p ,$f,$de ,$ds,$image,$id)) ;
      return $res ;

}

public static function UpdateProduitsWithoutimg($p,$f,$de ,$ds,$id){
  $p = htmlspecialchars(trim($p));
  $f = htmlspecialchars(trim($f));
  $de= htmlspecialchars(trim($de));
  $ds= htmlspecialchars(trim($ds));
  
  $bd = new Database() ;
  $res =$bd->update('informations')
      ->set(array('nom_produit','nom_fournisseur','date_e',"date_s"),'=')
     
      ->where("id_info","=")
      
      ->execute(array($p ,$f,$de ,$ds,$id)) ;
      return $res ;

}

public static function ImageProduits($id_info){
  $id_info= htmlspecialchars(trim($id_info));
  $db = new Database() ;
  $res=$db->select('informations')
      ->where('id_info',"=")
      ->execute(array($id_info)) ;
      return $res ;
      }

      public static function Search($s){
        $s= htmlspecialchars(trim($s));
        $db = new Database() ;
        $res=$db->select('informations')
            
            ->search('nom_produit')
            ->execute(array($s)) ;
            return $res ;
            }

            public static function SearchVerif($s){
              $s= htmlspecialchars(trim($s));
              $db = new Database() ;
              $res=$db->select('informations')
                  
                  ->search('nom_produit')
                  ->execute(array($s)) ;
                  return count($res) ;
                  }

 }




?>