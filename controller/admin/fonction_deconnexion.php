<?php
	function deconnexion ($path)
	{
		session_unset();
		echo "$path";
		//header('Location:vues/client.php');
		header('Location:index.php?uc=client');
	}
?>