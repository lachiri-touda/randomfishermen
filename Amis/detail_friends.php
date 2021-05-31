<div class="col-8">
<?php
    if (isset ($idfr)){ /*If no friends has been selected, then nothing is displayed*/
        if ($idfr>0){ /*If there is a friend to be displayed*/
            $ami = mysqli_query($link,"SELECT `Prenom`, `Nom`, `Mail`, `Pseudo` FROM `UTILISATEURS` WHERE `ID`=$idfr");
            $amifin = mysqli_fetch_row($ami);

            $ids=$idfr; /*For solde.php*/

            $id1=$id; /*For solde_amis.php */
            $id2=$idfr;

            include("solde.php");
            include("solde_amis.php");

            //Display the infos
                echo '<div class = "sm-6 p-4 m-3 border border-dark rounded bg-white">';
                    //Name (big)
                    echo '<div class="row">';
                        echo '<div class="col">';
                            echo "<h2> $amifin[0] $amifin[1] </h2>";
                        echo '</div>';
                    echo '</div>';

                    echo '<div class="row pb-4">';  

                        //Pseudo                  
                        echo '<div class="col">';
                            echo "($amifin[3])";
                        echo '</div>';
                
                        //Solde
                        echo '<div class="col d-flex justify-content-end">';
                            echo '<button type="button" class="btn btn-primary align-middle">';
                            echo  "$euros";
                            echo '€</button>';
                        echo '</div>';

                    echo '</div>';

                    //can we delete him (solde=0) ?
                    include("delete_friend_button.php");

                    //choose if you display all transactions or not
                    include("transactions_friends_button.php");

                    //the transactions with this person
                    if ($transac_fr==1){
                        include("transactions_friends.php");
                    }
                    else {
                        include("transactions_friends_all.php");
                    }
                    
                echo '</div>';
        }
        elseif($idfr==0){/*If you want to add a friend */
            echo '<div class = "sm-6 p-4 m-3 border border-dark rounded bg-white">';
                include("add_friends_form.php");
            echo '</div>';
        }
        else{
            echo '<div class = "sm-6 p-4 m-3 border border-dark rounded bg-white">';
                echo "<p>L'ami a été correctement supprimé.</p>";
            echo '</div>';
        }
    }
    else{
        echo '<div class = "sm-6 p-4 m-3 border border-dark rounded bg-white">';
            echo "<p>Sélectionner un ami pour avoir des détails.</p>";
        echo '</div>';
    }
?>
</div>