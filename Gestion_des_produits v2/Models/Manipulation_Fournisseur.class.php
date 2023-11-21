<?php
 class Manipulation_Fournisseur {
    public static function Sauve_Fournisseur($nomp,$nomf,$email,$date_e,$date_s,$image,$interval){
        $nomp = htmlspecialchars(trim($nomp)) ;
        $nomf = htmlspecialchars(trim($nomf)) ;
        $email = htmlspecialchars(trim($email)) ;
        $date_e= htmlspecialchars(trim($date_e)) ;
        $image= htmlspecialchars(trim($image)) ;
        $date_s = htmlspecialchars(trim($date_s)) ;
        $interval = htmlspecialchars(trim($interval)) ;

        $bd = new Database() ;
        $bd->insert('fournisseur')
           ->parametters(array("fourn_name" , "product_name","fourn_email" ,"date_l" ,"date_p","temps_rest","fourn_image"))
           ->execute(array($nomp,$nomf,$email,$date_e,$date_s,$image,$interval)) ;

    }

    public static function Apropos_Fournisseur(){
      
        $bd = new Database() ;
        $res =$bd->select('fournisseur')
            
            ->execute(null) ;
            return $res ;
    }

    public static function ImageFournisseur($id_info){
        $id_info= htmlspecialchars(trim($id_info));
        $db = new Database() ;
        $res=$db->select('fournisseur')
            ->where('id_fourn',"=")
            ->execute(array($id_info)) ;
            return $res ;
            }

            public static function SupprimerUnFournisseur($id_produits){
                $bd = new Database() ;
                $res =$bd->delete('fournisseur')
                    ->where("id_fourn","=")
                    
                    ->execute(array($id_produits)) ;
                    return $res ;
            
            }

            public static function UpdatePayement($p,$f){
                $p = htmlspecialchars(trim($p));
                $f = htmlspecialchars(trim($f));
                
                $bd = new Database() ;
                $res =$bd->update('fournisseur')
                    ->set(array('payement'),'=')
                   
                    ->where("id_fourn","=")
                    
                    ->execute(array($p ,$f)) ;
                    return $res ;
              
              }
  
}






?>