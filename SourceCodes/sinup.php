<?php
   session_start();
   $link = mysqli_connect("localhost", "root", "", "Random_Fishermen");

 /* check connection */
   if (mysqli_connect_errno()) {
       printf("Connect failed: %s\n", mysqli_connect_error());
       exit();
   }
   $valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){

     $prenom = $_POST["prenom"];
     $nom = $_POST["nom"];
     $email = $_POST["email"];
     $pass = $_POST["pass"];
     $date = $_POST["date"];
     $pseudo = $_POST["pseudo"];

     $res = mysqli_query($link,"SELECT `ID` FROM `UTILISATEURS` WHERE `Mail`='$email' OR `Password`='$pass'  ");
     if( $id_temp = mysqli_fetch_row($res)) {
        $erreur = "email et mot de passe déjà existe";
      }
      else {
       $resulat = mysqli_query($link,"INSERT INTO `UTILISATEURS` VALUES( NULL , '$prenom','$nom','$date','$email','$pseudo','$pass')");
         header("location:reg_succ.php");
         exit();

      }
    }

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="style.css">
        <title> Inscription </title>
</head>
  <body class="bdy">
    <section class="cl0" >
      <p class="cl8">Créer un compte</p>

      <form action="" method="post" class="cl2">
          <p >
               <input type="text" name="prenom" placeholder="Prénom" style="width: 80px; height: 20px;" size="15" required /> <input type="text" name="nom" placeholder="Nom de la famille" style="width: 150px; height: 20px;" size="25" required />
               <input type="email" name="email"  placeholder="E-mail" style="width: 255px; height: 20px;" size="44" required />
               <input type="password" name="pass"  placeholder="Mot de passe" style="width: 255px; height: 20px;" size="44" required /> <br/>
               <label class="cl3" > Date de naissance             :</label>      <input id="date" name="date"  type="date" required >
               <br />
              <input type="text" name="pseudo"  placeholder="Pseudo" style="width: 255px; height: 20px;" size="44" required /> <br />
              <b class="erreur"><?php echo $erreur ?></b><br />
              <input type="submit" name="valider" value="inscription" class="cl4" />
       </p>
    </form>
    <p >Avez-vous déjà un compte?<a  href="login.php"> connectez-vous<a></p>
   </section>
 </body>

</html>
