<?php include("header_transactions.php"); ?>

<body>  
    
<?php include("navbar.php"); ?>

    <div class="container">
        <div class="row">
            <div class="col">
            <h2 class="display-6 text-center">Historique des transactions :</h2>
            </div>
        </div>
        
        </br >

        <div class="row">
            <div class="col">
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
    </tr>
  <tbody>
    <?php 
      $id_user = $_SESSION['id'];
      $ligne = $pdo->query('SELECT ID_TRANSACTION, date_ouverture, date_fermeture, montant, commentaire, fermeture FROM TRANSACTIONS WHERE (id_paye="'.$id_user.'" OR id_recoit="'.$id_user.'") AND etat != "1"'); 
      
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
          
          echo '</tr>';
   
        }
      $ligne->closeCursor();
    ?>
</table>
            </div>
        </div>
</body>