<?php include("header_transactions.php"); ?>

<body>

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
        
        for ($i=0; $i < $_POST['nombre']; $i++)
        {
            $res->execute(array(
            'etat'=> 1,
            'date_ouverture'=> $date,
            'date_fermeture'=> NULL,
            'montant'=> $_POST['montant' . $i]*100,
            'id_paye'=> $_SESSION['id'],
            'id_recoit'=> $_POST['idrecoit' . $i],
            'commentaire'=> $_POST['text']
        ));
        }
    ?>
        
        <section class="jumbotron text-center">
        <div class="row">
            <div class="col">
                 <p class="text-center"> <?php echo $_POST['nombre'] ?> transactions ont bien étaient ajoutés !</p>
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
</body>