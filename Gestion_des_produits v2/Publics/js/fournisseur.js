$(document).ready(function(){
    AfficheLesFournisseurs()
    $(document.body).on('submit',"#fournisseur",function(e){
        e.preventDefault() ;
     if($('#produit_nom').val()!="" && $('#fournisseur_nom').val()!="" && $('#fournisseur_email').val()!="" && $('#date_l').val()!="" && $('#date_p').val()!=""){
        $.ajax({
            url:"http://localhost/Gestion_des_produits/Controllers_Register_Fournisseur/Register_Fournisseur",
            type:"post" ,
            data:new FormData(this),
            enctype:'multipart/form-data' ,
           
            contentType:false ,
            cache:false,
            processData:false ,
            success:function(data){
                AfficheLesFournisseurs()
                 if(data.trim()=="success"){
                   
                   Swal.fire({
                      position: 'center',
                      customClass:'swall1' ,
                      icon: 'success',
                      title: 'Success',
                      showConfirmButton: false,
                      timer: 1500
                    })
                    
    
                    // on reinitialise la formulaire
                  $("#fournisseur")[0].reset() ;
    
                  
                 }
            } ,
            error:function(){
                $(".alert").text("error de connexion au serveur !") ;
            }
         })
     } else {
        alert('champs vide !') ;
     }
    })

    //  voir en grand le fournisseur

    $(document.body).on('click','.voir_fourn',function(){
       
      
                  var that = $(this) ;
                 var id_fourn= that.attr('data-id') ;
     
                 $.ajax({
                    url:"http://localhost/Gestion_des_produits/Controllers_Register_fournisseur/SelectImageFournisseur" ,
                    type:"post" ,
                    data:{"id_fourn":id_fourn} ,
                    success:function(data){
                       AfficheImagesGrand();
                       if(data.trim()=='success'){
                          
                       }else{
                          alert('erreur ') ;
                       }
                    } ,
                    error:function(){
                       alert('erreur de connexion !') ;
                    }
           
                
               }) ;
                
     
                
                 
     })
    // fin
    // suppression apres payement
    $(document.body).on("click", "#suppr_fourn", function () {
      var that = $(this);
      var id_fourn = that.attr("data-id");

      Swal.fire({
        title: "Vous etes sur ?",
        text: "Le choix est irreversible !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#018ac0",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            url: "http://localhost/Gestion_des_produits/Controllers_Register_fournisseur/Supprime_Fournisseur",
            type: "post",
            data: { id_fourn: id_fourn },
            success: function (data) {
              AfficheImagesGrand();
              AfficheLesFournisseurs()
              if (data.trim() == "success") {
              } else {
                alert("erreur ");
              }
            },
            error: function () {
              alert("erreur de connexion !");
            },
          });
          Swal.fire(
            "supprimer!",
            "Les produits a été bien supprimer.",
            "success"
          );
        }
      });


    });
// fin
// payement

$(document.body).on('click','#payement',function(){
  
    var that = $(this) ;
   var id_fourn= that.attr('data-id') ;

   Swal.fire({
    title: "Payement",
    text: "Vous avez déjà payer le fournisseur ?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#03989e",
    cancelButtonColor: "#d33",
    confirmButtonText: "Oui, Confirmer",
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url:"http://localhost/Gestion_des_produits/Controllers_Register_fournisseur/Payement_Fournisseur" ,
            type:"post" ,
            data:{"id_fourn":id_fourn} ,
            success:function(data){
               AfficheImagesGrand();
              
               if(data.trim()=='success'){
                 
                
                 
               }else{
                  alert('erreur ') ;
               }
            } ,
            error:function(){
               alert('erreur de connexion !') ;
            }
      
        
       }) ;
        
      Swal.fire(
        "Bravo",
        "Payement confirmer !",
        "success"
      );
    }
  });


  

  
   
})

// fin 











})


function AfficheLesFournisseurs(){
    $.ajax({
        url:"http://localhost/Gestion_des_produits/Controllers_Register_Fournisseur/Affiche_Fournisseur",
       type:'post',
       dataType:'json',
       success:function(data){
         // format annee/mois/jour
        let date = new Date().toISOString().slice(0,10);
          var statut='' ;
          var div = "" ;
          var notification = "" ;
          btn = "" ;
          for(var i=0 ; i<data.length;i++){
            var date_s =  data[i].date_p ;
           
            var jour = data[i].temps_rest ;
            // rehefa date aujourd'hui on decrement
            if(date){
                  jour = jour-1 ;  
                  j=" jour"  ;
            }
           
            if(jour<0){
               jour = '<span class="text-danger">Jour de payement !</span>' ;
               j="" ;

            }
            if(date==date_s||date_s<date ){ 
            //    statut = '<span class=""><i class="fas fa-times-circle h4 text-danger mx-1"></i></span>' ;
               notification =  '<span  class="alert alert-primary d-flex justify-content-center align-items-center" ><i class="fas  fa-bell h4 text-danger mx-1 "></i></span>'  ;
            } else{
            //    statut  =  '<i class="fas fa-check-circle h4 text-success mx-1"></i>' ;
               notification =  '<span  class="alert alert-primary d-flex justify-content-center align-items-center" ><i class="fas fa-bell-slash h4 text-info mx-1"></i></span>'  ;
            }
            
            if(date!=date_s || date_s>date){
        //   btn = '<button class="btn btn-primary val">Validé le payement</button>' ;
               
            } else {
                btn = "" ;
            }
{/* <img src="../Upload/'+data[i].fourn_image+'" class="img-fluid rounded" width=100% > */}

             div = div + '<tr><td><div class="membres-corps_admin rounded"><img src="../Upload/'+data[i].fourn_image+'" class="img-fluid rounded-circle" id="img_fourn" style="width:150px;height:150px" ></div></div></td><td>'+data[i].fourn_name+'</td><td>'+data[i].fourn_email+'</td><td>'+data[i].product_name+'</td><td>'+data[i].date_l+'</td><td>'+data[i].date_p+'</td><td>'+data[i].temps_rest+' jour'+'</td><td><a>'+btn+'</a><a  href="#"  class="voir_fourn" data-id="'+ data[i].id_fourn +'" data-toggle="modal" data-target="#modal_fourn"><i class="fas fa-plus-circle text-secondary h4"></i></a></td><td><span>'+jour+j+'</span></td><td><span>'+notification+'</span></td></td></tr>' ;
          }
          $('#table_fourn').html(div) ;
 
       }
    })
 }
// affiche en grand les fournisseur
 function AfficheImagesGrand(){

    $.ajax({
       url:"http://localhost/Gestion_des_produits/Controllers_Register_Fournisseur/SelectImageFournisseurAffiche" ,
      type:'post',
      dataType:'json',
      success:function(data){
        // format annee/mois/jour
       // let date = new Date().toISOString().slice(0,10);
       //   var statut='' ;
          var div = "" ;
          let date = new Date().toISOString().slice(0,10);
         for(var i=0 ; i<data.length;i++){
            var date_s =  data[i].date_p ;
            var payement= data[i].payement
            var pay = "" ;
            var alert = "" ;

            if(date==date_s||date_s<date ){ 
               alert='<div class="alert alert-danger text-secondary ">Vous n\'avez pas encore payer Mr '+data[i].fourn_name+'</div>' ;
               } else{
                  alert='<div class="alert alert-primary text-secondary ">Le jour de payement pour Mm||Mr '+data[i].fourn_name+' n\'est pas encore achevé</div>' ;
               }
               
           
            if(payement == 1){
                pay = "<span id='payement' data-id='"+data[i].id_fourn+"' class='h3 ml-5 btn btn-success'><i class='fas fa-check-square'></i></span>" ;
                alert = ' <div class="alert alert-success mt-0 "> Vous avez déjà payer Mr '+data[i].fourn_name+' !</div>'
            } else {
                pay = "<span id='payement' data-id='"+data[i].id_fourn+"' class='h3 ml-5 btn btn-primary'><i class='fas fa-check-square'></i></span>" ;
            // alert='<div class="alert alert-danger text-secondary ">Vous n\'avez pas encore payer Mr '+data[i].fourn_name+'</div>' ;
            }
          //  var date_s =  data[i].date_s ;
          //  if(date==date_s||date_s<date ){ 
          //     statut = '<i class="fas fa-times-circle h4 text-danger mx-1"></i>' ;
          //  } else{
          //     statut  =  '<i class="fas fa-check-circle h4 text-success mx-1"></i>' ;
          //  }
           
        //   <div class="alert alert-success all" style="display:none ;">Fournisseur deja paye</div>
            div = div + '<div class="d-flex mt-0 flex-column justify-content-center align-items-center ">'+alert+'<img src="../Upload/'+data[i].fourn_image+'" class="img-fluid rounded mt-0" width="50%" height="50%"><div class="mt-3  d-flex justify-content-center align-items-center"><span id="suppr_fourn" data-id="'+data[i].id_fourn+'" class="h1  mr-5 btn btn-danger"><i class="fas fa-trash  "></i></span>'+pay+'</div></div>' ;
         }
         $('#plus_img_fourn').html(div) ;
 
      }
   })
 }
 
