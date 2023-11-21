<!DOCTYPE html>
<html lang="en">
<?php ControllersViews::getTemplateParts("head.php"); ?>

<body>
  <?php ControllersViews::getTemplateParts("navbar.php"); ?>




  <div class="container-fluid " style="margin-top:120px">

    <div class="row">

    <!-- <div class=" ml-6 d-block d-sm-none "  style='background-image:url(Upload/98181624770075_06.jpg);background-repeat: no-repeat;background-position: center ; background-size:cover ;background-position:center ; width:50px ;height:50px;border-radius:50% '>
         
        </div> -->
      <div class="col-12 d-flex justify-content-center align-items-center ">
        <div class=" d-flex justify-content-center align-items-center  d-sm-none mb-2">
          <?php ControllersPublics::getImageScreen(array('img_inscris2.jpg')); ?>
        </div>
      </div>
      <div class="col-12">
        <div class="d-flex justify-content-center align-items-center">
          <form id="inscris-form">



            <div id="alert_nom" class="alert alert-warning">votre pseudo existe déjà</div>
            <div id="alert_email" class="alert alert-warning">votre adresse email existe déjà</div>
            <div id="alert_pass" class="alert alert-warning">votre mot de pass est déjà utilisé</div>
            <div id="alert_pass_confirme" class="alert alert-warning">votre mot de pass ne pas identique</div>



            <div id="alert_ins" class="alert alert-success">Bienvenue , verifier votre boite email<br> pour confirmer l'inscription , merci !</div>
            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-user"></i></span>
                </div>
                <input type="text" id="pseudo" class="form-control" placeholder="Pseudo">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">exemple@gmail.com</span>
                </div>
                <input type="email" class="form-control" id="email" placeholder="Votre email">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" id="password" class="form-control" placeholder="Mot de passe">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-lock"></i></span>
                </div>
                <input type="password" id="confirme_password" class="form-control" placeholder="Confirme votre mot de passe">
              </div>
            </div>

            <div class="form-group">
              <span class="btn  form-control text-light" id="inscris">S'inscrire</span>
            </div>
            <div class="form-group">
              <a href="<?php echo BASE_URL . 'ControllersViewsConnection' ?>" class="btn  form-control" id="connecte">Se connecter</a>
            </div>
            <div class="form-group">
              <span class="btn  form-control text-light" id="oublie">Mot de pas oublié</span>
            </div>
            <div id="alert" class="alert alert-danger">Veuillez remplir tous les champs</div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php ControllersPublics::getJs(array("jquery.js", "jquery.min.js", "inscription.js",  "bootstrap.js", "all.js", "all.min.js", "bootstrap.min.js", "bootstrap.bundle.min.js")); ?>
</body>

</html>