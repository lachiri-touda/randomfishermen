<?php
    /*Is it better than an include ?*/
    $link = mysqli_connect("127.0.0.1", "admin", "it103", "it103");
    $idfr = $_POST['idfr'];
    $id = $_POST['id'];

    $one=mysqli_query($link, "DELETE FROM `AMIS` WHERE `ID_USER`=$id AND `ID_AMI`=$idfr");
    $two=mysqli_query($link, "DELETE FROM `AMIS` WHERE `ID_USER`=$idfr AND `ID_AMI`=$id");
    if ($one && $two){
        header("location:amis.php?idfr=-1");
    }
?>