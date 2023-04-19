<?php
	function recherche_frequence()
	{
		$DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		$reponse = mysql_query("SELECT * FROM eur_frequences" );
		echo'<select name="frequence">';
		while ($donnees = mysql_fetch_array($reponse) )
		{
?>
     
			<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom']; ?></option>
     
<?php
		}
		echo'</select>';
		mysql_close(); // Déconnexion de MySQL
	}

	function recherche_nature()
	{
		$DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		$reponse = mysql_query("SELECT * FROM eur_tarifs");
		echo'<select name="nature">';
		while ($donnees = mysql_fetch_array($reponse) )
		{
?>
     
			<option value="<?php echo $donnees['nom_service']; ?>"><?php echo $donnees['nom_service']; ?></option>
     
<?php
		}
		echo'</select>';
		mysql_close(); // Déconnexion de MySQL
	}
	
	function recherche_forme()
	{
		$DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		$reponse = mysql_query("SELECT * FROM eur_formes_juridiques" );
		echo'<select name="reponse">';
		while ($donnees = mysql_fetch_array($reponse) )
		{
?>
     
			<option value="<?php echo $donnees['nom']; ?>"><?php echo $donnees['nom']; ?></option>
     
<?php
		}
		echo'</select>';
		mysql_close(); 
		// Déconnexion de MySQL
	}

	
	
/* fonction qui afficheune ligne du tableau récapitulatif, elle affiche également un formulaire contenant des champs cachés pour aller sur la page de la facture détaillée */

	function affichage_clients_tab ($statut, $reponse, $raison, $nom, $prenom, $email, $tel, $portable, $fax)
	{	
		
		echo("
			<tr>
				<td id='td_ad'>$statut</td>
				<td id='td_ad'>$reponse</td>
				<td id='td_ad'>$raison</td>
				<td id='td_ad'>$nom</td>
				<td id='td_ad'>$prenom</td>
				<td id='td_ad'>$email</td>
				<td id='td_ad'>$tel</td>
				<td id='td_ad'>$portable</td>
				<td id='td_ad'>$fax</td>
				
				<td id='td_ad'>
					<form action='modifier.php' method='post'>
						<div>
							<input type='hidden' name='statut' value='$statut' />
							<input type='hidden' name='forme' value='$reponse' /> 
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='nom' value='$nom' />
							<input type='hidden' name='prenom' value='$prenom' />
							<input type='hidden' name='fist' value='$email' id='fist'/>
							<input type='hidden' name='tel' value='$tel' />
							<input type='hidden' name='portable' value='$portable' />
							<input type='hidden' name='fax' value='$fax' />
							
							<input type='submit' value='Modifier' />
						</div>
					</form>
					
					<form action='index.php?uc=admin&ca=facture' method='post'>
						<div>
							<input type='hidden' name='statut' value='$statut' />
							<input type='hidden' name='forme' value='$reponse' /> 
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='nom' value='$nom' />
							<input type='hidden' name='prenom' value='$prenom' />
							<input type='hidden' name='fist' value='$email' id='fist'/>
							<input type='hidden' name='tel' value='$tel' />
							<input type='hidden' name='portable' value='$portable' />
							<input type='hidden' name='fax' value='$fax' />
							
							<input type='submit' value='Facture détaillée' />
						</div>
					</form>
				</td>
			</tr>
		");
	}

/* fonction qui récupère les informations dans la base de donnée du centre et affiche grâce à la fonction précédente les infos pour chaque tuple */

	function affichage_infos($name, $ordre, $critere)
	{
		$DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		mysql_query("SET NAMES 'utf8'");
		$reponse = mysql_query("SELECT statut, id, forme, raison, nom, prenom, email, tel, portable, fax ,date_inscription FROM eur_users $critere ORDER BY $name $ordre");

// on récupère les valeurs des attributs dans un tableau	   
				echo"
				 <table id='table_css'>
					<tr>
						<th id='th_ad'>Statut</th>
						<th id='th_ad'>Forme juridique</th>
						<th id='th_ad'>Raison sociale</th>
						<th id='th_ad'>Nom du contact</th>
						<th id='th_ad'>Pr?nom du contact</th>
						<th id='th_ad'>E-mail du contact</th>
						<th id='th_ad'>T?l?phone du contact</th>
						<th id='th_ad'>Portable du contact</th>
						<th id='th_ad'>Fax du contact</th>
						<th id='th_ad'>Date d'inscription</th>
					</tr>
			";			
		
	  $compteur=1;
	while($row = mysql_fetch_array($reponse)) { 
	$tr="";
	if($compteur%2==1)
	$tr="<tr class='alt'>";
	else 
	$tr ="<tr>";
	$compteur++;
/* on affiche la ligne dans le tableau */
	echo"
			$tr
				<td>$row[statut]</td>
				<td>$row[forme]</td>
				<td>$row[raison]</td>
				<td>$row[nom]</td>
				<td>$row[prenom]</td>
				<td>$row[email]</td>
				<td>$row[tel]</td>
				<td>$row[portable]</td>
				<td>$row[fax]</td>
				<td>$row[date_inscription]</td>
				
			</tr>";
			}
			
			echo"</table>";
				
		mysql_close();
	}
	
	function affichage_clients_tab_dem($raison, $ref_demande, $nat_demande, $descrip, $frequence, $statut, $email)
	{
		echo("
			<tr>
				<td id='td_ad'>$raison</td>
				<td id='td_ad'>$ref_demande</td>
				<td id='td_ad'>$nat_demande</td>
				<td id='td_ad'>$descrip</td>
				<td id='td_ad'>$frequence</td>
				<td id='td_ad'>$statut</td>
				<td id='td_ad'>
					<form action='modifier.php' method='post'>
						<div>
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='ref' value='$ref_demande' />
							<input type='hidden' name='nature' value='$nat_demande' /> 
							<input type='hidden' name='descrip' value='$descrip' />
							<input type='hidden' name='frequence' value='$frequence' />
							<input type='hidden' name='statut' value='$statut' />
							<input type='submit' value='Modifier' />
						</div>
					</form>
					<form action='index.php?uc=admin&ca=supprimer' method='post'>
						<div>
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='ref' value='$ref_demande' />
							<input type='hidden' name='nature' value='$nat_demande' /> 
							<input type='hidden' name='descrip' value='$descrip' />
							<input type='hidden' name='frequence' value='$frequence' />
							<input type='hidden' name='statut' value='$statut' />
							<input type='submit' value='Supprimer' />
						</div>
					</form>
					<form action='index.php?uc=admin&ca=envoipieces_2' method='post'>
						<div>
                                                       <input type='hidden' name='fist' value='$email' />
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='ref' value='$ref_demande' />
							<input type='hidden' name='nature' value='$nat_demande' /> 
							<input type='hidden' name='descrip' value='$descrip' />
							<input type='hidden' name='frequence' value='$frequence' />
							<input type='hidden' name='statut' value='$statut' />
							<input type='submit' value='Déposer un document' />
						</div>
					</form>
				</td>
			</tr>
		");
	}

/*********************************************
	!!!!!!!!!!!!!!!!!partie des anciens stagiaires !!!!!!!!!!!!!!!!!!!!!!!
?>
<?php      
        function actionListePiece($ref, $statut)
        {
            if($statut == 'En attente')
            {
                ?>
                        <form action='index.php?uc=c_client&cc=gestionDem' method='POST'>
                            <input type='hidden' name='ref' value='<?php echo $ref; ?>'/>
                            <input type='hidden' name='statut' value='<?php echo $statut; ?>'/>
                            <input type='submit' name='envoie' value='Modifier'/>
                            <input type='submit' name='envoie' value='Supprimer'/>
                        </form> 
                <?php
            }
            else if($statut == 'Pris en compte')
            {
                ?>
                        <form action='index.php?uc=c_client&cc=gestionDem' method='POST'>
                            <input type='hidden' name='ref' value='<?php echo $ref; ?>'/>
                            <input type='hidden' name='statut' value='<?php echo $statut; ?>'/>
                            <input type='submit' name='envoie' value='Supprimer'/>
                        </form> 
                <?php
            }
            else if($statut == 'Disponible')
            {
                ?>
                        <form action='index.php?uc=c_client&cc=gestionDem' method='POST'>
                            <input type='hidden' name='ref' value='<?php echo $ref; ?>'/>
                            <input type='hidden' name='statut' value='<?php echo $statut; ?>'/>
                            <input type='submit' name='envoie' value='Telecharger'/>
                            <input type='submit' name='envoie' value='Supprimer'/>
                        </form> 
                <?php
            }
            else if($statut == 'Telecharger')
            {
                ?>
                        <form action='index.php?uc=c_client&cc=gestionDem' method='POST'>
                            <input type='hidden' name='ref' value='<?php echo $ref; ?>'/>
                            <input type='hidden' name='statut' value='<?php echo $statut; ?>'/>
                            <input type='submit' name='envoie' value='Telecharger'/>
                            <input type='submit' name='envoie' value='Supprimer'/>
                        </form> 
                <?php
            }
        }
        
        function updateDateStatut($ref_demande, $nomFichier)
        {
            mysql_connect("www.pma-ssci.munci.org", "eureka_user", "F0rEur13");
            mysql_select_db("eureka");
            mysql_query("SET NAMES 'utf8'");
            $sql = "UPDATE eur_demandes SET statut_demande = 'Uploader', date_upload = now(), nomFichier = '$nomFichier' WHERE ref_demande = '$ref_demande';";
            mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        }
        
        function updateDateDownload($ref_demande)
        {
            mysql_connect("www.pma-ssci.munci.org", "eureka_user", "F0rEur13");
            mysql_select_db("eureka");
            mysql_query("SET NAMES 'utf8'");
            $sql = "UPDATE eur_demandes SET statut_demande = 'Telecharger', date_download = now() WHERE ref_demande = '$ref_demande';";
            mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        }
        
        
        function ajout_demande($refer, $nat, $desc, $freq, $id, $email)
	{
		$DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		 mysql_query("SET NAMES 'utf8'");
		$requette="INSERT INTO eur_demandes(ref_demande, nat_demande, descrip_demande, freq_demande, date_demande, idClient, emailC) 
									VALUES ('$refer', '$nat', '$desc', '$freq', now(), '$id', '$email')";
									
                $result=mysql_query($requette);
				if($result){
						mail($email,'', 'Votre demande a bien 굩 prise en compte : La reference de votre demande est'.$refer.', la nature de votre 								demande est'.$nat.'et la description de votre demande est'.$desc.'');
				}	
        }
        
        function getRaison($id)
        {
           $DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		mysql_query("SET NAMES 'utf8'");
            $res = mysql_query("SELECT raison FROM eur_users WHERE id = '$id';");
            return mysql_fetch_array($res);
        }
        
        function getNomFichier($ref)
        {
            $DB_login = "root";  $DB_pass = "";
		$DB_host = "localhost";  $DB_select = "eureka_2";
		$conn= mysql_connect($DB_host, $DB_login, $DB_pass); 
		$db = mysql_select_db($DB_select, $conn);
		mysql_query("SET NAMES 'utf8'");
            $res = mysql_query("SELECT nomFichier FROM eur_demandes WHERE ref_demande = '$ref';");
            return mysql_fetch_array($res);
        }
        
        function suppDem($ref, $id)
        {
            mysql_connect("www.pma-ssci.munci.org", "eureka_user", "F0rEur13");
            mysql_select_db("eureka");
            mysql_query("SET NAMES 'utf8'");
            mysql_query("DELETE FROM eur_demandes WHERE ref_demande = '$ref' and idClient = '$id';");
        }
        
        function getIdNature($nature)
        {
            mysql_connect("localhost", "root", "");
            mysql_select_db("eureka_2");
            mysql_query("SET NAMES 'utf8'");
            $res = mysql_query("SELECT nom_service FROM eur_tarifs WHERE nom_service = '$nature';");
            return mysql_fetch_array($res);
        }
        
        function ajoutuser($sta, $for, $rai, $nom, $pren, $mail, $tel, $port, $fax, $pas)
        {
            mysql_connect("www.pma-ssci.munci.org", "eureka_user", "F0rEur13");
            mysql_select_db("eureka");
            mysql_query("SET NAMES 'utf8'");
            mysql_query("INSERT INTO eur_users(statut, forme, raison, nom, prenom, email, tel, portable, fax, password, dateInscription) 
								VALUES ('$sta', '$for', '$rai', '$nom', '$pren', '$mail', '$tel', '$port', '$fax', '$pas', now())");
        }
	*/
?>
