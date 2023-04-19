
<?php
if (!isset($_SESSION)) {
    session_start();
}
// Ce script sert a pouvoir changer le statut de demande et si le statut passe a traite alors la facturation se fait automatiquement 


include("../include/MysqlDao.php");
include('../setup.php');
$dao = new MysqlDao;


$idstatut=$_SESSION['idstatut'];
$refstatut=$_SESSION['refstatut'];
$statutdemande=$_SESSION['statut'];


$modification_du_statut=$dao->modifierstatut($statutdemande,$refstatut);

$infos=$dao->rechercherInfos($refstatut);

foreach ($infos as $key) {
$nat_demande=$key['nat_demande'];
$idClient=$key['idClient'];
$freq_demande=$key['freq_demande'];
$date_demande=$key['date_demande'];
}
$infos_users=$dao->recupererInfosClientsParId($idClient);
if ($infos_users){
foreach ($infos_users as $key3){
$raison = $key3['raison'];
$statut = $key3['statut'];
$forme = $key3['forme'];
$nom = $key3['nom'];
$prenom = $key3['prenom'];
$email = $key3['email'];
$tel = $key3['tel'];
$portable = $key3['portable'];
$fax = $key3['fax'];


}
$f_restante=$dao->definir_facture_restante($freq_demande);

}

$prix = $dao->rechercherTarif($nat_demande);
foreach ($prix as $key2) {
$prix=$key2['prix'];
}
// voir si une facture est deja dispoo pour cette ref 
$facture_dispo=$dao->facture_detaille($refstatut);

//si le statut est passe a 'traité' est qui n'y a pas de facture alors on la creer 
if(($statutdemande=='Valide')&&(!$facture_dispo)){
$Facture=$dao->Creerfacture($refstatut,$nat_demande,$idClient,$freq_demande,$date_demande,$prix,$raison,$f_restante);


	if($Facture){
		echo"<script language='JavaScript'>
	     				alert('modification effectue et la facture a ete crée.');
	    				window.location.replace('afficher_demande.php');
	   					</script>";
	}
	else echo"<script language='JavaScript'>
						alert('modification effectue par contre la facture n'a pas ete crée);
						</script> ";

	}
else  echo"<script language='JavaScript'>
		     				
		    				window.location.replace('afficher_demande.php');
		   					</script>";




?>

