<?php

function estConnecte(){
  return isset($_SESSION['id']);
  
}

/*function connecter($id,$nom,$prenom){
	$_SESSION['id']= $id; 
	$_SESSION['nom']= $nom;
	$_SESSION['prenom']= $prenom;
}
/**
 * Détruit la session active
 */
function deconnecter(){
	session_destroy();
}

function affichage_infos($name, $ordre, $critere)
	{
		$DB_login = "dbown_eureka";  $DB_pass = "F0rdb_eureka";
		$DB_host = "92.222.7.87";  $DB_select = "db_eureka";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		mysql_query("SET NAMES 'utf8'");
		$reponse = mysql_query("SELECT statut, id, forme, raison, nom, prenom, email, tel, portable, fax ,date_inscription FROM eur_users $critere ORDER BY $name $ordre");

// on récupère les valeurs des attributs dans un tableau	   
				echo"
				 <table id='table_css'>
					<tr>
						<th id='th_ad'>Statut</th>
						<th id='th_ad'>Forme juridique</th>
						<th id='th_ad'>Raison sociale</th>
						<th id='th_ad'>Nom du contact</th>
						<th id='th_ad'>Prénom du contact</th>
						<th id='th_ad'>E-mail du contact</th>
						<th id='th_ad'>Téléphone du contact</th>
						<th id='th_ad'>Portable du contact</th>
						<th id='th_ad'>Fax du contact</th>
						<th id='th_ad'>Date d'inscription</th>
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
				<td>$row[statut]</td>
				<td>$row[forme]</td>
				<td>$row[raison]</td>
				<td>$row[nom]</td>
				<td>$row[prenom]</td>
				<td>$row[email]</td>
				<td>$row[tel]</td>
				<td>$row[portable]</td>
				<td>$row[fax]</td>
				<td>$row[date_inscription]</td>
				
			</tr>";
			}
			
			echo"</table>";
				
		mysql_close();
	}	