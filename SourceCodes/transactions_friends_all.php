<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date d'ouverture</th>
                <th scope="col">Date de fermeture</th>
                <th scope="col">Montant</th>
                <th scope="col">Infos</th>
                <th scope="col">Fermeture</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $transactions_plus=mysqli_query($link, "SELECT `date_ouverture`, `date_fermeture`, `montant`, `commentaire`, `fermeture`, `etat` FROM `TRANSACTIONS` WHERE `id_paye`= '$id' AND `id_recoit` = '$idfr'");
                $transactions_moins=mysqli_query($link, "SELECT `date_ouverture`, `date_fermeture`, `montant`, `commentaire`, `fermeture`, `etat` FROM `TRANSACTIONS` WHERE `id_paye`= '$idfr' AND `id_recoit` = '$id'");
                $i = 1;

                while($plus=mysqli_fetch_row($transactions_plus)){
                    if ($plus[5]==1){echo "<tr>";}
                    else {echo "<tr class=\"table-active\">";}
                        echo "<th scope=\"row\">$i</th>";
                        echo "<td>";
                            echo "$plus[0]";
                        echo "</td>";
                        echo "<td>";
                            if (isset($plus[1])){
                                echo "$plus[1]";
                            }
                            else{
                                echo "transaction en cours";
                            }
                        echo "</td>";
                        echo "<td>";
                            $euros_tr = $plus[2]/100;
                            echo "+$euros_tr €";
                        echo "</td>";
                        echo "<td>";
                            echo "$plus[3]";
                        echo "</td>"; 
                        echo "<td>";
                            echo "$plus[4]";
                        echo "</td>"; 
                    echo "</tr>"; 
                    $i++;
                }
                while($moins=mysqli_fetch_row($transactions_moins)){
                    if ($moins[5]==1){echo "<tr>";}
                    else {echo "<tr class=\"table-active\">";}
                        echo "<th scope=\"row\">$i</th>";
                        echo "<td>";
                            echo "$moins[0]";
                        echo "</td>";
                        echo "<td>";
                            if (isset($moins[1])){
                                echo "$moins[1]";
                            }
                            else{
                                echo "transaction en cours";
                            }
                        echo "</td>";
                        echo "<td>";
                            $euros_tr = $moins[2]/100;
                            echo "-$euros_tr €";
                        echo "</td>";
                        echo "<td>";
                            echo "$moins[3]";
                        echo "</td>";  
                        echo "<td>";
                            echo "$moins[4]";
                        echo "</td>";
                    echo "</tr>"; 
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>