<?php
//linareythen
include_once('vues/Vue.php');

class AccueillirClient extends Vue{


	public function contenu($data=array())
	{
		if (isset($_SESSION['login'])) 
		{
			echo 'BIENVENU';
			echo "\n";
			echo 'Votre login est '.$_SESSION['login'];
			echo '<br />';
		} else {
			echo 'Les variables ne sont pas déclarées.';
		}

		if (!isset($_SESSION['login'])) 
		{
  			echo"<script language='JavaScript'>
    				alert('erreur d'inscription veuillez ressayer.');
    				window.location.replace('../index.php?uc=client');
    			</script>";
		}


		include_once '../include/menuClient.html'; ?>
	}
}


