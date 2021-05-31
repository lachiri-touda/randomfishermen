<?php
   session_start();
   $link = mysqli_connect("localhost", "admin", "it103", "Random_Fishermen");
   mysqli_set_charset($link, "utf8");

 /* check connection */
   if (mysqli_connect_errno()) {
       printf("Connect failed: %s\n", mysqli_connect_error());
       exit();
   }
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if (!isset($_COOKIE["id"])){
    header("location:login.php");
  }
  $ids= $_SESSION["id"];
  $uti = mysqli_query($link,"SELECT `Prenom`, `Nom`, `Date`, `Pseudo` FROM `UTILISATEURS` WHERE `ID`= '$ids' ");
  $donnees = mysqli_fetch_row($uti);


  include("solde.php");

?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Debster</title>
      <!--CSS-->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

   </head>
   <body onLoad="document.fo.login.focus()">
      <?php include("header_accueil.php");?>
      <section>
        <div class='container'> <!--The core of the page-->
          <div class="jumbotron m-5">
            <div class="row align-items-center">
              <div class="col-9">
                <h1 class="h2"><?php echo " Nom et Prénom: $donnees[0] $donnees[1]"; ?></h1>
                <p class="lead"><?php echo " Pseudo: $donnees[3] "; ?></p>
                <hr class="my-4">
                <p><?php echo " Date de naissance: $donnees[2] "; ?></p>
              </div>
              <div class="col">
                <button type="button p-4" class="btn btn-primary btn-lg active"><?php echo "solde: $euros € ";?></button>
              </div>
            </div>
          </div>
      </section>

   </body>
</html>
