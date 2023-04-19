<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
include("../../connexion.php");
	$stat = $_POST['statuts'];
    $form = $_POST['formes_juridiques'];
    $rais = $_POST['raison_sociale'];
    $nomc = $_POST['nom_contact'];
    $prenc = $_POST['prenom_contact'];
    $mailc = $_POST['email_contact'];
    $telc = $_POST['tel_contact'];
    $portc = $_POST['port_contact']; 
    $faxc = $_POST['fax_contact'];
	

$requette="UPDATE eur_users SET statuts= '$stat', formes_juridiques = '$form', raison_sociale = '$rais' , nom_contact = '$nomc'	
											, prenom_contact = '$prenc', email_contact = '$mailc', tel_contact= '$telc'
												, port_contact = '$portc', fax_contact = '$faxc'  where email_contact='$mailc'";
$result=mysql_query($requette);     
if( $result){
echo"modification reussite";

}else {
echo"pas de modification";
}


?>

<body>
</body>
</html>
