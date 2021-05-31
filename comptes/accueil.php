<?php
   session_start();
   $link = mysqli_connect("localhost", "admin", "it103", "it103");

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
        <div class='container-fluid'> <!--The core of the page-->
            <div class="row">
        <div class="col">
        <?php
        echo '<div class="h3">';
          echo ' <p class="text-left p-md-3  pl-2 ml-5 rounded">';
        echo " Nom et Prénom: $donnees[0] $donnees[1]";
        echo '</p>';
        echo '</div>';

        echo '<div class="h3">';
          echo ' <p class="text-left p-md-3  pl-2 ml-5 rounded">';
        echo " Pseudo: $donnees[3] ";
        echo '</p>';
        echo '</div>';
        
        echo '<div class="h3">';
          echo ' <p class="text-left p-md-3  pl-2 ml-5 rounded">';
        echo " Date de naissance: $donnees[2] ";
        echo '</p>';
        echo '</div>';

      ?>
      </div>
        <div class="col">
        <?php
        echo '<div class = "sm-6 p-4 m-3 border border-dark rounded bg-white">';
            echo '<p class="h4" >' ;
            echo "solde: $euros € ";
          echo '</p>';
        echo '</div>';
        ?>
       </div>
</section>

   </body>
</html>
