<!DOCTYPE html>
<html lang="en">
<?php ControllersViews::getTemplateParts("head.php"); ?>
<?php ControllersViews::getViews("AccueilModal.php"); ?>
<?php ControllersViews::getViews("VoirModal.php"); ?>



<body class="load" onload="myFunction()" style="margin:0 ;">
   <?php ControllersViews::getViews("VoirModal.php"); ?>
   <?php     ControllersViews::getTemplateParts("navbar.php") ;?>
   <div id="loader"></div>

   <div id="myDiv" class="animate-bottom " style="margin-top:85px ;">

     
      <!-- debut du container -->
      <div class="container-fluid ">
         <div class="row">

            <!--  debut du contenue gauche -->
            <div class="col-12  col-md-12 col-lg-3  ">
               <div class="d-flex justify-content-center -5 my-1  shadow-none  mb-4 bg-light" id="gauche">
                  <form class="mt-5" id="accueil">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                           </div>
                           <input type="text" class="form-control" placeholder="nom produit" name="produit" id="produit">
                        </div>

                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                           </div>
                           <input type="text" class="form-control" placeholder="nom fourniseur" name="fournisseur" id="fournisseur">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group">
                           <label class="text-dark">Date de fabrication |</label>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                           </div>
                           <input type="date" class="form-control" placeholder="date d'entré" name="date_e" id="date_e">
                        </div>

                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <label class="text-dark">Date de l'expiration |</label>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                           </div>
                           <input type="date" class="form-control" placeholder="date d'expiration" name="date_s" id="date_s">
                        </div>
                     </div>
                     <div class="form-group">

                        <input type="file" class="form-control" placeholder="image" name="image" id="image">
                     </div>


                     <button type="submit" class="btn form-control  register bg-warning mb-3"><span class="text_reg text-dark"><i class="mx-2 fas fa-plus-square"></i>Ajouter</span></button>
                    
                     <a href="<?php echo BASE_URL . 'ControllersAccueil/Fournisseur' ?>" class="btn form-control register bg-danger mt-1"><span class="text_reg text-light "><i class="fas fa-list   mx-1"></i>Mes fournisseur</span></a>
                  </form>

               </div>
            </div>
            <!-- fin -->
            <!-- debut du contenue centre -->
            <div class="col-12 col-md-12 col-lg-9">
               <div class="d-flex flex-column align-items-center justify-content-right centre  shadow-none p-4 mb-4 bg-light">
              
             <div class="g-title">
             <h2 class="text-center  title"><i class="fas fa-list mx-1" style="color:#387C6D;"></i>Listes de Mes Produits </h2>

             </div>
                  <!-- debut search -->
                  <div class="form-group w-75 d-none d-sm-flex align-items-right justify-content-center   mt-2  mx-2">
                     <div class="input-group  ">
                        <input type="search" id="search" placeholder="Rechercher" class="form-control px-5">
                        <div class="input-group-append">
                           <button class="btn " id="search-btn">
                              <span class="fas fa-search">

                              </span>
                           </button>
                        </div>
                     </div>
                  </div>

                  <!-- <div id="res"></div> -->
                  <!-- fin -->


                  <!-- debut contenue des produits rounded-top rounded-bottom -->


                 
                  <div class="table-responsive-xl table_over " id="p" style="display:block ;">
                     <table class="table table-borderless table-hover ">
                        <thead class="bg-warning bg-head">
                           <tr class="text-light">

                              <th>Image</th>
                              <th>Produits</th>
                              <th>Date de fabrication</th>
                              <th>Date d'expiration</th>
                              <th>Fournisseurs</th>
                              <th>Action</th>
                              <th> </th>
                              <th> </th>

                              <th>A consommer avant : </th>
                              <th>Etat</th>
                           </tr>
                        </thead>

                        <tbody id="table_accueil" class="text-light">

                        </tbody>
                     </table>



                  </div>

                  <!-- tableau de recherche -->

                  <div class="table-responsive-xl table_over" id="d" style="display: none ;">
                     <table class="table table-borderless table-hover ">
                        <thead class="bg-warning">
                           <tr>

                              <th>Image</th>
                              <th>Produits</th>
                              <th>Date de fabrication</th>
                              <th>Date d'expiration</th>
                              <th>Fournisseurs</th>
                              <th>Action</th>
                              <th> </th>
                              <th> </th>

                              <th>A consommer avant : </th>
                              <th>Etat</th>
                           </tr>
                        </thead>
                        <tbody id="table_search">

                        </tbody>



                     </table>
                    
                     <div id="not-found" style="display: none ;" class='alert alert-danger'> <strong> votre recherche </strong>ne figure pas parmis les listes des produits !</div> 
 


                  </div>

                  <!-- fin -->

               </div>
            </div>
            <!-- fin -->
            <!-- debut du contenue droite -->
            <!-- <div class="col-12 col-md-12 col-lg-3">
         <div class="d-flex justify-content-center droite">
            aaaaaaaaaa
         </div>
      </div> -->
            <!-- fin -->
         </div>
      </div>

      <!-- fin du container -->


   </div>
   <?php ControllersPublics::getJs(array("jquery.js", "jquery.min.js", "bootstrap.js", "bootstrap.min.js", "all.js", "all.min.js", "sweetalert2.all.min.js", "accueil_principale.js", "loading.js", 'search.js',"connexion.js")); ?>
</body>

</html>