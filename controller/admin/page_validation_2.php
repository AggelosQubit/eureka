<?php
	session_start();

//include("../../../includes/en_tete.php");

	include("fonctions_liste.php");

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
	$raison = $_POST['raison_sociale'];
	$nom_contact = $_POST['nom_contact'];
	$prenom_contact = $_POST['prenom_contact'];
	$tel = $_POST['tel_contact'];
	$portable = $_POST['port_contact'];
	$fax = $_POST['fax_contact'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];
	$login = $_SESSION['login'];

/* si le numéro de chambre ou le montant sont vide ou que le code_centre est 000000, on affiche une erreur et on renvoie sur la page d'enregistrement */

	if ( (empty($raison)) | empty($nom_contact) | (empty($prenom_contact)) | empty($password) | empty($confirm_password))
	{
		echo "
			<p class='erreur'>
				<script language='JavaScript'>
					alert('Vous avez oublié de remplir un des champs. Merci de recommencer');
					window.location.replace('config_contact.php');
				</script>";
	}

/* sinon on ajoute la consommation */

	else
	{
		modif_compte_2($reponse, $raison, $nom_contact, $prenom_contact, $tel, $portable, $fax, $password, $login);
	}
?>