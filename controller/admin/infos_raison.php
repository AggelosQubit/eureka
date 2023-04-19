<?php
include("../include/MysqlDao.php");
include('../setup.php');
$dao = new MysqlDao;



if(isset($_GET['id']))

{
	$id=$_GET['id'];

	$result=$dao->recupererInfosClientsParId($id);
	

	foreach ($result as $key) {
		
		echo"identifiant : ".$id;
		echo"<br>";
		echo "statut :".$key['statut'];
		echo"<br>";
		echo "Forme :".$key['forme'];
		echo"<br>";
		echo "Raison :".$key['raison'];
		echo"<br>";
		echo "Nom :".$key['nom'].' '.$key['prenom'];
		;
		echo"<br>";
		echo "email :".$key['email'];
		echo"<br>";
		echo "tel :".$key['tel'];
		echo"<br>";
		echo "portable :".$key['portable'];
		echo"<br>";
		echo "fax :".$key['fax'];
		echo"<br>";
		echo "date inscription :".$key['date_inscription']; 

	}



}



