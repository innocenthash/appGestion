<!DOCTYPE html>
<html lang="en">
<?php ControllersViews::getTemplateParts("head.php"); ?>
<body>
<?php ControllersViews::getTemplateParts("navbar.php"); ?>
  <div class="container-fluid" style="margin-top:200px ;">
    <div class="row">
    <p>menu pour les informations !</p>
    </div>
  </div>
  <?php ControllersPublics::getJs(array("jquery.js", "jquery.min.js", "bootstrap.js", "all.js", "all.min.js","bootstrap.min.js", "bootstrap.bundle.min.js")); ?>
</body>
</html>