<?php
session_start();
include("../include/MysqlDao.php");

include ("../setup.php");


$dao = new MysqlDao ;

$id=$_SESSION['id'];

$ref=$_POST['ref'];


$result=$dao->facture_detaille($ref);

include_once '../include/menuClient.html';

echo "<p> <a href='facture.php'>Retour à la liste des factures</a> </p>";

foreach ($result as $key ) {
	



echo"Identifiant de la personne :".$key['id'];
echo"<br>";
echo"Raison :".$key['raison'];
echo"<br>";
echo"Reference de la demande :".$key['ref_demande'];
echo"<br>";
echo"Nature de la demande :".$key['nat_demande'];
echo"<br>";
echo"Date de la demande :".$key['mois_demande'];
echo"<br>";
echo"quantite :".$key['quantite'];
echo"<br>";
echo"prix total :".$key['prix_total'];
echo"<br>";
echo"reference de la facture :".$key['ref_facture'];
echo"<br>";
echo"identifiant client :".$key['id_client'];
echo"<br>";




}