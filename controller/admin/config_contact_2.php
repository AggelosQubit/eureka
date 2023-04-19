    <?php

	//include("../includes/en_tete.php");*/

	include("fonctions_liste.php");
	include("controle_acces_page.php");

	/*enTete("", "../css/default");
	header_aff("Gestion des clients", "..");*/

	if (!isset($_SESSION))
	{
		session_start(); // ici on continue la session
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 strict//EN">
<html>
	<head>
		<title>Administration - Modifier</title>
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
		
		

<?php
	$fist = $_POST['fist'];
	$raison = $_POST['raison'];
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$tel = $_POST['tel'];
	$portable = $_POST['portable'];
	$fax = $_POST['fax'];
?>

	</head> 
	
	<body>
		
			<?php
			
			
			/*<aside>
				<div id="menu">	
					<div style="text-align:left; font-style:bold; margin-left:5px; margin-top:5px;"><strong>MENU</strong></div>
						<div style="text-align:left; font-style:bold; margin-bottom:5px; margin-top:10px;margin-left:5px;"><strong> Compte </strong></div>    
							<a href="admin.php" style="margin-left:15px;">Accueil</a><br/>
							<a href="deconnexion.php" style="margin-left:15px;">Déconnexion</a>
					<div id="Compte">
						<div style="text-align:left;font-style:bold;margin-bottom:5px;margin-top:10px;margin-left:5px;"><strong>Configuration</strong></div>
							<a href="config_compte.php" style="margin-left:15px;"> Paramètres du compte</a><br/>		
							<a href="config_contact.php" style="margin-left:15px;">Préférences de contact</a><br/>
							<a href="demandes.php" style="margin-left:15px;">Liste des demandes</a><br/>
					</div>
				</div>
			</aside>*/
			?>
			<div>
				
<?php
				echo("
					<form action='index.php?uc=admin&ca=valid3' method='post' id='modif2'>
						<h1 id='titre3'>Modification des param�tres du compte</h1><br/>
						<table id='maj'>
							<tr><td>Forme juridique (*) : </td>
							<td>
				");
				recherche_forme();
				echo("
							</td></tr><br/>
							<tr><td>Raison Sociale selon Kbis (ou Nom) (*) : </td>
							<td><input type='text' name='raison_sociale' value='$raison'></td></tr>
							<tr><td>Nom du contact (*) : </td>
							<td><input type='text' name='nom_contact' size=30 value='$nom'></td></tr>
							<tr><td>Prénom du contact (*) : </td>
							<td><input type='text' name='prenom_contact' size=30 value='$prenom'></td></tr>
							<tr><td>Tél. du contact : </td>
							<td><input type='text' name='tel_contact' size=30 value='$tel'></td></tr>
							<tr><td>Portable du contact : </td>
							<td><input type='text' name='port_contact' size=30 value='$portable'></td></tr>
							<tr><td>Fax du contact : </td>
							<td><input type='text' name='fax_contact' size=30 value='$fax'></td></tr>
							<tr><td>Mot de passe (*) : </td>
							<td><input type='text' name='new_password' size=30></td></tr>
							<tr><td>Confirmez votre mot de passe (*) : </td>
							<td><input type='text' name='confirm_new_password' size=30></td></tr>
							<input type='hidden' name='fist' value='$fist' id='fist'/>
							<input type='hidden' name='raison' value='$raison' id='fist'/>
						</table><br/>
						<input type='submit' value='Mettre à jour' id='enreg3'/>
					</form>
				");
?>
				
			</div>
			
			
		</div>
	</body>
</html>