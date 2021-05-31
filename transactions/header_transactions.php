<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if (!isset($_COOKIE["id"])){
      header("location:login.php");
   }
?>

<?php
   try{
      $pdo=new PDO("mysql:host=localhost;dbname=it103","admin","it103");
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>

<!doctype html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Transactions</title>
</head>