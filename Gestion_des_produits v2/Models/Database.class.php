<?php

class Database {
    private $query , $db ;
    private static $host , $dbname , $user , $pass ;

    // initialisation du bdd 

    public static function init($host , $dbname , $user , $pass ){
        self::$host = htmlspecialchars(trim($host)) ;
        self::$dbname = htmlspecialchars(trim($dbname)) ;
        self::$user = htmlspecialchars(trim($user)) ;
        self::$pass = htmlspecialchars(trim($pass)) ;
    }

    public function db(){
        // quand le db est on fait la liaison 
        if(!isset($this->db)){
            $this->db = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname ,self::$user,self::$pass) ;
        }
        return $this->db ;
    }


    public function select($table) {
        $table = htmlspecialchars(trim($table)) ;
        $this->query = "SELECT*FROM ".$table ;
        return $this  ;
    }

   

    public function update($table){
        $table= htmlspecialchars(trim($table)) ;
        $this->query = " UPDATE ".$table;
        return $this ;
    }

    public function delete($table){
        $table = htmlspecialchars(trim($table)) ;
        $this->query = " DELETE FROM ".$table ;
        return $this  ;
    }

    public function set($fields,$operand) {
        // $fields = htmlspecialchars(trim($fields)) ;
        // $operand = htmlspecialchars(trim($operand)) ;
        // $this->query=   $this->query." SET ".$fields." ".$operand."?".",".$field." ".$operande."?".",".$fieldl." ".$operandel."?" ;
        // return $this ;
        $this->query=   $this->query." SET " ;
        for($i=0 ;$i<count($fields);$i++){
            $this->query = $this->query .$fields[$i]." ".$operand."?"."," ;
        }
        // pour supprimer la derniere delimitateur
        $this->query = trim( $this->query, ",");
        return $this ;
    }

    public function where($fields,$operand){
        $fields = htmlspecialchars(trim($fields)) ;
        $operand = htmlspecialchars(trim($operand)) ;
        $this->query=   $this->query." WHERE ".$fields." ".$operand."?" ;
        return $this ;
    }

    public function and($fields,$operand){
        $fields = htmlspecialchars(trim($fields)) ;
        $operand = htmlspecialchars(trim($operand)) ;
        $this->query=   $this->query." && ".$fields." ".$operand."?" ;
        return $this ;
    }


    public function insert($table){
        $table= htmlspecialchars(trim($table)) ;
        $this->query = " INSERT INTO ".$table;
        return $this ;
    }

    public function parametters($fields){
        $champs = "(".$fields[0] ;
        for($i=1 ; $i<count($fields) ;$i++){
            $champs = $champs .",".$fields[$i] ;
        }

        $trous = " VALUES (" ;
        for($i=0 ; $i<count($fields);$i++){
            $trous = $trous."?," ;
        }

        $trous = trim($trous , ",").")";

        $this->query = $this->query.$champs.")".$trous ;
        return $this ;

    }

    //********************Relation entre les utilisateurs**********************//
    // prepare('SELECT*FROM relation WHERE (id_receveur = ? AND id_demandeur=?) OR (id_receveur = ? AND id_demandeur=?) ')

    public function selectrelation($table) {
        $table = htmlspecialchars(trim($table)) ;
        $this->query = "SELECT*FROM ".$table." WHERE ((id_receveur=? && id_demandeur=?) ||( id_receveur=? && id_demandeur=?))" ;
        return $this  ;
    }

    public function selectstaus($table) {
        $table = htmlspecialchars(trim($table)) ;
        $this->query = "SELECT*FROM ".$table." WHERE ((id_receveur=? && id_demandeur=?) || (id_receveur=? && id_demandeur=?))" ;
        return $this  ;
    }

    public function updaterelation($table){
        $table = htmlspecialchars(trim($table)) ;
        $this->query = 'UPDATE '.$table.' SET id_demandeur=?,id_receveur=?,status=? WHERE ((id_demandeur=? && id_receveur=?) || (id_demandeur=? && id_receveur=? ) )' ;
        return $this  ;
    }

    public function updaterelationbloque($table){
        $table = htmlspecialchars(trim($table)) ;
        $this->query = 'UPDATE '.$table.' SET id_demandeur=?,id_receveur=?,status=?,id_bloquer=? WHERE ((id_demandeur=? && id_receveur=?) || (id_demandeur=? && id_receveur=?)  )' ;
        return $this  ;
    }
    
    //***************************************suppression un amie***************************
    public function supprimerelation($table) {
        $table = htmlspecialchars(trim($table)) ;
        $this->query = "DELETE FROM ".$table." WHERE ((id_receveur=? && id_demandeur=?) || (id_receveur=? && id_demandeur=?))" ;
        return $this  ;
    }

    // ******************************** hahafantarana hoe iza lay demandeur iza lay receveur *****************************//
    public function selectdemrec($table,$table1) {
        $table = htmlspecialchars(trim($table)) ;
        $table1 = htmlspecialchars(trim($table1)) ;
        $this->query = "SELECT u.* , r.id_demandeur , r.id_receveur , r.status , r.id_bloquer FROM " .$table. " u LEFT JOIN " .$table1. " r ON ( (id_receveur=? && id_demandeur=u.idpersonne ) || (id_receveur=u.idpersonne && id_demandeur=?)) WHERE idpersonne=? " ;
        return $this  ;
    }

    // ************************** requete pour la messagerie *************************** //

    // ireo amie efa ni accepeter azy na ny accepter ny izay status 2
    public function nombreamie($table){
        $table = htmlspecialchars(trim($table)) ;
        $this->query = "SELECT*FROM ".$table." WHERE ( (id_demandeur =? || id_receveur=?) && status=?)";
        return $this  ;
    }

    // comment recuperer les messages nom des utilisateurs la date des message envoyeur lu ou ne pas encore lu
    public function message(){
        
        $this->query = "SELECT r.nom , r.idpersonne , m.message , m.date_message , m.id_from , m.lu FROM (SELECT IF(r.id_demandeur=?, r.id_receveur,r.id_demandeur) id_utilisateur ,MAX(m.id) max_id FROM relationclient r LEFT JOIN messagerie m ON ((m.id_from,m.id_to) = (r.id_demandeur,r.id_receveur) OR (m.id_from,m.id_to) = (r.id_receveur , r.id_demandeur) ) WHERE ((r.id_demandeur=? || r.id_receveur=?) && r.status=? ) GROUP BY IF(m.id_from=?,m.id_to,m.id_from),r.id ) AS DM LEFT JOIN messagerie m ON m.id= DM.max_id LEFT JOIN personne r ON r.idpersonne=DM.id_utilisateur ORDER BY m.date_message" ;
        return $this  ;    
    }

    // requete des conversations entre deux utilisateurs 

    public function conversations($table){
        $table = htmlspecialchars(trim($table)) ;
        $this->query = " SELECT*FROM ".$table." WHERE ((id_from,id_to)=(?,?) || (id_from,id_to)=(?,?)) ORDER BY date_message " ;
        return $this  ;    
    }


    // requete insertion lors de conversation de chaque utilisateur 

   // ***************** voir plus ************
   // on compte firy ny isany message ao aminy db 
   public function voir ($table){
    $table = htmlspecialchars(trim($table)) ;
    $this->query = "SELECT COUNT(id) as nb_message FROM " .$table. " WHERE ((id_from,id_to)=(?,?) OR (id_to,id_from)=(?,?) )" ;
    return $this  ; 
}

public function plus ($table, $verif_nb_message,$nombre_total_message){
    $table = htmlspecialchars(trim($table )) ;
     $verif_nb_message =(int)$verif_nb_message ;
    $nombre_total_message =(int)$nombre_total_message ;
     $this->query = "SELECT*FROM " .$table. " WHERE ((id_from,id_to)=(?,?) || (id_to,id_from)=(?,?)) ORDER BY date_message LIMIT $verif_nb_message,$nombre_total_message  " ;
    // $this->query = "SELECT*FROM " .$table. " WHERE ((id_from,id_to)=(?,?) || (id_to,id_from)=(?,?)) ORDER BY date_message DESC LIMIT $nombre_total_message  " ;
    return $this  ;  
}

public function plus_restant ($table, $verif_nb_message,$nombre_total_message){
    $table = htmlspecialchars(trim($table )) ;
     $verif_nb_message =(int)$verif_nb_message ;
    $nombre_total_message =(int)$nombre_total_message ;
     $this->query = "SELECT*FROM " .$table. " WHERE ((id_from,id_to)=(?,?) || (id_to,id_from)=(?,?)) ORDER BY date_message LIMIT $verif_nb_message,$nombre_total_message  " ;
    // $this->query = "SELECT*FROM " .$table. " WHERE ((id_from,id_to)=(?,?) || (id_to,id_from)=(?,?)) ORDER BY date_message DESC LIMIT $nombre_total_message  " ;
    return $this  ;  
}

// recherche requete 

public function search($var) {
    $var = htmlspecialchars(trim($var)) ;
    $this->query=$this->query." WHERE ".$var." LIKE ? LIMIT 5" ;
    return $this  ; 
}
   
    // execution des requetes 

    public function  execute($value){
        // TESTE SI L'INSERTION EXISTE
        if(strpos($this->query,"INSERT")>-1){
               if($value!=null){
                $req = $this->db()->prepare($this->query) ;
                $req->execute($value) ;
               }else {
                echo 'Veuillez entrer des valeurs' ;
               }
        }
        else if (strpos($this->query,"SELECT")>-1){
            // rehef mi interroger ohatra where 
                 if(strpos($this->query,"?")>-1){
                    $res=$this->db()->prepare($this->query) ;
                    $res->execute($value) ;
                    return $res->fetchAll(PDO::FETCH_OBJ);
                 }
                 else{
                        $res = $this->db()->query($this->query) ;
                 }

                 return $res->fetchAll(PDO::FETCH_OBJ) ;

        } else if(strpos($this->query,"DELETE")>-1){
              
            // rehef mi interroger ohatra where 
            if(strpos($this->query,"?")>-1){
                $res=$this->db()->prepare($this->query) ;
                $res->execute($value) ;
             }
             else{
                    echo "verifier les champs qui vont etre supprimer !" ;
             }



        }

        else if(strpos($this->query,"UPDATE")>-1){
              
            // rehef mi interroger ohatra where 
            if(strpos($this->query,"?")>-1){
                $res=$this->db()->prepare($this->query) ;
                $res->execute($value) ;
             }
             else{
                    echo "verifier les champs qui vont etre modifier!" ;
             }



        }
    }


}

Database::init("localhost", "GestionDesProduits" ,"root" , " ") ;

// $db = new Database() ;
// $res = $db->select("personne")
//           ->execute(array(null)) ;

//           var_dump($res);



?>