<div class="row pt-4 pl-4 pr-4">
    <div class="col">
    <?php
        if ($solde_fr==0){
            echo "<form method=\"post\" action=\"delete_friend.php\">";
                echo "<p>";
                    echo "<input type=\"hidden\" name=\"id\" value=$id />";
                    echo "<input type=\"hidden\" name=\"idfr\" value=$idfr />";
                    echo "<button type=\"submit\" class=\"btn btn-danger btn-lg btn-block\" >Supprimer l'ami</button>";
                echo "<p>";
            echo "</form>";
        }
        else{
            echo "<p> Vous avez un contentieux de $euros_fr € avec cette personne. </p>";
        }
    ?>
    </div>
</div>