<?php


include ('../include/MysqlDao.php');
include('../setup.php');
$dao = new MysqlDao;


print_r($_POST);


$ref=$_POST['ref'];
$nat_demande=$_POST['nat_demande'];
$idClient=$_POST['idClient'];
$freq_demande=$_POST['freq_demande'];
$date_demande=$_POST['date_demande'];
$prix=$_POST['prix'];
$raison=$_POST['raison'];
$facture_restante=$_POST['f_restante'];

$Facture=$dao->Creerfacture($ref,$nat_demande,$idClient,$freq_demande,$date_demande,$prix,$raison,$facture_restante);


if($Facture){

echo"<script language='JavaScript'>
     				alert('modification effectue.');
    				window.location.replace('afficher_demande.php');
   					</script>";
					
		
					}


else 
echo"<script>alert ('Erreur');</script> ";



?>
