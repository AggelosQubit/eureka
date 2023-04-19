

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/bootstrap.min.js"></script>
</head>
 
<body>
    <?php
//require('connexion.php');
include ('../../include/MysqlDao.php');
include('../../setup.php');
$dao = new MysqlDao;


if(isset($_POST['ref'])  && (isset($_POST['id']))) {

    $ref_demande=$_POST['ref'];
    
    $idClient=$_POST['id'];




    
    
}





$files=$dao->recupererfiles($ref_demande);





if($files){


echo "<h3> Fichiers dispos pour cette entrée </h3> ";

$date = $dao->recuperer_date_upload($ref_demande);
// pour pouvoir recuperer la date d'upload
/*if(isset($date)){
  foreach ($date as $key ) {
    $date_demande=$key['date_upload'];
  }
}
*/

foreach ($files as $key) {

   // echo $date_demande;

    echo'<form method="post" action="confirm_mod_ou_suppr_demande_par_admin.php">';
    ?>
    <a href="../../<?php echo $key['file_url']; ?>"> <?php echo $key['name']; ?> </a>

    <input type='hidden' name='idDemande' value='<?php echo $key["id"];?>'>

    <input type='hidden' name='ref' value='<?php echo $key["refDemande"];?>'>
    <input type='hidden' name='idfichier' value='<?php echo $key["id"];?>'>

    <input type="submit" class="btn btn-default" name="supprimer" value="supprimer" />
    <!-- <input type="submit" name="modifier" value="modifier" /> -->
    </form>


<?php

    }
}





?>
	
    <form method="POST" action='reception_du_fichier.php' enctype="multipart/form-data">
    <table>
     <!-- On limite le fichier à 100Ko -->
     <input type="hidden" name="MAX_FILE_SIZE" value="100000">
    <tr> 
     <td><input type= 'hidden' name='id' value= <?php echo $_POST['id']; ?> />Id du client : <?php echo $_POST['id'];    ?></td>
      <td><input type= 'hidden' name='ref' value= <?php echo $_POST['ref']; ?> />reference demande :  <?php echo $_POST['ref']   ?> </td>
    <td> Fichier : <input type="file"  class='file' name="fichier">
     <input type="submit" name="envoyer" value="Envoyer le fichier"></td>
     
    </tr>
     </table>
	</form>
    <a class="btn" href="../afficher_demande.php">Retour</a>

      </body>
</html>

