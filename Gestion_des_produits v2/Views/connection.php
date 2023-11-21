<!DOCTYPE html>
<html lang="en">
<?php ControllersViews::getTemplateParts("head.php"); ?>

<body>
  <?php ControllersViews::getTemplateParts("navbar.php"); ?>




  <div class="container-fluid " style="margin-top:120px">

    <div class="row">
    <div class="col-12 d-flex align-items-center justify-content-center ">
        <div class="d-flex justify-content-center align-items-center  d-sm-none mb-2 ">
          <?php ControllersPublics::getImageScreen(array('img_inscris2.jpg')); ?>
        </div>
      </div>
      <div class="col-12">
        <div class="d-flex justify-content-center align-items-center">
          <form>
            <div id='co-pass' class="alert alert-warning">votre mot de passe est incorrect</div>
            <div id='co-emailc' class="alert alert-primary">veuillez consulter votre boite email ,<br> pour confirmer votre inscription !</div>
            <div id="co-email" class="alert alert-warning">votre adresse email n'existe pas</div>

            <div class="input-group mb-3">
              <input type="text" id="email-connect" class="form-control" placeholder="Votre email">
              <div class="input-group-append">
                <span class="input-group-text">exemple@gmail.com</span>
              </div>
            </div>

            

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input type="password" id="pass-connect" class="form-control" placeholder="">
            </div>

            <div class="form-group">
              <span class="btn  form-control text-light" id="connection">Se connecter</span>
            </div>
            <div class="form-group">
              <a  href="<?php echo BASE_URL.'ControllersViewsInscription' ?>" class="btn  form-control" id="inscris-connect">S'inscrire</a>
            </div>
            <div id="alert-connect" class="alert alert-danger">veuillez remplir tous les champs !</div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php ControllersPublics::getJs(array("jquery.js", "jquery.min.js", "bootstrap.js", "all.js", "all.min.js","connexion.js" ,"bootstrap.min.js", "bootstrap.bundle.min.js")); ?>
</body>

</html>