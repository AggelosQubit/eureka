<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
include("../connexion.php");
    $mailc = $_POST['email_contact'];
    
	
$resultat = mysql_query ("SELECT email FROM eur_users WHERE email ='$mailc'");
	$resultaVerif = mysql_num_rows($resultat);
	if(($resultaVerif!=0)){
			$requette="DELETE FROM eur_users Where email='$mailc'" ;											
			$result=mysql_query($requette);     
					if($result){
						echo"<script language='JavaScript'>
     					alert('suppression  reussite.');
     					window.location.replace('admin.php');
    					</script>";

					}else {
							echo"<script language='JavaScript'>
     						alert('echec de suppresion.');
     						window.location.replace('supprimer.php');
    						</script>";
						  }
		}else{					echo"<script language='JavaScript'>
								 alert('Email non existant.');
								 window.location.replace('admin.php');
								</script>";
						}
		
?>
<body>
</body>
</html>
