<?php

include_once('../include/MysqlDao.php');
include("../setup.php");
if(!isset($_SESSION))
  
{
    session_start();
}

if (isset($_SESSION['id']) && !empty($_SESSION['id']))  {$id = $_SESSION['id'];}

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


$dao->modifierInfosClients($id,$statut,$forme,$raison,$nom,$prenom,$email,$tel,$portable,$fax);


echo'<br>';
echo "cliquez ici pour etre redirige vers votre menu";

?>


<form method="post" action="accueilclient.php" class="form">
<input type='submit' value='Revenir' id="revenir"/>
</form> 
