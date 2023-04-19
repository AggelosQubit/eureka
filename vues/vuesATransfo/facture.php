<?php

session_start();
include("../include/MysqlDao.php");

include ("../setup.php");

/*Le client choisie d'afficher les factures soit depuis le début du mois, 
 * depuis le début de l'année ou depuis toujours*/
$Afacture="";
$moisSelected="";
$anneeSelected="";

/*Par defaut la barre d'option affichera depuis toujours la première fois qu'on arrive dans la page
et que la vriable $Afacture n'existe pas. Donc c'est dans cette option que l'attribut selected sera placé*/
$toujoursSelected="selected";

//Gestion de la position de l'attribut selected
if(isset($_POST['Afacture']))
{
    $Afacture = $_POST['Afacture'];
    
    switch ($Afacture)
    {
        case 'mois':
                 $moisSelected="selected";
            break;
        
        case 'annee':
                 $anneeSelected="selected";   
            break;
        
        case 'toujours':
                 $toujoursSelected="selected";   
            break;
        
    }
    
    /* On vide le contenu de toujours si c'est le mois ou l'année qui est sélectionné, étant donné
    qu'on lui a mis selected hors de la vérification de l'existance de la variable*/
    if($Afacture!="toujours")
        $toujoursSelected="";

}



/*Dans cette echo, si la variable Afacture existe et donc que l'utilisateur a fait sont choix
Un attribut selected sera affecté à la balise correspondante uniquement au choix en cours */
 include_once '../include/menuClient.html';
 
echo"<p>
        <form method='post' action='facture.php'>
           <label for='trier'>Afficher les factures datant depuis : </label>
           <select name='Afacture' id='trier'>
           
               <option value='moisPrecedent' $moisSelected >le mois précédent</option>
               <option value='annee' $anneeSelected >le début de l'année</option>
               <option value='toujours' $toujoursSelected >toujours</option>
                   
            </select>
           <input type='submit' value='Valider'/>
        <form>
        
    </p>";

$dao = new MysqlDao ;
$id=$_SESSION['id'];


/*Il reste un bug dans cette méthode, on ne peut pas afficher
les factures depuis le début du mois actuel */
$result=$dao->recupererFacture($id,$Afacture);
echo"
					
				 <table id='table_css' class='display'>
				 <thead>
					<tr>
						<th id='th_ad'>Raison</th>
						<th id='th_ad'>Reference de la demande</th>
						<th id='th_ad'>Nature demande</th>
						<th id='th_ad'>Date demande</th>
						<th id='th_ad'>Date Facture</th>
						<th id='th_ad'>Facture detaille</th>

					</tr>
					</thead>
					<tbody>
			";			
	  $compteur=1;
	
       
	foreach ($result as $row) 
        { 
            
	$tr="";
        
            if($compteur%2==1)
            {
                $tr="<tr class='alt'>";
            }
            else 
            {
                $tr ="<tr>";
            }
            
	$compteur++;
        
	echo"
		$tr
		<form method='post'action='facture_detaille.php'>

				<td><input type= 'hidden' name='id' value= '$row[raison]' />$row[raison]  </td>
				<td><input type='hidden' name='ref' value= '$row[ref_demande]'/>$row[ref_demande]</td>
				<td>$row[nat_demande]</td>
				<td>$row[mois_demande]</td>
				<td>$row[date_facture]</td>
				<td>
				<input type='submit' value='Details' onclick =this.form.action='facture_detaille.php'>
                                
                                <a href='prepatele.php' target='_blank' >Télécharger cette facture</a>
                                </td>
                                </form>
                </form>
	    ";
		
	}
?>


		</tbody>
		</table>



