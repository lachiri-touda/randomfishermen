<?php include("header_transactions.php"); ?>

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

if (isset($_POST['montant']) AND isset($_POST['text']))
{
	


        $date = date('Y') . '-' . date('m') . '-' . date('d');
        $res = $pdo->prepare('INSERT INTO TRANSACTIONS(`etat`, `date_ouverture`, `date_fermeture`, `montant`, `id_paye`, `id_recoit`, `commentaire`)
        VALUES(:etat, :date_ouverture, :date_fermeture, :montant, :id_paye, :id_recoit, :commentaire)');
        
        $res->execute(array(
            'etat'=> 1,
            'date_ouverture'=> $date,
            'date_fermeture'=> NULL,
            'montant'=> $_POST['montant']*100,
            'id_paye'=> $_SESSION['id'],
            'id_recoit'=> $_POST['idrecoit'],
            'commentaire'=> $_POST['text']
        ));
        
        echo '<section class="jumbotron text-center">
        <div class="row">
            <div class="col">
                 <p class="text-center">Votre transaction a bien était ajouté !</p>
            </div>
        </div>';

        }
        else{
            echo '<section class="jumbotron text-center">
                <div class="row">
                <div class="col">
                 <p class="text-center">Veuillez saisir les donées correctement !</p>
            </div>
        </div>';
        }
        ?>

        <div class="row">
            <div class="col">
                <!-- <div class="mx-auto" style="width: 200px;"> -->
                    <a href="transactions.php" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Retour</a>
                </div>
            </div>
        </div>
        </section>

    </div>
</body>


