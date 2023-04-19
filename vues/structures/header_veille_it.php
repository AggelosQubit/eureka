<?php
include '../setup.php';
?>
<!DOCTYPE HTML >
<html>
	<head>
		<title>Veille-IT - Accueil</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="/styles/commun.css" rel="stylesheet" type="text/css" />
		<link href="/styles/style.css" rel="stylesheet" type="text/css" />
		<link href="/styles/menu.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/js/suggestions.php"></script>
		<script type="text/javascript" src="/js/news.js"></script>
  
		<script language="JavaScript">
			function ChangeMessage(message,champ)
			{
				if(document.getElementById)
					document.getElementById(champ).innerHTML = message;
			}
		</script>
		
		
	</head> 
	
	<body>
		<div id="conteneur">
			<div id="bandeau">
                            <div id="logo"><a href="index_veille_it.php" title="Présentation d'Eureka" ><img src="/images/logo_vit.png" alt="Légende du logo" /></a></div>
			</div>
			
			<div id="nav_1">
				<ul>
                                    <li><a href="index_veille_it.php" title="Présentation d'Eureka" id="menu_a1"><img src="/images/cap.jpg" id="menu1"/></a></li>
                                    <li><a href="offre_services_veille_it.php" title="Nos activités" id="menu_a2"><img src="/images/vit_os.jpg" id="menu2"/></a></li>
					<li><a href="client.php" title="Votre espace dédié" id="menu_a3"><img src="/images/cap3.jpg" id="menu3"/></a></li>
					<li><a href="contact.php" title="Contacter Eureka (nos adresses email...)" id="menu_a4"><img src="/images/vit_contact.jpg" id="menu4"/></a></li>
				</ul>
			</div>
			
			<div id="news">
				<script type="text/javascript">

//new pausescroller(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds)

					new pausescroller(pausecontent, "pscroller1", "someclass", 3000)
				</script>
			</div>
			
			<aside>
				<p>Un service de :</p><br/><br/>
				<a href="/"><img src="/images/logo.png" alt="Légende du logo" /></a><br/><br/><br/>
				<p>C'est aussi :</p><br/>
                                <a href="index_formation.php"><img src="/images/logo_cf.png" alt="Légende du logo" /></a><br/><br/><br/>
                                <a href="index_sourcing_rh.php"><img src="/images/logo_srh.png" alt="Légende du logo" /></a>
			</aside>