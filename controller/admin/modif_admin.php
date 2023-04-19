<?php
	function modif_compte_3($reponse, $raison_sociale, $nom_contact, $prenom_contact, $fist, $tel_contact, $portable_contact, $fax_contact, $new_password, $raison)
	{
		mysql_connect("92.222.7.87", "dbown_eurekaint", "F0rdb_eurekaint" );
		mysql_select_db("db_eurekaint");
		mysql_query("SET NAMES 'utf8'");
		$reponse = mysql_query("UPDATE eur_users SET forme = '$reponse', raison = '$raison_sociale', nom = '$nom_contact', prenom = '$prenom_contact',
								tel = '$tel_contact', portable = '$portable_contact', fax = '$fax_contact', password = '$new_password' WHERE email = '$fist'");
		mysql_query("UPDATE eur_services SET raison = '$raison_sociale'");
		if ($reponse)
		{
			rename("../intranet/files/$raison/", "../intranet/files/$raison_sociale/");
			$raison="";
			print "
				<script language='JavaScript'>
					alert('Les paramètres du compte ont été correctement modifiés.');
					window.location.replace('admin.php');
				</script>
			";
		}
		else
		{
			print "
				<script language='JavaScript'>
					alert('Erreur de connexion à la base Mysql : merci de ré-essayer ultérieurement.');
					window.location.replace('config_contact_2.php');
				</script>
			";
		}
		mysql_close(); // Déconnexion de MySQL  
	}
?>