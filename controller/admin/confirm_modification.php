<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
include("../connexion.php");
	$stat = $_POST['statuts'];
    $form = $_POST['formes_juridiques'];
    $rais = $_POST['raison_sociale'];
    $nomc = $_POST['nom_contact'];
    $prenc = $_POST['prenom_contact'];
    $mailc = $_POST['email_contact'];
    $telc = $_POST['tel_contact'];
    $portc = $_POST['port_contact']; 
    $faxc = $_POST['fax_contact'];


$resultat = mysql_query ("SELECT email FROM eur_users WHERE email ='$mailc'");
	$resultaVerif = mysql_num_rows($resultat);
	if(($resultaVerif!=0)){	

			$requette="UPDATE eur_users SET statut= '$stat', forme = '$form', raison = '$rais' , nom = '$nomc'	
														, prenom = '$prenc', tel= '$telc'
															, portable= '$portc', fax = '$faxc'  where email='$mailc'" ;
																									
			$result=mysql_query($requette);     
			if( $result){
					echo"<script language='JavaScript'>
				 	alert('modification reussite.');
				 	window.location.replace('admin.php');
					</script>";
					}else{
					echo"<script language='JavaScript'>
     				alert('echec de modification.');
    				window.location.replace('modifier.php');
   					</script>";
					}
		}
				else{		 
				echo"<script language='JavaScript'>
     			alert('Email non existant.');
    			window.location.replace('admin.php');
   				</script>";
			
					}
?>

<body>
</body>
</html>
