<?php
//require('connexion.php');
include ('../include/MysqlDao.php');
include('../setup.php');
$dao = new MysqlDao;
if(isset($_POST['ref_facture'])){
$ref_facture=$_POST['ref_facture'];
}
else if(isset($_GET['ref_facture'])){
$ref_facture=$_GET['ref_facture'];
}
else echo" Une erreur s'est produite";



$facture=$dao->Recuperer_Facture_Par_Refacture($ref_facture);

    foreach ($facture as $key1) {
        $nat_demande=$key1['nat_demande'];
        $idClient=$key1['id_client'];
        $raisonuser=$key1['raison'];
        $ref=$key1['ref_demande'];
        if(isset($key1['date_facture'])){
        $date_facture=$key1['date_facture'];
            }
    $infos=$dao->rechercherInfos($ref);

    foreach ($infos as $key) {

    $idClient=$key['idClient'];
    $freq_demande=$key['freq_demande'];
    $date_demande=$key['date_demande'];
    }
    $infos_users=$dao->recupererInfosClientsParId($idClient);
    if ($infos_users){
        
    foreach ($infos_users as $key3){

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

if (isset($date_facture)) {
    echo "date de la facture :".$date_facture;
    echo"<br>";}
echo"Facture no  :".$ref_facture;
echo"<br>";
echo"reference de la demande  :".$ref;
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
    echo"<br>";
    echo"<br>";

}


                             