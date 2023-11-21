<!DOCTYPE html>
<html lang="en">
<?php ControllersViews::getTemplateParts("head.php"); ?>
<body class="load" onload="myFunction()" style="margin:0 ;">
    <div id="loader"></div>
    <div id="myDiv" class="animate-bottom">
    <h2>Tada !</h2>
    <p>bonjour les amies !</p>
    </div>
    
    <?php ControllersPublics::getJs(array("jquery.js", "jquery.min.js", "bootstrap.js", "bootstrap.min.js", "all.js", "all.min.js", "sweetalert2.all.min.js","accueil_principale.js","loading.js")); ?>   
</body>
</html>