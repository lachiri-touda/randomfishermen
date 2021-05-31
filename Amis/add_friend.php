<?php
$one=mysqli_query($link,"INSERT INTO `AMIS`(`ID_USER`, `ID_AMI`) VALUES ($id,$idadd)");
$two=mysqli_query($link,"INSERT INTO `AMIS`(`ID_USER`, `ID_AMI`) VALUES ($idadd,$id)");

$idfr=$idadd;
if (($one)&&($two)){
    header("location:amis.php?idfr=$idadd");
    exit();
}
?>