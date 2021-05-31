<?php
   try{
      //$pdo=new PDO("mysql:host=localhost;dbname=it103","admin","it103");
      $pdo=new PDO("mysql:host=localhost;dbname=random_Fishermen","root");
      //localhost;random_Fishermen;root;
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
?>
