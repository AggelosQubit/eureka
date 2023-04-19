<?php
	//session_start();

	//include("../../../includes/en_tete.php");
	
	include("fonctions_liste.php");
	
	//include("../../../includes/config.php");
	//include("../../../includes/header.php");

/* affiche l'en-tete */
	//enTete("", "../../../css/default");

	//header_aff("Enregistrement de consommations à prix variable", "../../..");

/* réglage des paramètres pour la date */

	date_default_timezone_set('UTC'); // fuseau horaire
	$num_sem=strftime("%V");          // numéro de semaine
	$date = date("Y-m-d");            // date 

/* déclare les variables de session */

	/*$_SESSION['dbname']=$dbname;
	$_SESSION['dbuser']=$dbuser;
	$_SESSION['numport']=$numport;*/

	$login = $_SESSION['mail'];

	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

/* si le numéro de chambre ou le montant sont vide ou que le code_centre est 000000, on affiche une erreur et on renvoie sur la page d'enregistrement */

	if ( empty($password) | empty($confirm_password))
	{
		echo "
			<p class='erreur'>
				<script language='JavaScript'>
					alert('Vous avez oublié de remplir un des champs. Merci de recommencer.');
					window.location.replace('config_compte.php');
				</script>";
    }

/* sinon on ajoute la consommation */

	else
	{
		modif_compte($login, $password);
	}
?>