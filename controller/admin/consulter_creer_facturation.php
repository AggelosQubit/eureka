<?php
//require('connexion.php');
include ('../include/MysqlDao.php');
include('../setup.php');
$dao = new MysqlDao;


$ref=$_POST['ref'];

$infos=$dao->rechercherInfos($ref);

foreach ($infos as $key) {
$nat_demande=$key['nat_demande'];
$idClient=$key['idClient'];
$freq_demande=$key['freq_demande'];
$date_demande=$key['date_demande'];
}
$infos_users=$dao->recupererInfosClientsParId($idClient);
if ($infos_users){
foreach ($infos_users as $key3){
$raisonuser = $key3['raison'];
$statut = $key3['statut'];
$forme = $key3['forme'];
$nom = $key3['nom'];
$prenom = $key3['prenom'];
$email = $key3['email'];
$tel = $key3['tel'];
$portable = $key3['portable'];
$fax = $key3['fax'];


}

}




echo"Facture  :".$ref;
echo"<br>";
echo"Nature de la demande :".$nat_demande;
echo"<br>";
if (isset($raisonuser)) {
    echo "Raison :".$raisonuser;
    echo"<br>";
}
if (isset($statut)) {
    echo "Statut :".$statut;
    echo"<br>";
}
if (isset($forme)) {
    echo "Forme :".$forme;
    echo"<br>";
}
if (isset($nom)) {
    echo $nom;
    echo"&nbsp";
}
if (isset($prenom)) {
    echo $prenom;
    echo"<br>";
}
if (isset($tel)) {
    echo "Tel :".$tel;
    echo"<br>";
}
if (isset($portable)) {
    echo "Portable :".$portable;
    echo"<br>";
}

if (isset($fax)) {
    echo "Fax :".$fax;
    echo"<br>";
}
echo"identifiant client :".$idClient;
echo"<br>";
echo"Frequence demande :".$freq_demande;
echo"<br>";
echo"Date de la demande :".$date_demande;
echo"<br>";


$prix = $dao->rechercherTarif($nat_demande);
foreach ($prix as $key2) {
$prix=$key2['prix'];

}
	echo"Prix du service :".$prix;
	echo"<br>";
$f_restante=$dao->definir_facture_restante($freq_demande);


echo'<form method="post" action="../admin/creer_facturation.php">
	<input type="hidden" name="ref" value='.$ref.'>
	<input type="hidden" name="nat_demande" value='.$nat_demande.'>
	<input type="hidden" name="idClient" value='.$idClient.'>
	<input type="hidden" name="freq_demande" value='.$freq_demande.'>
	<input type="hidden" name="date_demande" value='.$date_demande.'>
	<input type="hidden" name="prix" value='.$prix.'>
    <input type="hidden" name="raison" value='.$raisonuser.'>
     <input type="hidden" name="f_restante" value='.$f_restante.'>
</br>
</br>

	<input type="submit" name="creer" value="enregistrer la facture" />';
                             