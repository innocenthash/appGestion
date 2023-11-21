<?php
    // use PHPMailer\PHPMailer\Exception ;
   
    // use PHPMailer\PHPMailer\SMTP ;
    // use PHPMailer\PHPMailer\PHPMailer ;

class Controllers_Mail{
    
    
    public static function php_mail($destinataire,$token){


        $message = "Confimation de votre inscription !" ;
          
        $body='
<html lang="en">
<head>
</head>
<body>
<p>Enfin de valider votre<strong> inscription</strong> veuillez cliquer sur le lien suivant</p><br>
<a href="http://localhost/Gestion_des_produits/Controllers_Update_Validation/Verification/'.$destinataire."/".$token.'">Confirmer mon inscription</a>  
</body>
</html>';

        $headers='MIME-version: 1.0'."\r\n" ;
        $headers.="Content-type: text/html; charset=utf-8"."\r\n" ;
        $headers.='From: aiwin@gmail.com'."\r\n";
        $headers.="Reply-to: inno@gmail.com";

        
        mail($destinataire,$message,$body,$headers) ;
       
        // faut teto tokon minuscule lay version V

 }

}





       
        
       

?>