$(document).ready(function(){
    $("#connection").click(function(){
      
        if($("#email-connect").val()!="" && $("#pass-connect").val()!="" ){
           $.ajax({
              url:"http://localhost/Gestion_des_produits/ControllersConnexionUtilisateur/SeConnecter",
              type:"post" ,
              data:{"email":$("#email-connect").val(),"pass-connect":$("#pass-connect").val()} ,
              success:function(data){
               // location.href="http://localhost/Gestion_des_produits/ControllersAccueil/Accueil" ;
                   if(data.trim()=="success"){
                 
                  location.href="http://localhost/Gestion_des_produits/ControllersAccueil/Accueil" ;
                 
                     
                   }else if(data.trim()=="email_incorrect"){
                    $("#co-email").show(500).hide(5000) ;
                 } else if(data.trim()=="pass_incorrect"){
                
                    $("#co-pass").show(500).hide(5000) ;
                 } else if(data.trim()=="no-confirme"){
                  $("#co-emailc").show(500).hide(5000) ;
               } 
              } ,
              error:function(){
                  $(".alert").text("error de connexion au serveur !") ;
              }
           })
  
           
          
         } 
         else{
          $('form input').css("border" , "2px solid red") ;
          $("#alert-connect").show(500).hide(5000) ;
          $('#email-connect').keyup(function(){
            $('form input').css("border" , "2px solid #e9ecef")  ;
        })
         }
        
      })
  //  ********************************** //********************************* */
  
     
 }) ;
 
 