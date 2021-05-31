<div class="row">
    <div class="col">
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Date d'ouverture</th>
                <th scope="col">Montant</th>
                <th scope="col">Infos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $transactions_plus=mysqli_query($link, "SELECT `date_ouverture`, `montant`, `commentaire` FROM `TRANSACTIONS` WHERE `etat`='1' AND `id_paye`= '$id' AND `id_recoit` = '$idfr'");
                $transactions_moins=mysqli_query($link, "SELECT `date_ouverture`, `montant`, `commentaire` FROM `TRANSACTIONS` WHERE `etat`='1' AND `id_paye`= '$idfr' AND `id_recoit` = '$id'");
                $i = 1;

                while($plus=mysqli_fetch_row($transactions_plus)){
                    echo "<tr>";
                        echo "<th scope=\"row\">$i</th>";
                        echo "<td>";
                            echo "$plus[0]";
                        echo "</td>";
                        echo "<td>";
                            $euros_tr = $plus[1]/100;
                            echo "+$euros_tr €";
                        echo "</td>";
                        echo "<td>";
                            echo "$plus[2]";
                        echo "</td>";  
                    echo "</tr>"; 
                    $i++;
                }
                while($moins=mysqli_fetch_row($transactions_moins)){
                    echo "<tr>";
                        echo "<th scope=\"row\">$i</th>";
                        echo "<td>";
                            echo "$moins[0]";
                        echo "</td>";
                        echo "<td>";
                            $euros_tr = $moins[1]/100;
                            echo "-$euros_tr €";
                        echo "</td>";
                        echo "<td>";
                        //Is the commentary always defined ?
                            echo "$moins[2]";
                        echo "</td>";
                    echo "</tr>";  
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>