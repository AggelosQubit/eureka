<?php
include("../include/MysqlDao.php");
include("../setup.php");
$dao = new MysqlDao;   

$ref=$_GET['ref'];

$facture=$dao->facture_detaille($ref);


if ($facture){

	foreach ($facture as $key) {


echo"<h1>";
echo"Facture  :".$key['ref_demande'];
echo"</h1>";
echo"Identifiant de la personne :".$key['id'];
echo"<br>";
echo"Raison :".$key['raison'];
echo"<br>";
echo"Nature de la demande :".$key['nat_demande'];
echo"<br>";
echo"Date de la demande :".$key['mois_demande'];
echo"<br>";
echo"quantite :".$key['quantite'];
echo"<br>";
echo"prix total :".$key['prix_total'];
echo"<br>";


}
}
else {

echo"pas encore de facture cree";
}


