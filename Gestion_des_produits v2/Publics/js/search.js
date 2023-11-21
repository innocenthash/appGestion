// $(document).ready(function(){
//    AfficheSearch();
   
//         $('#search').keyup(function(){
//          $('#p').css({"display":"none"}) ;
//          $('#d').css({"display":"block"}) ;
//             $('#table_search').html(" ") ;
//             var search = $(this).val();
//             // $(document.body).on('click','#search-btn',function(){
               
//             if(search!=0) {
//                $.ajax({
//                   url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/Search" ,
//                   type:"post" ,
//                   data:{"search":search} ,
//                   success:function(data){
                 
//                      if(data.trim()=='success'){
                  
//                        AfficheSearch();
//                        $('#not-found').css({"display":"none"}) ;
//                      }else if(data.trim()=='false'){
//                        $('#not-found').css({"display":"block"}) ;
//                      }
//                   } ,
//                   error:function(){
//                      alert('erreur de connexion !') ;
//                   }
         
//         })
//             } else{
//                $('#p').css({"display":"block"}) ;
//                $('#d').css({"display":"none"}) ;
//             }
    

//    //  })

// })


// })

// function AfficheSearch(){
//     $.ajax({
//         url:"http://localhost/Gestion_des_produits/Controllers_Register_Produits/SearchAffiche",
//        type:'post',
//        dataType:'json',
//        success:function(data){
//          // format annee/mois/jour
//         let date = new Date().toISOString().slice(0,10);
//           var statut='' ;
//           var div = "" ;
//           for(var i=0 ; i<data.length;i++){
           
//             var date_s =  data[i].date_s ;
//             if(date==date_s||date_s<date ){ 
//                statut = '<span class=""><i class="fas fa-times-circle h4 text-danger mx-1"></i></span>' ;
//             } else{
//                statut  =  '<i class="fas fa-check-circle h4 text-success mx-1"></i>' ;
//             }
            

//              div = div + '<tr><td><img src="../Upload/'+data[i].image+'" class="img-fluid rounded" width="100" height="80"></td><td>'+data[i].nom_produit+'</td><td>'+data[i].date_e+'</td><td>'+data[i].date_s+'</td><td>'+data[i].nom_fournisseur+'</td><td><a  href="#" class="supprimer" id="'+ data[i].id_info +'"><i class="fas fa-trash-alt text-danger h4"></i></a></td><td><a  href="#"  class="editer mx-3" data-nomp="'+ data[i].nom_produit +'" data-nomf="'+ data[i].nom_fournisseur +'" data-date_e="'+ data[i].date_e +'" data-date_s="'+ data[i].date_s +'" data-image="'+ data[i].image +'" data-id="'+ data[i].id_info +'" data-toggle="modal" data-target="#modal_accueil"><i class="fas fa-edit text-warning h4"></i></a></td><td><a  href="#"  class="voir" data-id="'+ data[i].id_info +'" data-toggle="modal" data-target="#modal_voir"><i class="fas fa-plus-circle text-light h4"></i></a></td><td><span>'+data[i].interval_temps+'</span></td><td><span>'+statut+'</span></td></td></tr>' ;
//           }
//           $('#table_search').html(div) ;
 
//        }
//     })
//  }