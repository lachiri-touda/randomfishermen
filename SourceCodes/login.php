<?php
   session_start();
   $link = mysqli_connect("localhost", "root", "", "Random_Fishermen");

 /* check connection */
   if (mysqli_connect_errno()) {
       printf("Connect failed: %s\n", mysqli_connect_error());
       exit();
   }
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      if (empty($email) || empty($pass) ){
        $erreur="entrer votre email et mot de passe!";
        }

      else {
         $res = mysqli_query($link,"SELECT `ID` FROM `UTILISATEURS` WHERE `Mail`='$email' AND `Password`='$pass'  ");


         if($id_temp = mysqli_fetch_row($res)) {
           $_SESSION['email'] =$_POST["email"];
           $_SESSION['id'] =$id_temp[0];
           $_SESSION["autoriser"]="oui";
           setcookie("id", $_SESSION['id'], time() + 3000 , null, null, false, true);
            header("location:accueil.php");

          }
          else {
               $erreur = "email ou mot de passe incorrect";
              }
           }
     }
?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Connexion </title>
</head>
<body class="bdy" >
<section class="cl0">
  <p class="cl8">BIENVENUE</p>
  <form action="" method="post" class="cl9">
          <p>
          <input type="email" name="email" placeholder="E-mail" style="width: 255px; height: 20px;" size="44" required />
          <input type="password" name="pass" placeholder="Mot de passe" style="width: 255px; height: 20px;" size="44" required />
          <br />
          <b class="erreur"><?php echo $erreur ?></b>  <br />
          <input type="submit" name="valider" value="Se connecter" class="cl10" />
          </p>

  </form>
    <p class="cl11">Vous n'avez pas un compte? <a href="sinup.php" class="cl6" > inscrivez-vous<a></p>
</section>

</body>
</html>
