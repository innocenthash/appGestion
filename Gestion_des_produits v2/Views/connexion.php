















<!DOCTYPE html>
<html lang="en">
<?php     ControllersViews::getTemplateParts("head.php") ;?>
<body>
<?php     ControllersViews::getTemplateParts("navbar.php") ;?>
    <h1></h1>

<div class="container-fluid" style="margin-top:120px" >
  <!-- debut row1 -->
<div class="row"> 
  <!-- debut col1 -->
   <div class="col-12 col-md-6  d-flex align-items-center justify-content-center bg-suc">
    <div class="w-50 h-20 ml-5 d-none d-md-block ">
    <?php ControllersPublics::getImage(array('animal-2024095.png')) ;?>
    </div>
   </div>
   <div class="col-12 col-md-6 mt-3 d-flex align-items-center justify-content-center">
   <form  method="post" class="btc" style="width: 500px;">
    <div class="d-flex justify-content-center d-block d-md-none mt-2">
    <?php ControllersPublics::getImageConnect(array('animal-2024095.png')) ;?>
    </div>
    <p class="h3  text-center connecte_con">Connectez-vous</p> <hr>
   <!-- <img class="mb-2" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
   
<div class="form-group btc">
    <label >Email:</label>
    <input type="email"  id="email" placeholder="votre adresse email" class="form-control" name="email" value='<?php
    if(isset($_COOKIE['email'])){
     echo $_COOKIE['email'];
   }
    ?>' required>
    <i class="fas fa-envelope fa-fw fa-lg text-muted remail"></i>
  </div>

  

  <div class="form-group btc">
    <label >Password:</label>
    <input type="password"  id="mdp" name="mdp" placeholder="votre mot de pass" class="form-control" value=
    "<?php
    if(isset($_COOKIE['mdp'])){
     echo $_COOKIE['mdp'];
   }
    ?>" required>
     <i class="fas fa-key fa-fw fa-lg text-muted remail" aria-hidden="true"></i>
  </div>

  <div id="id">
    
  </div>
  <div class="form-group form-check mb-2">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox" id="sesouvenir"  value='tojo'<?php if(isset($_COOKIE['email']))
      {echo 'checked="checked"';} else{ echo '';}?> name='sesouvenir'> se souvenir de moi
    </label>
   
    
  </div>

  <!-- <button type="submit" id="connection"  class="btn btn-primary"  name="connection">Se connecter</button>  -->
  <span  class="btn btn-lg btn-primary btn-block btcon" id="connection" name="connection">Se connecter <i class="fas fa-sign-in ml-2"></i></span>
   <a class="btn btn-lg btn-info btn-block btins"  href="<?php echo BASE_URL.'LienConnexion/ReturnInscription'?>" id="sinscris">S'inscrire <i class="fas fa-arrow-circle-right ml-3"></i></a>

   

  <div class="form-group">
    <a class="btn btn-lg btn-danger btn-block btmdp mt-2" href="<?php echo BASE_URL.'LienConnexion/MotDePassOublie' ?>" >Mot de pass oublié <i class="fas fa-arrow-circle-right ml-1"></i>  </a>
  </div>

  <div class="alert alert-danger" id="alert">veiullez remplir tous les champs !</div>
  <p class="mt-2 mb-2 text-center text-muted">&copy; 2022-2027</p>
</form>

   </div>

   <!-- fin col1 -->
</div>
<!-- fin row1 -->
</div>

    <?php ControllersPublics::getJs(array("jquery.js","jquery.min.js","connexion.js","bootstrap.js","bootstrap.min.js","all.js","all.min.js","AffichageMembre.js","bootstrap.bundle.min.js")) ;?>
</body>




</html>



