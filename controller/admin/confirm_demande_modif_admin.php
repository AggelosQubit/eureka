<?php
include("../include/fonctions_liste.php");
include("../connexion.php");
if(!isset($_SESSION))
{
    session_start();
}
$idcli = $_SESSION['id'];
$mail = $_SESSION['email'];
$ref= $_POST['ref'];
echo $ref ;
$description = $_POST['comments'];
$natu = $_POST['nature'];
$fre = $_POST['frequence'];
$service = getIdNature($natu);
$date = date("Y-m-d H:i:s");

$resultat = mysql_query ("SELECT ref_demande FROM eur_demandes WHERE ref_demande=$ref");
	$resultaVerif = mysql_num_rows($resultat);
	if(($resultaVerif!=0)){	
			$requette="UPDATE eur_demandes SET `nat_demande`= '$natu',
												`descrip_demande`= '$description',
												`freq_demande`= '$fre',
												`date_demande`= '$date'
										  WHERE `ref_demande`= $ref";



			$result=mysql_query($requette);     
			if( $result){
					echo"<script language='JavaScript'>
				 	alert('modification reussite.');
				 	window.location.replace('afficher_demande.php');
					</script>";
			}
			}else{
			echo"<script language='JavaScript'>
				 	alert('erreur de modification.');
				 	window.location.replace('afficher_demande.php');
					</script>";
			
			}




mysql_close();

?>
