<?php

/* script cron qui doit etre active tout les 1er du mois qui parcourt la table eur_facture  et etabli si besoin une facture pour chaque mois 



  rajouter une colonne a la table eur_facture qui indique combien de facture reste il 
  6 pour semestrielle
  3 pour trimestre 
  12 pour annuel
  1 pour mensuel
  1 pour imeediate 
  1 pour hebdomadaire


  */

include("MysqlDao.php");
include("../setup.php");
$dao = new MysqlDao;   


$liste=$dao->recupererListeFacture();
foreach ($liste as $key ) {


	if ($key['facture_restante']>0){

		
		$ref_demande=$key['ref_demande'];
		$nat_demande=$key['nat_demande'];
		$mois_demande=$key['$mois_demande'];
		$prix_total=$key['prix_total'];
		$id_client=$key['id_client'];
		$raison=$key['raison'];
		$ref_facture=$key['ref_facture'];
		$facture_restante=$key['facture_restante']-1;



	}

}
