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
    <?php 
    $nb = $pdo->query('SELECT COUNT(*) FROM TRANSACTIONS');
    $nombre = $nb->fetch();
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <?php include("navbar.php"); ?>
            </div>
        </div>
        
        <br />
        
        <?php 
        $date = date('Y') . '-' . date('m') . '-' . date('d');
        $res = $pdo->prepare('INSERT INTO TRANSACTIONS(`etat`, `date_ouverture`, `date_fermeture`, `montant`, `id_paye`, `id_recoit`, `commentaire`)
        VALUES(:etat, :date_ouverture, :date_fermeture, :montant, :id_paye, :id_recoit, :commentaire)');
        
        $res->execute(array(
            //'ID_TRANSACTION'=> $nombre[0]+1,
            'etat'=> 1,
            'date_ouverture'=> $date,
            'date_fermeture'=> NULL,
            'montant'=> $_POST['montant']*100,
            'id_paye'=> $_SESSION['id'],
            'id_recoit'=> $_POST['idrecoit'],
            'commentaire'=> $_POST['text']
        ));
        ?>
        <section class="jumbotron text-center">
        <div class="row">
            <div class="col">
                 <p class="text-center">Votre transactions a bien était ajouté !</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col">
                <!-- <div class="mx-auto" style="width: 200px;"> -->
                    <a href="transactions.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Retour</a>
                </div>
            </div>
        </div>
        </section>

    </div>
   
<?php echo $_POST['montant'];?>
<?php echo $_POST['idrecoit'];?>
<?php echo $_SESSION['id'];?>
<?php echo $_POST['text'];?>



</body>