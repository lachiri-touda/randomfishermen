<?php include("header_transactions.php"); ?>

<body>  
    <?php 
                //echo $_GET['id']; 
                
                $ligne = $pdo->query('SELECT * FROM TRANSACTIONS WHERE ID_TRANSACTION ="'.$_GET['id'].'"');
                $donnees = $ligne->fetch();

                //echo "$donnees[id_paye]";
                $var = $donnees[id_paye];
                $montant = $donnees[montant];
                //echo "$var";
                
                $user = $pdo->query('SELECT Prenom, Nom FROM UTILISATEURS WHERE ID ="'.$var.'"');
                $name = $user->fetch();

                $prenom = $name[0];
                $nom = $name[1];
                
                //echo "$name[0]";
                //echo "$name[1]";
            
            
    ?>
        
        
    <div class="container">
            <div class="row">
                <div class="col">
                    <?php include("navbar.php"); ?>
                </div>
            </div>
            
            <br />
            
            <div class="row">
                <div class="col">
                    <h2 class="display-6 text-center">Modifier une transaction :</h2>
                </div>
            </div>
        
            <div class="row">
                <div class="col">
                    <form method="post" action="traitement_tr.php">
                        <p>
                        <input type="hidden" name="type" value="2" />
                        <input type="hidden" name="id" value=<?php echo $_GET['id']; ?> />
                        
                        <div class="jumbotron text-center">
                            <p class="lead text-muted"> Vous allez modifier la transaction avec <?php echo $prenom . " " . $nom; ?> d'un montant de <?php echo $montant/100 . " euros"; ?></p>
                        </div>
                            
                        
                        <br />
                        <br />

                        <div class="input-group mb-3">
                            <input type="text" name="montant" class="form-control" id="montant" placeholder="Montant" aria-label="#" aria-describedby="basic-addon1">
                        </div>
                
                        <br /> 
                
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="<?php echo $prenom; ?>" readonly>
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
                        </div>
                            
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