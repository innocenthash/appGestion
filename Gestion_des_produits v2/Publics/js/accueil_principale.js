$(document).ready(function(){
    AfficheLesProduits() ;
    AfficheImagesGrand();
    AfficheSearch();
$(document.body).on('submit',"#accueil",function(e){
    e.preventDefault() ;
 if($('#produit').val()!="" && $('#fournisseur').val()!="" && $('#date_e').val()!="" && $('#date_s').val()!=""){
    $.ajax({
        url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/Register_Produits",
        type:"post" ,
        data:new FormData(this),
        enctype:'multipart/form-data' ,
       
        contentType:false ,
        cache:false,
        processData:false ,
        success:function(data){
            AfficheLesProduits() ;
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
              $("#accueil")[0].reset() ;

              
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

//  supprimer les produits perimé debut

$(document.body).on('click','.supprimer',function(){
   
    
    
   var that = $(this) ;
   var id_produits = that.attr('id') ;

   Swal.fire({
    title: 'Vous etes sur ?',
    text: "Le choix est irreversible !",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#018ac0',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            url:'http://localhost/Gestion_des_produits/Controllers_Register_Produits/SuppressionProduits' ,
            type:'post',
             
            data:{'id_produits':id_produits} ,
           
            success:function(data){
               AfficheSearch();
                AfficheLesProduits();
              if(data.trim()=='success'){
        
                 
                
              } 
               
            },
            error:function(){
               alert('nous avons rencontrer une erreur dans la base de donné !')
            }
           })
      Swal.fire(
        'supprimer!',
        'Les produits a été bien supprimer.',
        'success'
      )
    }

    
  })
   
 })


// fin

// mise a jour debut

$(document.body).on('click' , '.editer',function(){

    var that = $(this) ;
    var pr = that.attr('data-nomp') ;
    var fourn = that.attr('data-nomf') ;
    var id = that.attr('data-id') ;
    var date_e = that.attr('data-date_e') ;
    var date_s = that.attr('data-date_s') ;
    var image = that.attr('data-image') ;
    $('#id_mj').val(id) ;
    $('#produit_mj').val(pr) ;
    $('#fournisseur_mj').val(fourn) ;
    $('#date_e_mj').val(date_e) ;
    $('#date_s_mj').val(date_s) ;
    $('#image_mj').val(image) ;
   
}) ;

$(document.body).on('submit' , '#accueil_modal',function(e){
    e.preventDefault() ;
    
$.ajax({
    url:'http://localhost/Gestion_des_produits/Controllers_Register_Produits/mise_a_jour' ,
    type:"post" ,
    data:new FormData(this),
    enctype:'multipart/form-data' ,
    contentType:false ,
    cache:false,
    processData:false ,
 success:function(data){
    AfficheLesProduits() ;
    if(data.trim()=='success'){
      
          Swal.fire({
             position: 'top',
             customClass:'swall1' ,
             icon: 'success',
             title: 'Success',
             showConfirmButton: false,
             timer: 1500
           })
           
         
          // apres suppression on affiche tous ce qui est dans bd
    }else{
        Swal.fire({
            position: 'top',
            customClass:'swall1' ,
            icon: 'success',
            title: 'Success',
            showConfirmButton: false,
            timer: 1500
          })
          
    }
 } ,
 error:function(){
    alert('erreur de connexion !') ;
 }

})



   })
// fin

//  voir en grand l'image 
$(document.body).on('click','.voir',function(){
   AfficheImagesGrand() ;
             var that = $(this) ;
            var id_info= that.attr('data-id') ;

            $.ajax({
               url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/SelectImageProduits" ,
               type:"post" ,
               data:{"id_info":id_info} ,
               success:function(data){
                  AfficheImagesGrand();
                  if(data.trim()=='success'){
                     
                  }else{
                     alert('erreur lors de la suppression !') ;
                  }
               } ,
               error:function(){
                  alert('erreur de connexion !') ;
               }
      
           
          }) ;
           

           
            
})
   // fin

   // debut cherche

  
   
        $('#search').keyup(function(){
         $('#p').css({"display":"none"}) ;
         $('#d').css({"display":"block"}) ;
            $('#table_search').html(" ") ;
            var search = $(this).val();
            // $(document.body).on('click','#search-btn',function(){
               
            if(search!=0) {
               $.ajax({
                  url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/Search" ,
                  type:"post" ,
                  data:{"search":search} ,
                  success:function(data){
                 
                     if(data.trim()=='success'){
                  
                       AfficheSearch();
                       $('#not-found').css({"display":"none"}) ;
                     }else if(data.trim()=='false'){
                       $('#not-found').css({"display":"block"}) ;
                     }
                  } ,
                  error:function(){
                     alert('erreur de connexion !') ;
                  }
         
        })
            } else{
               $('#p').css({"display":"block"}) ;
               $('#d').css({"display":"none"}) ;
            }
    

   //  })

})

// fin


})

// afficher les produit debut


function AfficheLesProduits(){
    $.ajax({
        url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/AfficheProduits",
       type:'post',
       dataType:'json',
       success:function(data){
         // format annee/mois/jour
        let date = new Date().toISOString().slice(0,10);
          var statut='' ;
          var div = "" ;
          for(var i=0 ; i<data.length;i++){
            var date_s =  data[i].date_s ;
            var jour = data[i].interval_temps ;
            // rehefa date aujourd'hui on decrement
            if(date){
                  jour = jour-1 ;   
            }
           
            if(jour<=-1){
               jour = '<span class="">produit perimé</span>' ;
            }
            if(date==date_s||date_s<date ){ 
               statut = '<span class=""><i class="fas fa-times-circle h4 text-danger mx-1"></i></span>' ;
            } else{
               statut  =  '<i class="fas fa-check-circle h4 text-success mx-1"></i>' ;
            }
            

             div = div + '<tr><td><img src="../Upload/'+data[i].image+'" class="img-fluid rounded" style="width:200px; height:100%"></td><td>'+data[i].nom_produit+'</td><td>'+data[i].date_e+'</td><td>'+data[i].date_s+'</td><td>'+data[i].nom_fournisseur+'</td><td><a  href="#" class="supprimer" id="'+ data[i].id_info +'"><i class="fas fa-trash-alt text-danger h4"></i></a></td><td><a  href="#"  class="editer mx-3" data-nomp="'+ data[i].nom_produit +'" data-nomf="'+ data[i].nom_fournisseur +'" data-date_e="'+ data[i].date_e +'" data-date_s="'+ data[i].date_s +'" data-image="'+ data[i].image +'" data-id="'+ data[i].id_info +'" data-toggle="modal" data-target="#modal_accueil"><i class="fas fa-edit text-warning h4"></i></a></td><td><a  href="#"  class="voir" data-id="'+ data[i].id_info +'" data-toggle="modal" data-target="#modal_voir"><i class="fas fa-plus-circle text-light h4"></i></a></td><td><span>'+jour+'</span></td><td><span>'+statut+'</span></td></td></tr>' ;
          }
          $('#table_accueil').html(div) ;
 
       }
    })
 }

// fin

// affiche en grand l'image 

function AfficheImagesGrand(){

   $.ajax({
      url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/SelectImageProduitsAffiche" ,
     type:'post',
     dataType:'json',
     success:function(data){
       // format annee/mois/jour
      // let date = new Date().toISOString().slice(0,10);
      //   var statut='' ;
         var div = "" ;
        for(var i=0 ; i<data.length;i++){
         //  var date_s =  data[i].date_s ;
         //  if(date==date_s||date_s<date ){ 
         //     statut = '<i class="fas fa-times-circle h4 text-danger mx-1"></i>' ;
         //  } else{
         //     statut  =  '<i class="fas fa-check-circle h4 text-success mx-1"></i>' ;
         //  }
          

           div = div + '<tr><td><img src="../Upload/'+data[i].image+'" class="img-fluid rounded" width="100%" height="80%">' ;
        }
        $('#plus_img').html(div) ;

     }
  })
}

// fin

// affiche search 

function AfficheSearch(){
   $.ajax({
       url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/SearchAffiche",
      type:'post',
      dataType:'json',
      success:function(data){
        // format annee/mois/jour
       let date = new Date().toISOString().slice(0,10);
         var statut='' ;
         var div = "" ;
         for(var i=0 ; i<data.length;i++){
          
           var date_s =  data[i].date_s ;
           if(date==date_s||date_s<date ){ 
              statut = '<span class=""><i class="fas fa-times-circle h4 text-danger mx-1"></i></span>' ;
           } else{
              statut  =  '<i class="fas fa-check-circle h4 text-success mx-1"></i>' ;
           }
           

            div = div + '<tr><td><img src="../Upload/'+data[i].image+'" class="img-fluid rounded" width="100" height="80"></td><td>'+data[i].nom_produit+'</td><td>'+data[i].date_e+'</td><td>'+data[i].date_s+'</td><td>'+data[i].nom_fournisseur+'</td><td><a  href="#" class="supprimer" id="'+ data[i].id_info +'"><i class="fas fa-trash-alt text-danger h4"></i></a></td><td><a  href="#"  class="editer mx-3" data-nomp="'+ data[i].nom_produit +'" data-nomf="'+ data[i].nom_fournisseur +'" data-date_e="'+ data[i].date_e +'" data-date_s="'+ data[i].date_s +'" data-image="'+ data[i].image +'" data-id="'+ data[i].id_info +'" data-toggle="modal" data-target="#modal_accueil"><i class="fas fa-edit text-warning h4"></i></a></td><td><a  href="#"  class="voir" data-id="'+ data[i].id_info +'" data-toggle="modal" data-target="#modal_voir"><i class="fas fa-plus-circle text-light h4"></i></a></td><td><span>'+data[i].interval_temps+'</span></td><td><span>'+statut+'</span></td></td></tr>' ;
         }
         $('#table_search').html(div) ;

      }
   })
}


// fin search 