<title>Demandes clients</title>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>

<?php
include("../include/MysqlDao.php");
include("../setup.php");
$dao = new MysqlDao;   

function tronque($str, $nb = 40) 
{
    // Si le nombre de caractères présents dans la chaine est supérieur au nombre 
    // maximum, alors on découpe la chaine au nombre de caractères 
    if (strlen($str) > $nb) 
    {
        $str = substr($str, 0, $nb);
        $position_espace = strrpos($str, " "); //on récupère l'emplacement du dernier espace dans la chaine, pour ne pas découper un mot.
        $texte = substr($str, 0, $position_espace);  //on redécoupe à la fin du dernier mot
        $str = $str."..."; //puis on rajoute des ...
    }
    return $str; //on retourne la variable modifiée
}
$reponse = $dao->recuperer_Toutes_Les_Demandes();
				
				echo"
					
				 <table id='table_css' class='display'>
				 <thead>
					<tr>
						<th id='th_ad'>Raison</th>
						<th id='th_ad'>ref_demande</th>
						<th id='th_ad'>Nature demande</th>
						<th id='th_ad'>Description demande</th>
						<th id='th_ad'>frequence</th>
						<th id='th_ad'>date demande</th>
						<th id='th_ad'>upload</th>
						<th id='th_ad'>Facture</th>
						<th id='th_ad'>Email du contacte</th>
						<th id='th_ad'>Statut de demande</th>
						
						
					</tr>
					</thead>
					<tbody>
			";			
	  $compteur=1;
	
	foreach ($reponse as $row) { 
	$tr="";
	if($compteur%2==1)
	$tr="<tr class='alt'>";
	else 
	$tr ="<tr>";
	$compteur++;
	$texte='etes vous sure de vouloir changer le statut ?';

	$statut=$row['statut_demande'];
	;
//recuperer la raison en se servant de l ID
				$id=$row['idClient'];
				$ref=$row['ref_demande'];
				$result=$dao->recupererInfosClientsParId($id);
				$pomme=serialize($result);
				foreach ($result as $key) 
				{
				$raison = $key['raison'];
				}

/* on affiche la ligne dans le tableau */
				echo"
				$tr

				<form method='post'action='activer.php'>

				<td>";

				?>
				

				<a href="javascript:popupinfos('<?php echo $id ;?>')"> 
				<!-- <a href="infos_raison.php?infos='" onclick="window.open(this.href); return false;">-->

				<?php

				echo"
				$raison

				</td>

				<td><input type='hidden' name='ref' value= '$ref'/>
				<input type='hidden' name='id' value= '$id'/>
				$ref</td>
				<td>$row[nat_demande]</td>
				<td>";
				$texte=$row['descrip_demande'];
				$texteTronque=tronque($texte);
				echo $texteTronque;
				?>

				<a href="javascript:popup('<?php echo $texte; ?>')"><img src="../images/loupe.jpg" id="menu2"/></a>

				<?php

				echo"</td>
				<td>$row[freq_demande]</td>
				<td>$row[date_demande]</td>
				<td>
				<input type='submit' name='envoyez' onclick =this.form.action='upload/upload.php'>
				</td>
				<td>";

				$facture=$dao->recuperer_references_facture($ref);

				if($facture){
					foreach ($facture as $enter) {

					$ref_facture=$enter['ref_facture'];
					$date=$enter['date_facture'];
					?>
					<a href="javascript:popupfacture('<?php echo $ref_facture ;?>')"><img src="../images/facture.png" title="<?php echo $date; ?>"id="menu2"/></a>
					<?php
					}
				}
				echo"<input type='submit' value='Creer facture' onclick =this.form.action='consulter_creer_facturation.php'>";

				

				echo"</td>
				<td>$row[emailC]</td>	
				<td>
				
					
			    
					<form>

						<select name='statut' onchange='submit()'>";

//menu deroulant sur le statut de demande 

							if($statut=='En attente'){

							echo"<option value ='En attente' selected>En attente</option>

							<option value ='En cours de traitement'>En cours de traitement</option>

							<option value ='Valide'>traitee</option>";

							}
							if($statut=='En cours de traitement'){

							echo"<option value ='En attente'>En attente</option>

							<option value ='En cours de traitement' selected>En cours de traitement</option>

							<option value ='Valide'>traitee</option>";

							}
							if($statut=='Valide'){

							echo"<option value='En attente'>En attente</option>

							<option value ='En cours de traitement'>En cours de traitement</option>

							<option value ='Valide' selected>traitee</option>";

							}
							


					echo"</SELECT>

					</form>";

				
				

				echo"</td>

				</form>

				</tr>
				
					
				";}
				
				
				echo"</tbody>";
				echo"</table>";
				
	
?>  
<a class="btn" href="admin.php">Retour</a>           


<script type="text/javascript" > 

function popup(texte)
{
window.open('popupDesscription.php?txt='+texte,'Decription','toolbar=0,location=0,directories=0,menuBar=0,resizable=0,scrollbars=yes,width=470,height=400,left=75,top=60');
} 
//popup affichant la description complete description de la demande 
function popupinfos(id)
{
window.open('infos_raison.php?id='+id,'Decription','toolbar=0,location=0,directories=0,menuBar=0,resizable=0,scrollbars=yes,width=470,height=400,left=75,top=60');
} 
//popup infos affichant les infos sur la raison 
function popupfacture(ref_facture)
{
window.open('detailFacture.php?ref_facture='+ref_facture,'Decription','toolbar=0,location=0,directories=0,menuBar=0,resizable=0,scrollbars=yes,width=470,height=400,left=75,top=60');
} 
//popup affichant la facture corresondant si a elle a éte cree prealablement 
function validation() { 
      if (confirm("Voulez-vous send le formulaire ?")) {
       document.forms("statut_demande").submit(); 
      }
     } 

$(document).ready(function() {
    $('#table_css').dataTable( {
        "order": [[ 5, "desc" ]]
    } );
} );
</script>  

