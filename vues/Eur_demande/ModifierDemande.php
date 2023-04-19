<?php
//linareythen
include_once('vues/Vue.php');

class ModifierDemande extends Vue
{
    public function contenu($data=array())
    {
    	echo'	<div class="row well">';
    				$this->nav();
   		
   		echo'		<div class="col-md-offset-1 col-md-8 ">';
   						if(isset($data['modification']))
   						{
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
	        				echo'
	        				<h3 style="text-align:center; ">Modifier sa Demande</h3>';
	        				if(isset($_GET['id']) && $_GET['id']!="null")
	        				{
	        					echo'<form class="form-vertical"  method="POST" action="/eureka/rout/eur_demande/modifierdemande/'.$data[0]->getId().'">';
		        			} else {
								echo'<form class="form-vertical"  method="POST" action="/eureka/rout/eur_demande/modifierdemande/null">';
		        			}
	        			echo'	<input type="hidden" name="modifier"/>
	        					<input type="hidden" name="id" value="'.$data[0]->getId().'"/>
	        					<table class="table">
	        						<tr><th>Champ</th><th>Valeur &agrave; Modifier</th></tr>';

	        				foreach ($data as $ask) 
	        				{	
	        					echo'<tr>
	        							<td>R&eacute;f&eacute;rence Demande</td>
	   	     							<td>
	   	     								<label class="form-control" name="ref_demande">'.$ask->getPropriete("ref_demande").'</label>
	   	     							</td>
	   	     						</tr><br/>';
	        					echo'<tr>
	        							<td>Nature du Service</td>
	        							<td>
	        								<select name="nat_demande" class="form-control">
	        									<option value="" disabled selected	>'.$ask->getPropriete("nat_demande")	.'	</option>
	        									<option value="CV"			> CV 												</option>
												<option value="ForfaitCVs"	> Forfait CVs 										</option>
												<option value="Information"	> Information 										</option>
												<option value="Synthese"	> Synthèse 											</option>
												<option value="SuiviSite"	> Suivi Site   										</option>
											</select>
										</td>
									</tr>';

	        					echo'<tr>
	        							<td>Description de la Demande</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="descrip_demande" 	placeholder="'.$ask->getPropriete("descrip_demande").'"/>
	   	     							</td>
	   	     						</tr><br/>';
	        					echo'<tr>
	        							<td>Fr&eacute;quence de paiement</td>
	        							<td>
	        								<select name="freq_demande" class="form-control">
	        									<option value="" disabled selected	>'.$ask->getPropriete("freq_demande")	.'	</option>
	        									<option value="uneSeuleFois"		> une Seule Fois 							</option>
												<option value="Hebdomadaire"		> Hebdomadaire								</option>
												<option value="Mensuelle"			> Mensuelle									</option>
												<option value="Trimestrielle"		> Trimestrielle								</option>
												<option value="Semestrielle"		> Semestrielle								</option>
												<option value="Annuelle"			> Annuelle									</option>
											</select>
	        							</td>
	        						</tr>';
	        					echo'<tr>
	        							<td>URL</td>
	   	     							<td>
	   	     								<input type="text" class="form-control" name="url" 		placeholder="'.$ask->getPropriete("url")	.	'"/>
	   	     							</td>
	   	     						</tr>';
	        				}
	        					echo'<tr>
	        							<td colspan=2>
	        							<button type="submit" class="btn btn-danger form-control">
	        								Valider 
	        								<i class="glyphicon glyphicon-floppy-save"></i>
	        							</button>
	        							</td>
	        						</tr>';
						echo'	</table>
	        				</form>';
        				}
        	echo'	</div>
    			</div>';
    }
}

