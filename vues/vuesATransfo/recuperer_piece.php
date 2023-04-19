	
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
<link rel="stylesheet" type="text/css" href="../css/form.css" media="all"/>  
<link rel="stylesheet" type="text/css" href="../css/menu.css" media="all"/> 
<link rel="stylesheet" type="text/css" href="../css/menuClient.css" media="all"/> 
<link rel="stylesheet" type="text/css" href="../css/table.css" media="all"/> 
<?php
include ('../include/MysqlDao.php');
include("../setup.php");



$a = session_id();
if(empty($a)) session_start();
$dao = new MysqlDao ;

//echo "SID: ".SID."<br>session_id(): ".session_id()."<br>COOKIE: ".$_COOKIE["PHPSESSID"];
?>
<title>Recuperation des pieces</title>

<figure>
         <img src="../images/logo.png" alt="logo" />
    </figure>

 <section id="article12" >
                            <div class="menu_div">
<ul class="menu_ul">
<li><a href="">Compte</a>
<ul>
<li><a href="../vues/accueilclient.php">Acceuil</a></li>
<li><a href="../admin/deconnexion.php">Deconnexion</a></li>
</ul>
</li>
<li><a href="">Configuration</a>
<ul>
<li><a href="modifier.php">Parametre du compte</a></li>
<li><a href="configcompte.php">Preference du contacte</a></li>
</ul>
<li><a href="">business</a>
<ul>
<li><a href="form_demandes.php">Formulaire de demande</a></li>
<li><a href="facture.php">Mes factures</a></li></ul>
</li>
</div>
</section>
     
     
     
     
<?php
$id=$_SESSION['id'] ;



$result=$dao->recupdemande($id);



echo"
				 <table id='table_css' class='display'>
				 <thead>
					<tr>
						<th id='th_ad'>ref_demande</th>
						<th id='th_ad'>Nature demande</th>
						<th id='th_ad'>Description demande</th>
						<th id='th_ad'>frequence</th>
						<th id='th_ad'>date demande</th>
						<th id='th_ad'>date upload</th>
						<th id='th_ad'>date download</th>
						<th id='th_ad'>Statut de demande</th>
					</tr>
					</thead>
					<tbody>	
					";
	$compteur=1;
foreach ($result as $row) {
		
	if((strcmp($row['statut_demande'],'Valide')==0)||(strcmp($row['statut_demande'],'En cours de traitement')==0)){

	echo"
			<tr>

			<form method='post'action='telecharger.php' >

				<td><input type='hidden'name='ref' value= '$row[ref_demande]'/>$row[ref_demande]</td>
				<td>$row[nat_demande]</td>
				<td>$row[descrip_demande]</td>
				<td>$row[freq_demande]</td>
				<td>$row[date_demande]</td>
				<td>";

				if($row['date_upload']=='0000-00-00')
				{

					echo"Fichier pas encore uploadé";

				}
				else{

					echo"$row[date_upload]";
				}

				

				echo"</td>";

				echo"<td>";

				if($row['date_download']=='0000-00-00')
				{

					echo"";

				}
				else {

					echo"$row[date_download]";

				}

				


				echo"</td>
				<td>$row[statut_demande] ";
				$ref=$row['ref_demande'];
				$fichier=$dao->recupererfiles($ref);
				if($fichier) {

					foreach ($fichier as $key) {


						//$lien = $key['file_url'];
						$nom = $key['name'];
						//$envoielien=$dao->encrypt_url($lien);

						
						echo"<input type='submit' value='$nom' name='filename' id ='classname2'/>";
						            
						
					}
	
				}


				echo"
				</td>
				</form>
				</tr>";

				}  
	else{
// on affiche la ligne dans le tableau 
	echo" <tr>

	<form method='post'action='form_modif_client.php' >
			
				<td><input type='hidden'name='ref' value= '$row[ref_demande]'/>$row[ref_demande]</td>
				<td>$row[nat_demande]</td>
				<td>$row[descrip_demande]</td>
				<td>$row[freq_demande]</td>
				<td>$row[date_demande]</td>
				<td>";

				
				if($row['date_upload']=='0000-00-00')
				{

					echo"Fichier pas encore uploadé";

				}
				else{

					echo"$row[date_upload]";
				}

				

				echo"</td>";

				echo"<td>";

				if($row['date_download']=='0000-00-00')
				{

					echo"";

				}
				else {

					echo"$row[date_download]";

				}

				echo"</td>
				<td>$row[statut_demande] 
				<input type='submit' value='modifier' name='modifier' id ='classname2'/>  
				</td>		
				  </form>
				
				
			</tr>";
			
			}	  
			
			}
			echo"</tbody>";
			echo"</table>";




?>
<script type="text/javascript" >  

$(document).ready(function() {
    $('#table_css').dataTable( {
        "order": [[ 4, "desc" ]]
    } );
} );
</script>  
