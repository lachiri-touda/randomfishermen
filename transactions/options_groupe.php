<?php include("header_transactions.php"); ?>

<body>

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
        <h5 class="display-6 text-center">Options de groupe :</h5>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <form method="post" action="formulaire_groupe.php">
                <p>
                <div class="input-group mb-3">
                    <input type="text" name="beneficiaire" class="form-control" id="beneficiaire" placeholder="Combien de bénéficiaire ?" aria-label="#" aria-describedby="basic-addon1">
                </div>

                <br />

                <div class="input-group mb-3">
                    <input type="text" name="total" class="form-control" id="total" placeholder="Montant total" aria-label="total" aria-describedby="basic-addon1">
                </div>

                <br />

                <div class="form-check">
                    <input class="form-check-input" name ="repartition" type="checkbox" value="on" id="case" checked="checked">
                    <label class="form-check-label" for="case">Répartition égale ?</label>
                </div>
                
                <div class="mx-auto" style="width: 200px;">
                    <input type="submit" value="Valider" />
                </div>
                </p>
            </form>

</body>