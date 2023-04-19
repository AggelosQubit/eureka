<?php

include_once('../include/MysqlDao.php');
include("../setup.php");
if(!isset($_SESSION))
  
{
    session_start();
}

if (isset($_POST['id']) && !empty($_POST['id']))  {$id = $_POST['id'];}

if (isset($_POST['statuts']) && !empty($_POST['statuts']))  {$statut = $_POST['statuts'];}

if (isset($_POST['forme_juridiques']) && !empty($_POST['forme_juridiques']))  {$forme = $_POST['forme_juridiques'];}

if (isset($_POST['raison_sociale']) && !empty($_POST['raison_sociale']))  {$raison = $_POST['raison_sociale'];}

if (isset($_POST['nom_contact']) && !empty($_POST['nom_contact']))  {$nom = $_POST['nom_contact'];}

if (isset($_POST['prenom_contact']) && !empty($_POST['prenom_contact']))  {$prenom = $_POST['prenom_contact'];}

if (isset($_POST['email_contact']) && !empty($_POST['email_contact']))  {$email = $_POST['email_contact'];}

if (isset($_POST['tel_contact']))  {$tel = $_POST['tel_contact'];}

if (isset($_POST['port_contact']))  {$portable = $_POST['port_contact'];}

if (isset($_POST['fax_contact']))  {$fax = $_POST['fax_contact'];}








$dao = new Mysqldao;

//print_r($_SESSION);
//print_r($_POST);
if (isset($_POST['modifier'])) {

	$dao->modifierInfosClients($id,$statut,$forme,$raison,$nom,$prenom,$email,$tel,$portable,$fax);

	echo'<br>';
	echo "cliquez ici pour etre redirige vers votre menu";
	
	echo'<form method="post" action="admin.php" class="form">
	<input type="submit" value="Confirmez" id="confirmer"/>
	</form>';

	}


if (isset($_POST['supprimer'])) {

	$_SESSION['email_personne_a_supprimer']=$email;

	echo 'Etes vous sure de vouloir supprimer cette entrée ? Cette action serait irreversible.';

	echo' <form method="post" action="suppressionclient.php" class="form">
		<input type="submit" value="Confirmer" id="confirmer"/>
		</form> 

		<form method="post" action="admin.php" class="form">
		<input type="submit" value="Annuler" id="Annuler"/>
		</form> ';
		
	}







