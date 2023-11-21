<!-- nav bar debut  -->
<header class="navbar navbar-expand-md nare fixed-top navbar-light" id="navbar">
  <div class="d-flex flex-row ">
    <div class="d-none d-sm-block">
      <a href="http://" class="navbar-brand">
        <?php ControllersPublics::getImage(array('E-COLLECTE.png')); ?>
        <span class="navbar-text text-white " style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">GrosSisteKo</span>
      </a>

    </div>
    <!-- hamburger debut -->
    <div class="d-flex flex-row">
      <button class="navbar-toggler  bg-light" data-toggle="collapse" data-target="#navbar_contenue">
        <span class="navbar-toggler-icon"></span>

        </button>
        <span class="navbar-text d-block d-sm-none text-light ml-2 h6 " style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;font-weight:bold">GrosSiste|Ko</span>
     
      
    </div>
    <!-- hanburger fin -->

  </div>
  <!-- contenue debut -->
  <div class="collapse navbar-collapse" id="navbar_contenue">
    <nav class="ml-auto ">
      <ul class="navbar-nav ">
        <li class="nav-item ">
          <a class="nav-link" id="nav-link text-white " href="<?php echo BASE_URL . 'ControllersAccueil/menu' ?>">Menu</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  text-white" id="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link text-white" id="nav-link" >Apropos</a>
        </li>
        <?php
        if (isset($_SESSION['email'])) {

        ?>
          <li class="nav-item">
            <a class="nav-link text-white" id="nav-link text-white" href="<?php echo BASE_URL . 'AffichageMembre/AfficheTousLesUtilisateur' ?>">Membres</a>
          </li>
        <?php
        }

        ?>
        <?php
        if (isset($_SESSION['email'])) {

        ?>
          
          <li class="nav-item ">
            <a class="nav-link text-white" id="nav-link" href="" data-toggle="modal" data-target="#moncompte"> Comptes</a>
          </li>
        <?php
        }

        ?>
        <?php
        if (!isset($_SESSION['email'])) {

        ?>
          <li class="nav-item ">
            <a class="nav-link text-white " id="nav-link" href="<?php echo BASE_URL . 'ControllersViewsInscription' ?> ">Connexion</a>
          </li>

        <?php
        }

        ?>

        <?php
        if (isset($_SESSION['email'])) {
        ?>
          <li class="nav-item d-block d-sm-none ">
            <div class="input-group">
              <input type="search" placeholder="Rechercher" class="form-control">
              <div class="input-group-append">
                <button class="btn btn-light">
                  <span class="fas fa-search">

                  </span>
                </button>
              </div>
            </div>
          </li>
        <?php
        }

        ?>



      </ul>
    </nav>
  </div>
  <!-- contenue fin -->
</header>