<?php
/* affiche une ligne dans une tableau */
function affichage_infos_fact($statut, $forme, $raison, $nom, $prenom, $email, $tel, $portable, $fax) 
 {
  echo("
<p><br/>
  Statut : $statut <br/>
  Forme juridique : $forme <br/>
  Raison sociale : $raison <br/>
  Nom :  $nom <br/>
  Prénom : $prenom <br/>
  E-mail : $email <br />
  Tél. : $tel <br />
  Portable : $portable <br />
  Fax : $fax <br />
</p>
");
}

/* affichage de l'en_tete contenant les informations relatives au client */
function infos($login)
{
	
		mysql_select_db("db_eurekaint");
		mysql_query("SET NAMES 'utf8'");
		$res = mysql_query("SELECT statut, forme, raison, nom, prenom, email, tel, portable, fax
				FROM eur_users WHERE 
				email = '$login'");
    
		if ($res)
		{ // si il 'y a pas d'erreur
      // on récupère le nombre de tuple (1 normalement)
			$nb_tuples = mysql_num_rows ($res);
			$indicateur_tuple = 0;
			while ($nb_tuples > $indicateur_tuple)
			{
	// on récupère les valeurs des attributs dans un tableau	   
				$tuple = mysql_fetch_row($res, $indicateur_tuple);
				if ($tuple)
				{	// si ça fonctionne
	  /* on affiche une ligne du tableau contenant les informations */
					affichage_infos($tuple[0], $tuple[1], $tuple[2], $tuple[3], $tuple[4], $tuple[5], $tuple[6], $tuple[7], $tuple[8]);
				}
				else
				{ // si ça ne fonctionne pas
					affichage_infos(0,0,0,0,0,0,0,0,0);
				}
				$indicateur_tuple++;
			} // fin while
		} // if ($res)
		mysql_close();
	}


/* fonction qui calcule le montant de la location de la chambre */
function calcul_montant ($num_sem_deb_loc, $num_sem_fin_loc, $prix) {
  $temp = abs ($num_sem_fin_loc - $num_sem_deb_loc) ;
  $montant = $temp * $prix;
  return $montant;
}

/* affiche une ligne dans un tableau */
function affichage_loc_tab ($arg1, $arg2, $arg3, $arg4, $arg5, $arg6)
{
	echo("
		<tr>
			<td id='td_ad'>$arg1</td>
			<td id='td_ad'>$arg2</td>
			<td id='td_ad'>$arg3</td>
			<td id='td_ad'>$arg4</td>
			<td id='td_ad'>$arg5</td>
			<td id='td_ad'>$arg6</td>
		</tr>
	");
}

/* fonction qui affiche les informations concernant la location de chambres */
function location_info ($login)
{
	mysql_connect("92.222.7.87", "dbown_eurekaint", "F0rdb_eurekaint" );
		mysql_select_db("db_eurekaint");
		mysql_query("SET NAMES 'utf8'");
		$req1 = mysql_query("SELECT raison
				FROM eur_users
				WHERE email = '$login'");
		$tuple = mysql_fetch_row($req1, 0);
		$raison = $tuple[0];
		$res = mysql_query("SELECT raison, date_demande, reference, nature, quantite, prix
				FROM eur_services
				WHERE raison = '$raison'");
   
		if ($res)
		{ // si fonctionne
      // on récupère le nombre de tuple
			$nb_tuples = mysql_num_rows ($res);
			$indicateur_tuple = 0;
			$total = 0; // on définit un total de 0
			while ($nb_tuples > $indicateur_tuple)
			{
	// on récupère les valeurs des attributs dans un tab	   
				$tuple = mysql_fetch_row($res, $indicateur_tuple);
				if ($tuple)
				{	// si ça fonctionne
	  /* on calcule le montant de la location */
					$montant = $tuple[5];
	  /* on met à jour la valeur du total */
					$total = $montant + $total;
	  /* on affiche la ligne du tableau correspondante */
					affichage_loc_tab($tuple[0], $tuple[1], $tuple[2], $tuple[3], $tuple[4], $tuple[5]);	
				}
				else
				{ // si il y a une erreur
					affichage_loc_tab(0,0,0,0,0,0);
				}
				$indicateur_tuple++;
			}//fin while
      /* on affiche la ligne du total */
			echo ("
				<tr>
					<td colspan='5' id='td_ad'><span class='align-right'>Total</span></td>
					<td id='td_ad'>$total</td>
				</tr>
			");
		}// fin if (res)
		//return $total;
		mysql_close();
	
	
}

/* fonction qui affiche une ligne dans un tableau */
function affich_serv($libelle, $date, $montant) {
  echo(" 
<tr>
  <td>$libelle</td>
  <td>$date</td>
  <td>$montant</td>
</tr>
");
}

/* fonction qui récupère les informations des services et affiche le tableau */
function req_serv($dbname, $numport, $dbuser, $num_client, $nom_c) {
  if ($DB = pg_connect("host=localhost port=$numport dbname=$dbname user=$dbuser
                        password=coucou")) {
    $requete = "SELECT libelle, prix_serv, date_conso, num_loc, type_serv, 
montant, nombre FROM service NATURAL JOIN consommation NATURAL JOIN location 
NATURAL JOIN centre WHERE consommation.num_loc = location.num_loc AND 
location.num_client = $num_client AND service.code_centre = centre.code_centre
 AND centre.nom_c = '$nom_c'";
    // on exécute la requete
    $reponse = pg_query($DB, $requete);
    if ($reponse) { // si ça fonctionne
      // on récupère le nombre de lignes
      $nbTuples = pg_num_rows ($reponse);
      $IndTupleCourant = 0;
      $total = 0;
      while ($IndTupleCourant < $nbTuples) {
	// on récupère les valeurs des attributs dans un tab
	$tupleCourant = pg_fetch_row($reponse, $IndTupleCourant);
	if ($tupleCourant) {
	  //si pf :
	  if ($tupleCourant[4] == 'pf') {
	    /* on calcule la somme totale du service */
	    $somme = $tupleCourant[1]*$tupleCourant[6];
	    /* on affiche la ligne du tableau */
	    affich_serv($tupleCourant[0], $tupleCourant[2], $somme);
	    /* on met à jour la valeur du total */
	    $total = $total + $somme;
	  }
	  else { //sinon pv
	    /* on affiche la ligne du tableau */
	    affich_serv($tupleCourant[0], $tupleCourant[2], $tupleCourant[5]);
	    /* on met à jour la valeur du total */
	    $total = $total + $tupleCourant[5];
	  }
	}
	else { // si ça ne fonctionne pas 
	  affiche_serv(0,0,0);
	}
	$IndTupleCourant ++;
      }
  echo ("
<tr>
  <td colspan='2'><span class='align-right'>Total</span></td>
  <td>$total</td>
</tr>
      ");
    }
    return $total;
    pg_close($DB);
  }
  else { //   Impossible de se connecter
    echo("Impossible de se connecter à la base");
  }
}
?>
