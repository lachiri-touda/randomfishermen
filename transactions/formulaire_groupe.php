<?php include("header_transactions.php"); ?>

<body>

<?php 
$utilisateur = $pdo->query('SELECT Prenom FROM UTILISATEURS WHERE ID ="'.$_SESSION['id'].'"'); 

$user = $utilisateur->fetch();

$nombre = $_POST['beneficiaire'];
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
        <h2 class="display-6 text-center">Nouvelle transaction de groupe :</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form method="post" action="traitement_groupe.php">
            <p>
                <div class="input-group mb-3">
                    <input class="form-control" type="text" placeholder="<?php echo $user[0]; ?>" readonly>
                    <input type="hidden" name="nombre" value="<?php echo $nombre; ?>" />
                
                </div>
                
                <br />
                
                
            <?php 
               $somme = $_POST['total']/$nombre;

                if ($_POST['repartition'] == 'on')
                {
                    for ($i = 0; $i < $nombre; $i++)
                    {
                        echo '<select name="idrecoit' . $i . '" class="custom-select">
                            <option selected>Pour qui ?</option>';
                        include("table_friends.php");
                        echo '</select>';
                    
                        echo '  <br />';
                    
                        echo '<div class="input-group mb-3">';
                        echo '<input class="form-control" value="' . $somme . '"type="text" name="montant' . $i . '" placeholder="';
                        echo "$somme";
                        echo '" readonly>';
                        echo '</div>';
                
                
                    }

                }
                
                elseif ($_POST['repartition'] != 'on') 
                {
                    for ($i = 0; $i < $nombre; $i++)
                    {
                    echo '<select name="idrecoit' . $i . '" class="custom-select">
                            <option selected>Pour qui ?</option>';
                    include("table_friends.php");
                    echo '</select>';
                    
                    echo '  <br />';
                    
                    echo '<div class="input-group mb-3">
                            <input type="text" name="montant' . $i . '" class="form-control" id="montant" placeholder="Montant" aria-label="#" aria-describedby="basic-addon1">
                          </div>';
                
                    }
                }
            ?>   
              
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