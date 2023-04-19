<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">
  
<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>

<?php

include ('../include/MysqlDao.php');
include('../setup.php');
$dao = new MysqlDao;


$result=$dao->recupererListeFacture();


       echo"
				 <table id='table_css' class='display'>
				 <thead>
					<tr>
						<th id='th_ad'>Raison</th>
						<th id='th_ad'>Reference de la facture</th>
						<th id='th_ad'>Reference de la demande</th>
						<th id='th_ad'>Nature de la demande</th>
						<th id='th_ad'>Date de la demande</th>
						<th id='th_ad'>Date de facture</th>
						<th id='th_ad'>Quantité</th>
						<th id='th_ad'>Prix total</th>
						<th id='th_ad'>Details</th>
					
						
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

			<form method='post'action='detailFacture.php' >
			
				<td>$row[raison]</td>
				<td><input type='hidden' name='ref_facture' value='$row[ref_facture]'/>$row[ref_facture]</td>
				<td><input type='hidden' name='ref' value='$row[ref_demande]'/>$row[ref_demande]</td>
				<td>$row[nat_demande]</td>
				<td>$row[mois_demande]</td>
				<td>$row[date_facture]</td>
				<td>$row[quantite]</td>
				<td>$row[prix_total]</td>
				
				<td><input type='submit' name='Facture' value='Details(pdf)' id ='classname2' /></td>
				</form>
				
				
			</tr>";
			}
			echo'</tbody>';
			echo"</table>";

?>
<a class="btn" href="admin.php">Retour</a>
<script type="text/javascript" >  


$(document).ready(function() {
    $('#table_css').dataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>  
