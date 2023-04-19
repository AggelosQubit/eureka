<?php

	//include("../includes/en_tete.php");

	include("fonctions_liste.php");
	include("controle_acces_page.php");

	/*enTete("", "../css/default");
	header_aff("Gestion des clients", "..");*/

	if ( !isset($_SESSION))
	{
		session_start(); // ici on continue la session
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 strict//EN">
<html>
	<head>
		<title>Administration - Préférences de contact</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link href="/styles/commun.css" rel="stylesheet" type="text/css" />
		<link href="/styles/style.css" rel="stylesheet" type="text/css" />
		<link href="/styles/menu.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/js/suggestions.php"></script>
		<!--<script type="text/javascript" src="/js/news.js"></script>-->
  
		<script language="JavaScript">
			function ChangeMessage(message,champ)
			{
				if(document.getElementById)
					document.getElementById(champ).innerHTML = message;
			}
		</script>
		
		
	</head> 
	
	<body>
			
			
			<div>
				
<?php
			
				echo("
					<form action='index.php?uc=admin&ca=valid2' method='post' id='modif2'>
						<h2>Modification des paramètres de votre compte</h2><br/>
						<h3 id='intro2'>Vous pouvez modfiier les informations de votre compte à volonté.</h3><br/>
						<table id='maj'>
							<tr><td>Forme juridique (*) : </td>
							<td>
				");
				recherche_forme();
				echo("
							</td></tr><br/>
							<tr><td>Raison Sociale selon Kbis (ou Nom) (*) : </td>
							<td><input type='text' name='raison_sociale'></td></tr>
							<tr><td>Nom du contact (*) : </td>
							<td><input type='text' name='nom_contact' size=30></td></tr>
							<tr><td>Prénom du contact (*) : </td>
							<td><input type='text' name='prenom_contact' size=30></td></tr>
							
							<tr><td>Tél. du contact : </td>
							<td><input type='text' name='tel_contact' size=30></td></tr>
							<tr><td>Portable du contact : </td>
							<td><input type='text' name='port_contact' size=30></td></tr>
							<tr><td>Fax du contact : </td>
							<td><input type='text' name='fax_contact' size=30></td></tr>
							<tr><td>Mot de passe (*) : </td>
							<td><input type='password' name='password' size=30></td></tr>
							<tr><td>Confirmez votre mot de passe (*) : </td>
							<td><input type='password' name='confirm_password' size=30></td></tr>
						</table><br/>
						<input type='submit' value='Mettre à jour' id='enreg3'/>
					</form>
				");
				
?>
				
			</div>
			
			
		</div>
	</body>
</html>
