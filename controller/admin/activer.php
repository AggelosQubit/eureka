<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>


<?php

if (!isset($_SESSION)) {
    session_start();
}
include("../include/MysqlDao.php");
include('../setup.php');
$dao = new MysqlDao;

$_SESSION['idstatut']=$_POST['id'];
$_SESSION['refstatut']=$_POST['ref'];
$_SESSION['statut']=$_POST['statut']; 
echo "voulez vous changer le statut no '".$_SESSION['refstatut'] ."' a ".$_SESSION['statut']." ?"; 
echo"<br>";

echo"<form method='post'action='changerstatut.php'>";




echo"<input type='submit' name='soumettre' onclick='this.form.action=changerstatut.php'>";
echo"<br>";




echo"</form>";
			/*$result=$dao->activer($ref);																		
			    
			if($result){
					header('Location:../admin/afficher_demande.php');
					}else{
					echo"<script language='JavaScript'>
     				alert('echec de modification.');
    				window.location.replace('afficher_demande.php');
   					</script>";
					}
					*/
					//$dao->activer($ref);


		
?>

<body>
</body>
</html>
