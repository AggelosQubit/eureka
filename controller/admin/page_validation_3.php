<?php
	session_start();

//include("../../../includes/en_tete.php");

	include("modif_admin.php");

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

	$reponse = $_POST['reponse'];
	$raison_sociale = $_POST['raison_sociale'];
	$nom_contact = $_POST['nom_contact'];
	$prenom_contact = $_POST['prenom_contact'];
	$tel_contact = $_POST['tel_contact'];
	$portable_contact = $_POST['port_contact'];
	$fax_contact = $_POST['fax_contact'];
	$new_password = $_POST['new_password'];
	$confirm_new_password = $_POST['confirm_new_password'];
	$fist = $_POST['fist'];
	$raison = $_POST['raison'];


/* si le numéro de chambre ou le montant sont vide ou que le code_centre est 000000, on affiche une erreur et on renvoie sur la page d'enregistrement */

	if ( (empty($raison_sociale)) | empty($nom_contact) | (empty($prenom_contact)) | empty($new_password) | empty($confirm_new_password))
	{
		echo "
			<p class='erreur'>
				<script language='JavaScript'>
					alert('Vous avez oublié de remplir un des champs. Merci de recommencer');
					window.location.replace('config_contact_2.php');
				</script>";
	}
	else if ($new_password != $confirm_new_password)
	{
		echo "
			<p class='erreur'>
				<script language='JavaScript'>
					alert('Vous devez confirmer avec le même mot de passe.');
					window.location.replace('config_contact_2.php');
				</script>
		";
	}

/* sinon on ajoute la consommation */

	else
	{
		modif_compte_3($reponse, $raison_sociale, $nom_contact, $prenom_contact, $fist, $tel_contact, $portable_contact, $fax_contact, $new_password, $raison);
	}
?>