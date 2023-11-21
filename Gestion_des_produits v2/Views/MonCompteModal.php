<div class="row">


<div class="modal fade col-12 col-md-12  "  id="moncompte">
    <div class="modal-dialog modal-sm">
      <div class="modal-content bg-succes">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title text-center text-muted mx-3" style="font-weight:bolder ;">Mon Compte</h4>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <!-- formulaire -->
         <ul class="navbar-nav ">
         
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL.'AffichageMembre/AfficheMonProfilMoi' ?>"><i class="fas fa-user mx-2 text-muted" style="color:black ;"></i><span style="color:black" class="text-muted"> Mon Profil</span></a> 
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL.'AffichageMembre/EditMonProfil' ?>"><i class="fas fa-edit mx-2 text-muted" style="color:black ;"></i><span style="color:black" class="text-muted">Edite Mon Profil</span> </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo BASE_URL.'AffichageMembre/AfficheMesPublications' ?>"><i class="fas fa-image mx-2 text-muted" style="color:black ;"></i><span style="color:black" class="text-muted">Publications</span> </a>
    </li>
    </li>
      <li class="nav-item ">
      <a class="nav-link " href="<?php echo BASE_URL.'ControllersConnexionUtilisateur/Deconnexion' ?> "><i class="fas fa-sign-out mx-2 " style="color:red ;"></i> <span style="color:red"class=""> Se deconnecter</span></a>
    </li>
    </ul>
        
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button> -->
        </div>
        
      </div>
    </div>
  </div>
</div>