<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
   <head>
       <title>Eureka Administrateur</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" media="screen" title="Essai" href="Index.css"/>
 
        </head>
      <body>
<?php
// cet page sert a supprimer un fichier placé par l'admin
if (isset($_POST['supprimer'])) {

	$idDemande = $_POST['idDemande'];
	$ref = $_POST['ref'];
	$idfichier = $_POST['idfichier'];

	//$_SESSION['id fichier a supprimer_a_supprimer']=$email;

	echo 'Etes vous sure de vouloir supprimer cette entrée? 
	</br>
	Cette action serait irreversible.';

	?>


	<form method="post" action="suppressiondemande.php" class="form">
		<input type="hidden" name="idfichier" value="<?php echo $idfichier; ?>">
		<input type="hidden" name="ref" value="<?php echo $ref; ?>">
		<input type="submit" value="Confirmer" id="confirmer"/>
	</form> 

	<form method="post" action="../afficher_demande.php" class="form">
		<input type="submit" value="Annuler" id="Annuler"/>
	</form> 


		<a class="btn" href="../afficher_demande.php">Retour</a>
	<?php
	}

	?>
</body>
</html>

