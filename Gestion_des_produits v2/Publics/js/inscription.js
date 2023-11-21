$(document).ready(function(){
    
     $("#inscris").click(function(){
  
        if($("#pseudo").val()!="" && $("#email").val()!="" && $("#password").val()!="" && $("#confirme_password").val()!=""){
          $.ajax({
             url:"http://localhost/Gestion_des_produits/ControllersRegisterUtilisateur/Utilisateur",
             type:"post" ,
             data:{"pseudo":$("#pseudo").val(),"email":$("#email").val(),"password":$("#password").val(),"confirme_password":$("#confirme_password").val()} ,
             success:function(data){
                  if(data.trim()=='success'){
                    //  alert("membre bien enregistrer") ;
 
                     // on reinitialise la formulaire
                     $("#inscris-form")[0].reset() ;
                     $("#alert_ins").show(500).hide(10000) ;
                    // location.href="http://localhost/Gestion_Alimentaire/LienConnexion/Connection" ;
                   //   location.href="InformationUtilisateur/Information" ;
                     //
                   
                  }else if(data.trim()=='nom_existe') {
                    $("#alert_nom").show(500).hide(10000) ;
                  }else if(data.trim()=='email_existe') {
                    $("#alert_email").show(500).hide(10000) ;
                  }else if(data.trim()=='pass_existe') {
                    $("#alert_pass").show(500).hide(10000) ;
                  }else if(data.trim()=='confirme_incorrect') {
                    $("#alert_pass_confirme").show(500).hide(10000) ;
                  }
             } ,
             error:function(){
                 $(".alert").text("error de connexion au serveur !") ;
             }
          })
         
 
 
 
        }else{
         $('form input').css("border" , "2px solid red")  ;
         $("#alert").show(500).hide(5000) ;
         $('#pseudo').keyup(function(){
            $('form input').css("border" , "2px solid #e9ecef")  ;
        })
        }
     })
 });
 
 
//  function AfficheMembre(){
//     $.ajax({
//           url:'http://localhost/Gestion_Alimentaire/AffichageMembre/Membre' ,
//           type:'post' ,
//           dataType:'json',
//           success:function(data){
//               var table = "<thead><tr><th>identifiant</th><th>Nom</th><th>adresse email</th><th>Action</th></tr></thead>" ;
               
//               for(var i = 0;i < data.length ;i++){
    
//      var tab = table+'<tbody><tr><td>'+data[i].idpersonne+'</td><td>'+data[i].nom+'</td><td>'+data[i].adresse_email+'</td><td><a href="#"><i class="fas fa-edit text-success"></i></a></td><td><a href="#"><i class="fas fa-trash-alt text-muted"></i></a></td></tr></tbody>';
//               }
//           $("#tabe").html(tab);
//            }
 
 
 
//     })
//   }