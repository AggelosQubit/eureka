<?php

// pouvoir gerer des services 
session_start();
if (isset($_SESSION['mail'])) {
include('../include/MysqlDao.php');
include ('../setup.php');
$dao = new MysqlDao;
}
else {
echo 'Les variables ne sont pas déclarées.';
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="../js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
            <div class="row">
                <h3>Action sur les services</h3>
            </div>
            <div class="row">
            	 <p>
                    <a href="services/create.php" class="btn btn-success">Creer nouveau service</a>
                </p>
				 <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Nom du service</th>
                      <th>Prix du service</th>
                       <th>Action</th>                  
                  </thead>
                  <tbody>
                  <?php
                   $resultnature=$dao->recherche_nature();
                   foreach ($resultnature as $row) 
                    	
                     {
                            echo '<tr>';
                            echo '<td>'. $row['nom_service'] . '</td>';
                            echo '<td>'. $row['prix'] . '</td>';
							echo '<td width=250>';
                            echo '<a class="btn" href="services/read.php?id='.$row['id'].'">Lire</a>';
                            echo ' ';
                            echo '<a class="btn btn-success" href="services/update.php?id='.$row['id'].'">Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="services/delete.php?id='.$row['id'].'">Supprimer</a>';
                            echo '</td>';

							echo '</tr>';

                   }
                  
                  ?>

                  </tbody>
            </table>
        </div><a class="btn" href="admin.php">Retour</a>
    </div> <!-- /container -->
  </body>
</html>





