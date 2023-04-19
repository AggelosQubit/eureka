<?php
	function verif_mdp($login, $password)
	{
		mysql_connect("92.222.7.87", "dbown_eurekaint", "F0rdb_eurekaint" );
		mysql_select_db("db_eurekaint");
		$reponse = mysql_query("SELECT email, password, raison FROM eur_users WHERE email = '$login'");
		$ad = mysql_query("SELECT password FROM eur_users WHERE email = 'admin'");
		if ($reponse)
		{
// si la requête a fonctionné
			$nb_tuples = mysql_num_rows($reponse);
			if ($nb_tuples < 1)
			{
// pas de pseudo dans la base
				print "
					<p class='erreur'>
						<script language='JavaScript'>
							alert('Mot de passe incorrect. Merci de recommencer.');
							window.location.replace('client.php');
						</script>
				";
				$password="";
				$login = "";
			}
			$indicateur_tuple = 0;
			while ($nb_tuples > $indicateur_tuple)
			{
// on récupère les valeurs des attributs dans un tableau	   
				$tuple = mysql_fetch_row($reponse, $indicateur_tuple);
				if ($tuple)
				{
// si il n'y a pas d'erreur
					if ($tuple[0] == "admin" && $tuple[1] == $password)
					{
						$_SESSION['login'] = $tuple[0];
						$_SESSION['password'] = $tuple[1];
						header('Location: /admin/admin.php');
						exit;
					}
					else if ($tuple[1] == $password)
					{
// si mdp correct
						$_SESSION['login'] = $tuple[0];
						$_SESSION['password'] = $tuple[1];
						$_SESSION['id'] = $tuple[2];
						header('Location: accueil.php');
						exit;
					}
					else
					{
						print "
							<p class='erreur'>
								<script language='JavaScript'>
									alert('Mot de passe incorrect. Merci de recommencer.');
									window.location.replace('client.php');
								</script>
						";
						$password="";
						$login = "";
					}
				}
				else
				{
// si il y a une erreur
					print "
						<p class='erreur'>
							<script language='JavaScript'>
								alert('Mot de passe incorrect. Merci de recommencer.');
								window.location.replace('client.php');
							</script>
					";
					$password="";
					$login = "";
				}
				$indicateur_tuple++;
			} //fin du while
		} //fin if ($res)
		mysql_close();
	}
?>