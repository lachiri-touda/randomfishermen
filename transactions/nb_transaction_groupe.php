<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   
?>

<?php include("connexion.php"); ?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Transactions</title>
</head>

<body>

<div class="container">
    <div class="row">
        <div class="col">
            <?php include("navbar.php"); ?>
        </div>
    </div>
    
    <br />

    <div class="row">
        <div class="col">
        <h5 class="display-6 text-center">Combien de bénéficiaire ?</h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form method="post" action="formulaire_groupe.php">
                <p>
                <div class="input-group mb-3">
                    <input type="text" name="beneficiaire" class="form-control" id="beneficiaire" placeholder="Combien ?" aria-label="#" aria-describedby="basic-addon1">
                </div>

                <br />
                
                <div class="mx-auto" style="width: 200px;">
                    <input type="submit" value="Valider" />
                </div>


</body>