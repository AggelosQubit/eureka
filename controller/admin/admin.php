<link rel="stylesheet" type="text/css" href="../css/form.css" media="all"/>  
<link rel="stylesheet" type="text/css" href="../css/menu.css" media="all"/> 
<link rel="stylesheet" type="text/css" href="../css/menuClient.css" media="all"/> 
<link rel="stylesheet" type="text/css" href="../css/table.css" media="all"/>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>

<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 

<?php
session_start();
if (isset($_SESSION['mail'])) {
//tatjana
include('../include/MysqlDao.php');
include ('../setup.php');

$dao = new MysqlDao;
echo 'Votre login est '.$_SESSION['mail'];
echo '<br />';

$mail = $_SESSION['mail'];
$dao->verifierStatut($mail);
}
else {
echo 'Les variables ne sont pas déclarées.';
}


?>
<section id="article15" class="crayon article-css-15 ">
<div class="menu">
<ul>
<li><a href="facture.php">Facture detaillé</a><div><h3>Facture </h3><p>Facture detailler d'un client.</p></div></li>
<li><a href="deconnexion.php">Deconnexion</a><div><h3>Deconnexion </h3><p>Deconnecter votre session et quitter.</p></div></li>

<li><a href="ajoutservices.php">Services</a><div><h3>Services</h3><p>Ajouter,gerer liste des services.</p></div></li>
<li><a href="afficher_demande.php">Gestion des demandes</a><div><h3>Demandes </h3><p>Gestion de demande des clients.</p></div></li>
</ul>
</div>
</section>
<?php
		/*<div id='monForm'>
<form action='modifier.php' method='post'>
<h1> Modifier <h1>
<input type='submit' name ='page' value='facture detaille' class='classname2' onclick="this.form.action='afficher.php'"/><br/>	
<input type='submit' name ='page' value='Modifier' class='classname' />	
<input type='submit' name ='page' value='supprimer' class='classname1' onclick ="this.form.action='supprimer.php'"/>
</form></div>*/




				$requete="SELECT statut, id, forme, raison, nom, prenom, email, tel, portable, fax ,date_inscription FROM eur_users ";
				$result=$dao->affichage_infos($requete);



			        echo"
				 <table id='table_id' class='display'>
				 <thead>
					<tr>
						<th id='th_ad'>Statut</th>
						<th id='th_ad'>Forme juridique</th>
						<th id='th_ad'>Raison sociale</th>
						<th id='th_ad'>Nom du contact</th>
						<th id='th_ad'>Prénom du contact</th>
						<th id='th_ad'>E-mail du contact</th>
						<th id='th_ad'>Téléphone du contact</th>
						<th id='th_ad'>Portable du contact</th>
						<th id='th_ad'>Fax du contact</th>
						<th id='th_ad'>Date d'inscription</th>
						<th id='th_ad'>Intervenir</th>
						
					</tr>
					</thead>
					<tbody>
			";		
			 $compteur=1;
			 

	foreach($result as $row)
{
  

	$tr="";
	//if($compteur%2==1)
	//$tr="<tr class='alt'>";
	//else 
	$tr ="<tr>";
	$compteur++;
 //on affiche la ligne dans le tableau 
	echo"
			$tr

			<form method='post'action='form_modif_client_par_admin.php' >
			
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
				<td><input type='submit' value='$row[email]' name='email' id ='classname2' /></td>
				</form>
				
				
			</tr>";
			}
			echo'</tbody>';
			echo"</table>";



?>             


<script type="text/javascript" >  

$(document).ready(function() {
    $('#table_id').dataTable( {
        "order": [[ 9, "desc" ]]
    } );
} );



</script>  