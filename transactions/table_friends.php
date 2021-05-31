<?php
$ligne = $pdo->query('SELECT ID, Prenom, Nom FROM UTILISATEURS JOIN AMIS ON UTILISATEURS.ID = AMIS.ID_AMI WHERE ID_USER ="'.$_SESSION['id'].'"'); 
      $compteur = 0;
      
      while($donnees = $ligne->fetch())
        {   
          $compteur++;
    
          echo '<option value="' . "$donnees[0]" .'">' . "$donnees[1]" . ' ' . "$donnees[2]" . '</option>'; 
        }
      $ligne->closeCursor();
?>
                    