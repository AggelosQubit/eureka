<?php

	//include("../../../includes/en_tete.php");

	include("controle_acces_page.php");

	//enTete("","../../../css/default");

	//include("../../../includes/header.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 strict//EN">
<html>
	<head>
		<title>Administration - Préférences du compte</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link href="/styles/commun.css" rel="stylesheet" type="text/css" />
		<link href="/styles/style.css" rel="stylesheet" type="text/css" />
		<link href="/styles/menu.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/js/suggestions.php"></script>
		<!--<script type="text/javascript" src="/js/news.js"></script>-->
	
		
	</head>
	
	<body>
		<div id='form_cf_ies_cfg'>
				<form action='index.php?uc=admin&ca=valid' method='post' name='form_cf_ies' id="modif1">
					<h2>Modification du mot de passe</h2><br/>
					<h3 id="intro">Vous pouvez modifier votre mot de passe à volonté.</h3><br/>
					<table>
						<tr><td>Mot de passe : </td>
						<td><input type='password' name='password' size=30></td></tr>
						<tr><td>Confirmez votre mot de passe : </td>
						<td><input type='password' name='confirm_password' size=30></td></tr>
					</table><br/>
					<input type='submit' value='Mettre à jour' id="enreg2"/>
				</form>
			</div>
			
			
		</div>
	</body>
</html>