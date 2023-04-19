<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 strict//EN">
<html>
	<head>
		<title></title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="/styles/commun.css" rel="stylesheet" type="text/css" />
		<link href="/styles/style.css" rel="stylesheet" type="text/css" />
		<link href="/styles/menu.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/js/suggestions.php"></script>
		<script type="text/javascript" src="/js/news.js"></script>
		
	</head>
<?php
	/*$login = $_SESSION['mail'];
	$mdp = $_SESSION['pw'];*/
	//include("fonctions_liste.php");
	//include("controle_acces_page.php");
?>
	<aside>
		<div id="menu">	
			<div style="text-align:left; font-style:bold; margin-left:5px; margin-top:5px;"><strong>MENU</strong></div>
				<div style="text-align:left; font-style:bold; margin-bottom:5px; margin-top:10px;margin-left:5px;"><strong> Compte </strong></div>    
					<a href="index.php?uc=admin&ca=accueiladmin" style="margin-left:15px;">Accueil</a><br/>
					<a href="index.php?uc=deconnexion" style="margin-left:15px;">Déconnexion</a>
			<div id="Compte">
				<div style="text-align:left;font-style:bold;margin-bottom:5px;margin-top:10px;margin-left:5px;"><strong>Configuration</strong></div>
					<a href="index.php?uc=admin&ca=configcompte" style="margin-left:15px;"> Paramètres du compte</a><br/>		
					<a href="index.php?uc=admin&ca=configcontact" style="margin-left:15px;">Préférences de contact</a><br/>
					<a href="index.php?uc=admin&ca=demandes" style="margin-left:15px;">Liste des demandes</a><br/>
			</div>
		</div>
	</aside>
	

