<?php
$erreur="";
if (isset($_POST["friend_input"])){
    $unknown=$_POST["friend_input"];
    $cherche_ami=mysqli_query($link,"SELECT `ID` FROM `UTILISATEURS` WHERE `Pseudo`= '$unknown' OR `Mail`='$unknown'"); /*Is there anyone with this pseudo or email */
    if (mysqli_num_rows($cherche_ami)==1){
        $idadd=mysqli_fetch_row($cherche_ami)[0];
        $deja=mysqli_num_rows(mysqli_query($link,"SELECT `ID_USER`, `ID_AMI` FROM `AMIS` WHERE `ID_USER`='$id' AND`ID_AMI`='$idadd'")); /*Are they already friends ? */
        if (($idadd!=$id)&&($deja==0)){
            include ("add_friend.php");
        }
        else {
            $erreur = "Vous êtes déjà amis";
        }
    }
    else {
        $erreur = "Cet utilisateur n'existe pas";
    }
}

?>

<form method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Adresse email ou pseudo</label>
        <input type="text" class="form-control" name="friend_input" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">L'utilisateur doit avoir un compte</small>
    </div>
    <div class="erreur"><?php echo $erreur ?></div>
    <button type="submit" class="btn btn-primary m-2">Ajouter</button>
</form>

