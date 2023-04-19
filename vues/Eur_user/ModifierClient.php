<?php
//linareythen
include_once('vues/Vue.php');

class ModifierClient extends Vue
{
    public function contenu($data=array())
    {
    	echo'	<div class="row well">';
    				$this->nav();
   		
   		echo'		<div class="col-md-offset-1 col-md-8 ">';
   						if(isset($data['modification']))
   						{
   							//UNE MODIFICATION A ETE APPORTE
   							if($data['modification']=='granted')
   							{
   								echo'
   									<div class="panel panel-success row">
								    	<div class="panel-heading">Modification R&eacute;ussie</div>
								   	</div>
   									';
   							} elseif($data['modification']=='none') {
   								echo'
   									<div class="panel panel-info row">
								    	<div class="panel-heading ">Aucune Modification Effectu&eacute;e</div>
								   	</div>
   									';
   							} else {
   								echo'
   									<div class="panel panel-danger row">
								    	<div class="panel-heading">Modification Rat&eacute;e</div>
								   	</div>
   									';   								
   							}
   						} else {
   							//FORMULAIRE DE MODIFICATION
	        				echo'
	        				<h3 style="text-align:center; ">Modifier ses informations client</h3>';
	        				if(isset($_GET['id']) && $_GET['id']!="null")
	        				{
	        					//MODIFICATION POUR ADMIN
	        					//ON UTILISE GET POUR D2SIGNER LA PERSONNE A MODIFIER
	        					echo'<form class="form-vertical"  method="POST" action="/eureka/rout/eur_user/modifierclient/'.$data[0]->getId().'">';
		        			} else {
		        				//MODIFICATION POUR CLIENT
		        				//ON MET NULL EN GET ET ON UTILISE LA VARIABLE DE SESSION POUR CHOISIR 
		        				//L'UTILISATEUR A CHANGER
								echo'<form class="form-vertical"  method="POST" action="">';
		        			}
	        			echo'	<input type="hidden" name="modifier"/>
	        					<table class="table">
	        						<tr><th>Champ</th><th>Valeur &agrave; Modifier</th></tr>';

	        				foreach ($data as $user) 
	        				{	
	        					echo'<tr>
	        							<td>Statut</td>
	        							<td>	
	        								<select name="statut"   class="form-control">
	        									<option value="" disabled selected	>'.$user->getPropriete("statut")	.'</option>
	        									<option value="Client"> Client</option>
												<option value="prospect"> Prospect</option>
												<option value="abonné"> Abonné newsletter</option>
											</select>
										</td>
									</tr>';
	        					echo'<tr>
	        							<td>Forme Juridique</td>
	        							<td>
	        								<select name="forme" class="form-control">
	        									<option value="" disabled selected	>'.$user->getPropriete("forme")	.'</option>
	        									<option value="Client"> SA</option><!--Client-->
												<option value="prospect"> SARL</option><!--Client a voir-->
												<option value="abonné"> PME</option>
											</select>
										</td>
									</tr>';
	        					
	        					echo'<tr>
	        							<td>Raison Sociale</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="raison" 		placeholder="'.$user->getPropriete("raison")	.'"/>
	   	     							</td>
	   	     						</tr><br/>';

	        					echo'<tr>
	        							<td>Nom</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="nom" 		placeholder="'.$user->getPropriete("nom")		.'"/>
	   	     							</td>
	   	     						</tr><br/>';
	        					echo'<tr>
	        							<td>Pr&eacutenom</td>
	        							<td>
	        								<input type="text" class="form-control" name="prenom" 		placeholder="'.$user->getPropriete("prenom")	.'"/>
	        							</td>
	        						</tr>';
	        					echo'<tr>
	        							<td>Ville</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="ville" 		placeholder="'.$user->getPropriete("ville")		.'"/>
	   	     							</td>
	   	     						</tr>';

	        					echo'<tr>
	        							<td>Adresse</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="adresse"		placeholder="'.$user->getPropriete("adresse")	.'"/>
	   	     							</td>
	   	     						</tr>';
	        					echo'<tr>
	        							<td>Code Postal</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="codePostal"	placeholder="'.$user->getPropriete("codePostal").'"/>
	   	     							</td>
	   	     						</tr>';
	        					echo'<tr>
	        							<td>Raison Sociale</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="email"		placeholder="'.$user->getPropriete("email")		.'"/>
	   	     							</td>
	   	     						</tr>';
	        					echo'<tr>
	        							<td>T&eacute;l&eacute;phone Fixe</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="tel"			placeholder="'.$user->getPropriete("tel")		.'"/>
	   	     							<td>
	   	     						</tr>';
	        					echo'<tr>
	        							<td>T&eacute;l&eacute;phone Portable</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="portable"	placeholder="'.$user->getPropriete("portable")	.'"/>
	   	     							</td>
	   	     						</tr>';
	        					echo'<tr>
	        							<td>Fax</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="fax"			placeholder="'.$user->getPropriete("fax")		.'"/>
	   	     							</td>
	   	     						</tr>';
	        					echo'<tr><td colspan=2><button type="submit" class="btn btn-danger form-control">Valider <i class="glyphicon glyphicon-floppy-save"</i></button></td></tr>';
	        				}
						echo'	</table>
	        				</form>';
        				}
        	echo'	</div>
    			</div>';
    }
}

