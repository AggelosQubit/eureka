<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php
include("../connexion.php");
include("../css/table.css");	   
$reponse = mysql_query("SELECT * FROM `eur_demandes`");	
				echo"
				 <table id='table_css'>
					<tr>
						<th id='th_ad'>idClient</th>
						<th id='th_ad'>ref_demande</th>
						<th id='th_ad'>Nature demande</th>
						<th id='th_ad'>Description demande</th>
						<th id='th_ad'>frequence</th>
						<th id='th_ad'>date demande</th>
						<th id='th_ad'>date upload</th>
						<th id='th_ad'>date download</th>
						<th id='th_ad'>Email du contacte</th>
						<th id='th_ad'>Statut de demande</th>
					</tr>
			";			
	  $compteur=1;
	while($row = mysql_fetch_array($reponse)) { 
	$tr="";
	if($compteur%2==1)
	$tr="<tr class='alt'>";
	else 
	$tr ="<tr>";
	$compteur++;
/* on affiche la ligne dans le tableau */
	echo"
			$tr
				<td>$row[idClient]</td>
				<td>$row[ref_demande]</td>
				<td>$row[nat_demande]</td>
				<td>$row[descrip_demande]</td>
				<td>$row[freq_demande]</td>
				<td>$row[date_demande]</td>
				<td>$row[date_upload]</td>
				<td>$row[date_download]</td>
				<td>$row[emailC]</td>
				<td>$row[statut_demande]</td>
				
			</tr>";
			}
			
			echo"</table>";
				
		mysql_close();
	
?>
<body>
</body>
</html>
