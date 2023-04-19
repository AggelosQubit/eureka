<?php
	//session_start();
	
	include("controle_acces_page.php");

/* affichage de l'en_tête et du titre de la page */
	//enTete("", "../css/default");
	//include("../includes/header.php");
	//header_aff("Affichage des factures", "..");

/* déclaration des variables de sessions du fichier config.php pour les requêtes */

	/*$_SESSION['dbname']=$dbname;
	$_SESSION['dbuser']=$dbuser;
	$_SESSION['numport']=$numport;*/

	/*$login = $_SESSION['login'];
	$mdp = $_SESSION['password'];*/
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 strict//EN">
<html>
	<head>
		<title>Administration - Accueil</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="/styles/commun.css" rel="stylesheet" type="text/css" />
		<link href="/styles/style.css" rel="stylesheet" type="text/css" />
		<link href="/styles/menu.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/js/suggestions.php"></script>
		<!--<script type="text/javascript" src="/js/news.js"></script>-->
	
		
	</head>
	
	<body>
<?php
			echo "
				<div id='intro'><br/> 
					<form action='index.php?uc=admin&ca=demandes' method='post'>
						<p>
							Trier par :
								<select name='form1'>
									<option value = 'stat1'>Client</option>
									<option value='stat2'>Prospect</option>
									<option value='stat3'>Abonné newsletter</option>
								</select>
							Raison sociale : 
								<input type='text' name='rai' />
								<input type='submit' value='Valider' />
						</p>
					</form>
				</div>
			";

/* affichage de l'en_tete du tableau */

			echo("
				<h1 id='titre2'>Gestion des demandes</h1><br/><br/>
				<table id='oeuvre'>
					<tr>
						<th id='th_ad'>Raison sociale</th>
						<th id='th_ad'>Référence de la demande</th>
						<th id='th_ad'>Nature du service demandé</th>
						<th id='th_ad'>Description de la demande</th>
						<th id='th_ad'>Fréquence de la demande</th>
						<th id='th_ad'>Statut</th>
                                                <th id='th_ad'>Date Demande</th>
                                                <th id='th_ad'>Date Upload</th>
                                                <th id='th_ad'>Date Download</th>
						<th id='th_ad'>Actions</th>
					</tr>
			");

			/*$value = $_POST['form1'];
			$rai = $_POST['rai'];
			echo $_POST['rai'];
			echo $_POST['form1'];*/
			if((!isset($_POST['form1'])) && (!isset($_POST['rai'])))
			{
				affichage_infos_dem('', '', '');
			}
			else
			{
				
				$value = $_POST['form1'];
				$rai = $_POST['rai'];

				if ( ( !isset($value) | ($value == "") ) && ( !isset($rai) | ($rai == "") ) )
				{
					affichage_infos_dem('asc', '');
				}
				if ( !isset($rai) | ($rai == ""))
				{ // cas de base pas numéro de semaine
					if ($value == 'stat1')
					{
						affichage_infos_dem('asc', 'statut = ' . "'Client'");
					}
					else if ($value == 'stat2')
					{
						affichage_infos_dem('asc', 'statut = ' . "'Prospect'");
					}
					else if($value == 'stat3')
					{
						affichage_infos_dem('asc', 'statut = ' . "'Abonné newsletter'");
					}
				}
				else
				{ // il y a num semaine et value
					if ($value == 'stat1')
					{
						if (is_numeric($rai))
						{
							echo "<p class='erreur'>La raison sociale n'est pas un entier !</p>";
							affichage_infos_dem('asc', '');
						} 
						else
						{
							affichage_infos_dem('asc', 'raison LIKE ' . "'%$rai%'" . 'AND statut = ' . "'Client'");
						}
					}
					else if ($value == 'stat2')
					{
						if (is_numeric($rai))
						{
							echo "<p class='erreur'>La raison sociale n'est pas un entier !</p>";
							affichage_infos_dem('asc', '');
						} 
						else
						{
							affichage_infos_dem('desc', 'raison LIKE ' . "'%$rai%'" . 'AND statut = ' . "'Prospect'");
						}
					}
					else if ($value == 'stat3')
					{
						if (is_numeric($rai))
						{
							echo "<p class='erreur'>La raison sociale n'est pas un entier !</p>";
							affichage_infos_dem('asc', '');
						} 
						else
						{
							affichage_infos_dem('desc', 'raison LIKE ' . "'%$rai%'" . 'AND statut = ' . "'Abonné newsletter'");
						}
					}
				}
			}
			
			/*if ($value == 'nom_asc')
			{
				affichage_infos('nom', 'asc');
			}	
			else if ($value == 'nom_desc')
			{
				affichage_infos('nom', 'desc');
			}
			else
			{ // il y a num semaine et value
				if ($value == 'nom_asc')
				{
					if (is_numeric($rai))
					{
						echo "<p class='erreur'>La raison sociale n'est pas un entier !</p>";
						affichage_infos('nom', 'asc');
					} 
					else
					{
						affichage_infos('nom', 'asc', 'AND raison = '.$rai);
					}
				}
				else if ($value == 'nom_desc')
				{
					if (is_numeric($rai))
					{
						echo "<p class='erreur'>La raison sociale n'est pas un entier !</p>";
						affichage_infos('nom', 'asc');
					} 
					else
					{
						affichage_infos('nom', 'desc', 'AND raison = '.$rai);
					}
				}
			}*/
			
			echo("</table>");
?>

			
		</div>
	</body>
</html>
