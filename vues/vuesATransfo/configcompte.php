<?php
include_once('../include/MysqlDao.php');
include("../setup.php");

if(!isset($_SESSION))
{
    session_start();
}

$dao = new Mysqldao;


$mail=($_SESSION['mail']);


$result=$dao->recupererinfosclients($mail);



echo'<br>';

include_once '../include/menuClient.html'; 

foreach ($result as $key ) {

echo "Statut : ";
echo $key['statut'];
echo'<br>';
echo "Forme : ".$key['forme'];
echo'<br>';
echo "Raison : ".$key['raison'];
echo'<br>';
echo "Nom : ".$key['nom'];
echo'<br>';
echo "Prenom : ".$key['prenom'];
echo'<br>';
echo "email : ".$key['email'];
echo'<br>';
echo "Tel : ".$key['tel'];
echo'<br>';
echo "Portable : ".$key['portable'];
echo'<br>';
echo "Fax : ".$key['fax'];
echo'<br>';
echo "Date inscription : ".$key['date_inscription'];
}
foreach ($result as $key ) {
	$_SESSION['raison']=$key['raison'];
	$_SESSION['nom']=$key['nom'];
	$_SESSION['prenom']=$key['prenom'];
	$_SESSION['email']=$key['email'];
	$_SESSION['tel']=$key['tel'];
	$_SESSION['portable']=$key['portable'];
	$_SESSION['fax']=$key['fax'];
}


?>
<form action='modif_infos.php' method="POST" id="mod2">
	<br>
	<br>
<button type='submit' value='Envoyer'>Modifier les informations</button>
</form>



