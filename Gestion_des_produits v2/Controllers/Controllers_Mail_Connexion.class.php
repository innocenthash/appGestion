<?php
    // use PHPMailer\PHPMailer\Exception ;
   
    // use PHPMailer\PHPMailer\SMTP ;
    // use PHPMailer\PHPMailer\PHPMailer ;

class Controllers_Mail_Connexion {
    
    
    public static function mail_Connexion($destinataire,$token){

        $message = "Confimation de votre inscription !" ;
          
        $body='
        


        <!DOCTYPE html>      
         <html>
        <head>
         
         <title>Document</title>
         </head>
        <body>
        Afin de valider votre email merci , de cliquer sur le lien suivant
        <a href="http://localhost/Gestion_des_produits/Controllers_Update_Validation/Verification/'.$destinataire."/".$token.'">Confirmer mon inscription</a>  
        
         </body>
         </html>

        
        
        
        
        ' ;

        $headers='MIME-version: 1.0'."\r\n" ;
        $headers.="Content-type: text/html; charset=utf-8"."\r\n" ;
        $headers.='From: aiwin@gmail.com'."\r\n";
        $headers.="Reply-to: inno@gmail.com";

        
        mail($destinataire,$message,$body,$headers) ;
       


 }

}





       
        
       

?>