<?php include("header_transactions.php"); ?>

<body>  
    <?php 
            
            $ligne = $pdo->query('SELECT * FROM TRANSACTIONS WHERE ID_TRANSACTION ="'.$_GET['id'].'"');
            $donnees = $ligne->fetch();

            $var = $donnees[id_paye];
            $montant = $donnees[montant];
            
            $user = $pdo->query('SELECT Prenom, Nom FROM UTILISATEURS WHERE ID ="'.$var.'"');
            $name = $user->fetch();

            $prenom = $name[0];
            $nom = $name[1];
            
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
                <h2 class="display-6 text-center">Supprimer une transaction :</h2>
            </div>
        </div>
    
        <div class="row">
            <div class="col">
                <form method="post" action="traitement_tr.php">
                    <p>
                        <input type="hidden" name="type" value="3" />
                        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?> />
                        <input type="hidden" name="message" value="Suppression" />
                       
                        <div class="jumbotron text-center">
                            <p class="lead text-muted"> Vous allez supprimer la transaction avec <?php echo $prenom . " " . $nom; ?> d'un montant de <?php echo $montant/100 . " euros"; ?></p>
                        </div>
                        
                    
                    <br />
                    <br />

                  
                    <div class="mx-auto" style="width: 200px;">
                        <input type="submit" value="Valider" />
                    </div>

                    </p>
                </form>
            </div>
        </div>
    
    </div> 


</body>