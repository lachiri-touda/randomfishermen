<?php include("header_transactions.php"); ?>

<body>

<?php 
$utilisateur = $pdo->query('SELECT Prenom FROM UTILISATEURS WHERE ID ="'.$_SESSION['id'].'"'); 
$user = $utilisateur->fetch();
?>

<?php include("navbar.php"); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <?php //include("navbar.php"); ?>
        </div>
    </div>
    
    <br />

    <div class="row">
        <div class="col">
        <h2 class="display-6 text-center">Nouvelle transaction simple :</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form method="post" action="traitement_simple.php">
                <p>
                <div class="input-group mb-3">
                    <input type="text" name="montant" class="form-control" id="montant" placeholder="Montant" aria-label="#" aria-describedby="basic-addon1">
                </div>
                
                <br /> 
                
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="<?php echo $user[0]; ?>" readonly>
                </div>
                
                <br />
                
                <select name="idrecoit" class="custom-select">
                    <option selected>Pour qui ?</option>
                    <?php include("table_friends.php"); ?>
                
                </select>
                
                <br />
                <br />
                
                <div class="mb-3">
                    <textarea class="form-control" name="text" id="validationTextarea" placeholder="Notes sur la transaction"></textarea>
                    
                    <br />
                
                <div class="mx-auto" style="width: 200px;">
                    <input type="submit" value="Valider" />
                </div>

                </p>
            </form>
        </div>
    </div>

</body>