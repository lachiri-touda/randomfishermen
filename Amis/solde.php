<?php
/*Link with the database declared as $link and user as $ids*/
$solde_pos=mysqli_query($link, "SELECT `montant` FROM `TRANSACTIONS` WHERE `etat`=1 AND `id_paye`=$ids");
$solde_neg=mysqli_query($link, "SELECT `montant` FROM `TRANSACTIONS` WHERE `etat`=1 AND `id_recoit`=$ids");

$solde=0;
while ($moins=mysqli_fetch_row($solde_neg)){
    /*echo "-$moins[0]";*/
    $solde-=$moins[0];
}
while ($plus=mysqli_fetch_row($solde_pos)){
    /*echo "+$plus[0]";*/
    $solde+=$plus[0];
}
$euros=$solde/100;
?>