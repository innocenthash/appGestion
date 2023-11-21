<!DOCTYPE html>
<html lang="en">

<?php ControllersViews::getTemplateParts("head.php"); ?>
<?php ControllersViews::getViews("FournisseurModal.php"); ?>
<body id='bg-four' class="load" onload="myFunction()" style="margin:0 ;">

<?php     ControllersViews::getTemplateParts("navbar.php") ;?>
   <div id="loader"></div>
    <div class="container-fluid animate-bottom " id="myDiv" style="margin-top:85px ;">
        <div class="row mt-5" id="accordion">
            <!--listes des fournisseurs debut -->
            <div class="col-12 col-md-3 mt-2">
                <div class="d-flex flex-column ">
                    <button class="btn btn-primary btn-1" data-toggle="collapse" data-target='#panneau2'>Control de fournisseur</button>

                    <section class="collapse border p-3" id="panneau2" data-parent="#accordion">
                         <!--  formulaire pour les fournissaire -->
           
               <div class="d-flex justify-content-center " id="gauche_four">
                  <form class="mt-5" id="fournisseur">
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                           </div>
                           <input type="text" class="form-control" placeholder="nom du fournisseur" name="fournisseur_nom" id="fournisseur_nom">
                        </div>

                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-shopping-basket"></i></span>
                           </div>
                           <input type="text" class="form-control" placeholder="nom du produit" name="produit_nom" id="produit_nom">
                        </div>

                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                           </div>
                           <input type="email" class="form-control" placeholder="son adresse email" name="fournisseur_email" id="fournisseur_email">
                        </div>
                     </div>

                     <div class="form-group">
                        <div class="input-group">
                           <label class="text-light">Date de livraison |</label>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                           </div>
                           <input type="date" class="form-control" placeholder="date d'entré" name="date_l" id="date_l">
                        </div>

                     </div>
                     <div class="form-group">
                        <div class="input-group">
                           <label class="text-light">Date de payement |</label>
                           <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                           </div>
                           <input type="date" class="form-control" placeholder="date d'expiration" name="date_p" id="date_p">
                        </div>
                     </div>
                     <div class="form-group">

                        <input type="file" class="form-control" placeholder="image_fournisseur" name="image_fournisseur" id="image_fournisseur">
                     </div>


                     <button type="submit" class="btn form-control register_fournisseur mb-3"><span class="text_four "><i class="mx-2 fas fa-plus-square"></i>Sauvegarder</span></button>
                     
                  </form>

               </div>
           
            <!-- fin -->
                    </section>

                </div>
            </div>

            <!-- fin -->
            <!-- listes des produits debut -->
            <div class="col-12 col-md-9 mt-2 ">
                <!-- <div class="d-flex flex-column "> -->
                <div class="table-responsive-xl shadow-lg bg-white  table_over_fourn " id="p" style="display:block ;height:600px">
                    <!-- <button class="btn btn-primary" data-toggle="collapse" data-target='#panneau1'>Verification</button> -->

                    <!-- <section class="collapse border p-1 table-responsive" id="panneau1" data-parent="#accordion"> -->
                        <table class="table table-borderless  table-hover" >
                            <thead class="bg-warning thead">
                                <tr>
                                    <th>Photo de profil</th>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Produits</th>
                                    <th>Date de livraison</th>
                                    <th>Date de payement</th>
                                    <th>Nombre total de jour</th>
                                    <th>Action</th>
                                    <th>Jour restant avant payement</th>
                                    <th>Etat</th>

                                </tr>
                            </thead>
                            <tbody id="table_fourn" class="text-light">

                            </tbody>
                        </table>

                    <!-- </section> -->

                  
                </div>
            </div>
            <!-- fin -->
            <!-- listes des -->
            <!-- <div class="col-12 col-md-2 mt-2">
                <div class="d-flex flex-column ">
                    <button class="btn btn-primary" data-toggle="collapse" data-target='#panneau3'>Panneau3</button>

                    <section class="collapse border p-3" id="panneau3" data-parent="#accordion">wvvs</section>

                </div>
            </div> -->
        </div>
        <div id="compte_a_rebours"></div>
    </div>

    

    <?php ControllersPublics::getJs(array("jquery.js", "jquery.min.js", "bootstrap.js", "bootstrap.min.js", "all.js", "all.min.js", "sweetalert2.all.min.js", "accueil_principale.js", "loading.js",'search.js',"fournisseur.js",'rebours.js')); ?>
</body>

</html>