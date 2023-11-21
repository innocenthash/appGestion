<!-- The Modal -->
<div class="modal fade" id="modal_accueil">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
            <div class="d-flex justify-content-center my-1" id="gauche_modal">
               <form class="mt-5" id="accueil_modal">
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-cubes"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="nom produit" name="produit_mj" id="produit_mj">
                     </div>

                  </div>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="nom fourniseur" name="fournisseur_mj" id="fournisseur_mj">
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="input-group">
                     <label class="text-light">Date de fabrication |</label>
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" class="form-control" placeholder="date d'entré" name="date_e_mj" id="date_e_mj">
                     </div>

                  </div>
                <input type="hidden" id="id_mj" name="id_mj">
                  <div class="form-group">
                     <div class="input-group">
                     <label class="text-light">Date  de l'expiration  |</label>
                        <div class="input-group-prepend">
                           <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                        </div>
                        <input type="date" class="form-control" placeholder="date d'expiration" name="date_s_mj" id="date_s_mj">
                     </div>
                  </div>
                  <div class="form-group">

                     <input type="file" class="form-control" placeholder="image" name="image_mj" id="image_mj">
                  </div>

                  <button type="submit" class="btn form-control register_mod "><span class="text_reg_mod ">Modifier<i class="mx-2 fas fa-plus-square"></i></span></button>
               </form>

            </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>