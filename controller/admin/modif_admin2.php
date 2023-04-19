<?php
	function modif_compte_4($nat_service, $descrip, $frequence, $ref)
	{
		mysql_connect("92.222.7.87", "dbown_eurekaint", "F0rdb_eurekaint" );
		mysql_select_db("db_eurekaint");
		mysql_query("SET NAMES 'utf8'");
		$reponse = mysql_query("UPDATE eur_demandes SET nat_demande = '$nat_service', descrip_demande = '$descrip', freq_demande = '$frequence'
								WHERE ref_demande = '$ref'");
		if ($reponse)
		{
			print "
				<script language='JavaScript'>
					alert('La demande est modifiée.');
					document.location.href('index.php?uc=admin&ca=demandes');
				</script>
			";
                        //header('Location:index.php?uc=admin&ca=demandes');
                        
		}
		else
		{
			print "
				<script language='JavaScript'>
					alert('Erreur de connexion à la base Mysql : merci de ré-essayer ultérieurement.');
					document.location.href('index.php?uc=admin&ca=modifier');
				</script>
			";
                        header('Location:index.php?uc=admin&ca=modifier');
		}
		mysql_close(); // Déconnexion de MySQL  
	}
?>