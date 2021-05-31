<?php
/*Equivalent to solde.php but calculated on a different basis */
/*Link with the database declared as $link and user1 as $id1, user2 as $id2*/
$solde_pos=mysqli_query($link, "SELECT `montant` FROM `TRANSACTIONS` WHERE `etat`=1 AND `id_paye`=$id1 AND `id_recoit`=$id2");
$solde_neg=mysqli_query($link, "SELECT `montant` FROM `TRANSACTIONS` WHERE `etat`=1 AND `id_paye`=$id2 AND `id_recoit`=$id1");

$solde_fr=0;
while ($moins=mysqli_fetch_row($solde_neg)){
    /*echo "-$moins[0]";*/
    $solde_fr-=$moins[0];
}
while ($plus=mysqli_fetch_row($solde_pos)){
    /*echo "+$plus[0]";*/
    $solde_fr+=$plus[0];
}
$euros_fr=$solde_fr/100;
//$cents_fr=($solde_fr-$euros_fr*100)/100;
?>