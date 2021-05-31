<?php include("header_transactions.php"); ?>

<body>  
<?php include("navbar.php"); ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <?php //include("navbar.php"); ?>
            </div>
        </div>

    <?php 

    $id = $_POST[id];
    $date = date('Y') . '-' . date('m') . '-' . date('d');

    if ($_POST[type] == 1){
        
            $res = $pdo->prepare('UPDATE TRANSACTIONS SET etat = :new_etat, date_fermeture = :new_date_fermeture,
            fermeture = :new_fermeture WHERE ID_TRANSACTION = "'.$id.'"');
            
            $res->execute(array(
                'new_etat'=> 2,
                'new_date_fermeture'=> $date,
                'new_fermeture'=> $_POST['text']

            ));
        
            echo '<section class="jumbotron text-center">
            <div class="row">
                <div class="col">
                    <p class="text-center">Votre transaction a bien était clôturé !</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                        <a href="transactions.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Retour</a>
                    </div>
                </div>
            </div>
            </section>';
        
        }

    elseif ($_POST[type] == 2){
        
            $res = $pdo->prepare('UPDATE TRANSACTIONS SET montant = :new_montant, id_recoit = :new_id_recoit,
            commentaire = :new_commentaire WHERE ID_TRANSACTION = "'.$id.'"');
            
            $res->execute(array(
                'new_montant'=> $_POST['montant']*100,
                'new_id_recoit'=> $_POST['idrecoit'],
                'new_commentaire'=> $_POST['text']
            ));

            echo '<section class="jumbotron text-center">
            <div class="row">
                <div class="col">
                    <p class="text-center">Votre transaction a bien était modifié !</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                        <a href="transactions.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Retour</a>
                    </div>
                </div>
            </div>
            </section>';



        }
    
    elseif ($_POST[type] == 3){
        
            $res = $pdo->prepare('UPDATE TRANSACTIONS SET etat = :new_etat, date_fermeture = :new_date_fermeture,
            fermeture = :new_fermeture WHERE ID_TRANSACTION = "'.$id.'"');
            
            $res->execute(array(
                'new_date_fermeture'=> $date,
                'new_etat'=> 0,
                'new_fermeture'=> $_POST['message']
            ));
            
            echo '<section class="jumbotron text-center">
            <div class="row">
                <div class="col">
                    <p class="text-center">Votre transaction a bien était supprimé !</p>
                </div>
            </div>
            
            <div class="row">
                <div class="col">
                        <a href="transactions.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Retour</a>
                    </div>
                </div>
            </div>
            </section>';
        }

    ?>
</body>