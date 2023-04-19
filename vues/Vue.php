<?php
class Vue {

	public function entete()
	{
		//session_start();
		echo'
		<!DOCTYPE html>
		<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
		<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
		<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
		<!--[if gt IE 8]><!--> 
		<html class="no-js"> <!--<![endif]-->
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				
				<title>Eureka</title>
				
				<link rel="shortcut icon" href="/eureka/web/images/logoEurShortcut.png">

				<link rel="stylesheet" type="text/css" href="/eureka/web/components/bootstrap/css/bootstrap.css" 			media="all"		/>
				<link rel="stylesheet" type="text/css" href="/eureka/web/style/main.css" 									media="all"		/>
				
				<!--oldCss-->
				<link rel="stylesheet" type="text/css" href="/eureka//web/components/bootstrap/css/oldCss/commun.css" 						/>
				<link rel="stylesheet" type="text/css" href="/eureka//web/components/bootstrap/css/oldCss/form.css" 		media="all"		/>  
				<link rel="stylesheet" type="text/css" href="/eureka//web/components/bootstrap/css/oldCss/menu.css" 		media="all"		/> 
				<link rel="stylesheet" type="text/css" href="/eureka//web/components/bootstrap/css/oldCss/table.css" 		media="all"		/>
				<link rel="stylesheet" type="text/css" href="/eureka//web/components/bootstrap/css/oldCss/menu.css"						/>
		        <link rel="stylesheet" type="text/css" href="/eureka//web/components/bootstrap/css/oldCss/style.css" 		media="screen"	/>
				<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">


		        <!--javascript/jquery-->

				<link rel="stylesheet" type="text/css" href="/eureka/web/components/jquery/jquery-ui.css" 		media="screen"	/>
				<script type="text/javascript" src="/eureka/web/components/jquery/jquery-1.10.2.js"></script>
				<script type="text/javascript" src="/eureka/web/components/jquery/jquery-ui.js"></script>


		        <script type="text/javascript" src="/eureka/web/components/bootstrap/js/bootstrap.js"></script>
		        <script type="text/javascript" src="/eureka/web/components/bootstrap/js/bootstrap-dropdown.js"></script>
		        <script type="text/javascript" src="/eureka/web/js/suggestions.php"></script>
				<script type="text/javascript" src="/eureka/web/components/allFunction.js"></script>
				<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
				
				<style>
  					.ui-menu{ 
  								width: 250px;
  								text-align:center;
  							}
				</style>
			</head>';
			if(!isset($_SESSION['statut']) || $_SESSION['statut']!="admin")
			{
				echo'<body id="haut" class="well container">';
			} else {
				echo'<body id="haut">';
			}
			 	echo'<div class="row well">
		            	<ul style="text-align:center;" class="nav nav-pills">
		            		<!--LOGO -->
		               		<li><a href="/eureka/rout/accueil/accueillir/null" 	title="Accueil"					><img src="/eureka/web/images/logo.png" 	alt="Légende du logo" 		/></a></li>
							

							<li><a href="/eureka/rout/accueil/accueillir/null"	title="Présentation d\'Eureka"	><img src="/eureka/web/images/cap.jpg"	alt="presentation Eureka"	/></a></li>
							<li><a href="/eureka/rout/activite/presenter/null" 	title="Nos activités"			><img src="/eureka/web/images/cap2.jpg"	alt="activites Eureka"		/></a></li>
							';
					if(isset($_SESSION['id']))
					{
						echo'<li><a href="/eureka/rout/eur_user/espaceclient/null" title="Votre espace dédié"		><img src="/eureka/web/images/cap3.jpg"	alt="inscription|connexion"	/></a></li>';						
					} else {
						echo'<li><a href="/eureka/rout/eur_user/connexion/null" 	 title="Votre espace dédié"		><img src="/eureka/web/images/cap3.jpg"	alt="inscription|connexion"	/></a></li>';
					}
						echo'<li><a href="/eureka/rout/contact/contacter/null" 					title="Contacter Nous!" 		><img src="/eureka/web/images/cap4.jpg" 	alt="contacter Eureka"		/></a></li>
						</ul>		
		            </div>';
	            

	}

	public function nav()
	{
		if(isset($_SESSION['statut']) && $_SESSION['statut']!="admin")
		{	echo'<div class="well col-md-3 ">
			 		<h3 style="text-align:center;">Menu Client</h3>
					<ul id="menuClient">
						<li>
							<a href="">Compte</a>
							<ul>
								<li><a href="/eureka/rout/eur_user/espaceclient/null">Accueil</a></li>
								<li><a href="/eureka/rout/eur_user/modifierclient/null" >Modifier les Donn&eacute;es du compte</a></li>
								<li><a href="/eureka/rout/eur_user/deconnexion/null">D&eacute;connexion</a></li>
							</ul>
						</li>
						<li>
							<a href="">Adh&eacute;sion</a>
							<ul>
								<li><a href="/eureka/rout/eur_demande/voirdemande/null">Mes demandes</a></li>
								<!--<li><a href="/eureka/rout/eur_demande/modifierdemande/null">Modifier Mes demandes</a></li>-->
							</ul>
						</li>
						<li>
							<a href="">Affaires</a>
							<ul>
								<li><a href="form_demandes.php">Formulaire de demande</a></li>
								<li><a href="facture.php">Mes factures</a></li>
							</ul>
						</li>
					</ul>
				</div>';
		} else {
				echo'<div class="row">
						<h3 class="col-md-offset-1 col-md-10 well" style="text-align:center;">Menu Admin</h3>
				 		<nav class="navbar btn-group-justified  navbar-inverse ">
							<a class="navbar-brand" href="/eureka/rout/eur_user/espaceclient/null">Donn&eacute;es Clients</a>
							<a class="navbar-brand" href="/eureka/rout/eur_demande/voirdemande/null">Demandes Clients</a>
							<a class="navbar-brand" href="/eureka/rout/eur_facture/voirfacture/null">Factures Clients</a>
							<a class="navbar-brand" href="/eureka/rout/eur_user/deconnexion/null">D&eacute;connexion</a>
						</nav>
					</div>';
		}
	}


	public function pied()
	{

    echo'      		
					<div class="well row">
						<ul class="nav nav-pills nav-justified col-md-12">
							<li><a id="opener1" style="text-decoration:none; cursor:pointer;">Mention L&eacute;gales 	</a></li>
							<li><a id="opener2" style=" cursor:pointer;">D&eacute;veloppement 	</a></li>
							<li><a id="opener3" style=" cursor:pointer;">Auteur 					</a></li>
							<li><a id="opener4" style=" cursor:pointer;"><i class="glyphicon glyphicon-copyright-mark"></i> Copyright 2015-2016 	</a></li>
							<li><a id="opener5" style=" cursor:pointer;">Lien Bidon 5   			</a></li>
							<li><a href="#haut" style=" cursor:pointer;">Vers le haut	</a></li>
						</ul>
					</div>


					<div id="dialog1" title="Mention L&eacute;gales" >
						<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the x icon.</p>
					</div>
					<div id="dialog2" title="D&eacute;veloppement">
						<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the x icon.</p>
					</div>
					<div id="dialog3" title="Auteur">
						<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the x icon.</p>
					</div>
					<div id="dialog5" title="Lien Bidon 5  ">
						<p>This is an animated dialog which is useful for displaying information. The dialog window can be moved, resized and closed with the x icon.</p>
					</div>

				

			</body>
		</html>';		
	}



	public static function erreur404($message)
	{
		$vue=new Vue();
		header("HTTP/1.0 404 Not Found");
		$vue->entete();
		echo "
		<h1>Page non trouvée. Oups!</h1>
		<p>Pas moyen de metre la main sur cette page... Vous êtes sur que l'url est la bonne ?</p>
		";
		if($_ENV['DEBUG']){
			echo "
				<h3>Message d'erreur :</h3>
				<p>".$message->getMessage()."</p>
				<pre>".
				$message->getTraceAsString()
				."</pre>	
			";
		} 
		$vue->pied();
	}

	public function contenu($data=array())
	{
		if(isset($_GET['deco']))
		{
			session_destroy();
			header("Location :/");	
		}
	}
}
?>