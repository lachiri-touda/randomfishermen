<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Ouverture</th>
      <th scope="col">Fermeture</th>
      <th scope="col">Montant</th>
      <th scope="col">Infos</th>
      <th scope="col">Clôture</th>
      <th scope="col">Actions</th>
    </tr>
  <tbody>
    <?php 
      $id_user = $_SESSION['id'];
      $ligne = $pdo->query('SELECT ID_TRANSACTION, date_ouverture, date_fermeture, montant, commentaire, fermeture FROM TRANSACTIONS WHERE (id_paye="'.$id_user.'" OR id_recoit="'.$id_user.'") AND etat = "1"'); 
      
      $compteur = 0;
      
      while($donnees = $ligne->fetch())
        {   
          $compteur++;
    
          echo '<tr>';
          echo '<th scope="row">' . $compteur . '</th>';
    
          for ($colonne = 0; $colonne < 6; $colonne++) 
            {
              echo '<td>' . "$donnees[$colonne]" . '</td>';
            }
    
            echo '<td>';

            echo '<div class="container">';
            echo '<div class="row">';
            
            echo '<div class="col">';
                echo '<a class="badge badge-success" href="fermer.php?id=' . $donnees[0] . '" role="button">Payer</a>';
            echo '</div>';
                        
            echo '<div class="col">';
                echo '<a class="badge badge-primary" href="modifier.php?id=' . $donnees[0] . '" role="button">Modifier</a>';
            echo '</div>';

            echo '<div class="col">';
                echo '<a class="badge badge-danger" href="supprimer.php?id=' . $donnees[0] . '" role="button">Supprimer</a>';
            echo '</div>';
          
         echo '</td>';
          
          
            echo '</tr>';
   
        }
      $ligne->closeCursor();
    ?>
</table>