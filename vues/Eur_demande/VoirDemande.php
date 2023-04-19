
<?php
/**
 * @File: Confirmer.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class VoirDemande extends Vue 
{
	public function contenu($data=array())
	{
		if(isset($_SESSION['id']) && (($_SESSION['statut']!="admin")))
		{
			Echo'
				<div class="row well">';
					$this->nav();



			echo'	<div class="well col-md-12">
						<table class="table table-condensed">
						<tr>
							<th>R&eacutef&eacuterence Demande</th>
							<th>Nature Demande</th>
							<th>Description</th>
							<th>Fr&eacute;quence</th>
							<th>Statut</th>
							<th>Date de demande</th>
							<th>Date de T&eacute;l&eacute;versement</th>
							<th>Date de T&eacute;l&eacute;chargement</th>
							<th>Prix</th>
							<th>URL</th>
							<th>Modifier la Demande</th>
							<th>Supprimer La Demande</Th>
						</tr>
				';
						foreach ($data as $demande) {
							echo'<tr>';
								echo'<td>'.$demande->getPropriete("ref_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("nat_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("descrip_demande").'</td>';
        						echo'<td>'.$demande->getPropriete("freq_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("statut_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("date_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("date_upload")	.'</td>';
        						echo'<td>'.$demande->getPropriete("date_download")	.'</td>';
        						echo'<td>'.$demande->getPropriete("prix")			.'</td>';
        						echo'<td>'.$demande->getPropriete("url")			.'</td>';
        						echo'<td>
        								<form method="POST" action="/eureka/rout/eur_demande/modifierdemande/null">
        									<input type="hidden" value="'.$demande->getId().'" name="id"/>
        									<input class="btn btn-warning" type="submit" value="Modifier"/>
        								</form>
        							</td>';
        						echo'<td>
        								<form method="POST" onClick="" action="/eureka/rout/eur_demande/supprimerdemande/null">
        									<input type="hidden" value="'.$demande->getId().'" name="id"/>
        									<input class="btn btn-danger" type="submit" value="Supprimer"/>
        								</form>
        							</td>';
        					echo'</tr>';		
        				}
			echo '		</table>
					</div>
				</div>';

		} elseif ($_SESSION['statut']=="admin") {
			Echo'
				<div class="row well">';
					$this->nav();
					
			echo'	<div class="well col-md-12">
						<table class="table">
						<tr>
							<th>R&eacute;f&eacuterence Demande</th>
							<th>Nature Demande</th>
							<th>Description</th>
							<th>Fr&eacute;quence</th>
							<th>Statut</th>
							<th>Date de demande</th>
							<th>Date de T&eacute;l&eacute;versement</th>
							<th>Date de T&eacute;l&eacute;chargement</th>
							<th>Prix</th>
							<th>URL</th>
							<th>Modifier la Demande</th>
							<th>Supprimer la Demande</th>
						</tr>
				';		foreach ($data as $demande) {
							echo'<tr>';
        						echo'<td>'.$demande->getPropriete("ref_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("nat_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("descrip_demande").'</td>';
        						echo'<td>'.$demande->getPropriete("freq_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("statut_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("date_demande")	.'</td>';
        						echo'<td>'.$demande->getPropriete("date_upload")	.'</td>';
        						echo'<td>'.$demande->getPropriete("date_download")	.'</td>';
        						echo'<td>'.$demande->getPropriete("prix")			.'</td>';
        						echo'<td>'.$demande->getPropriete("url")			.'</td>';
        						echo'<td>
        								<form method="POST" action="/eureka/rout/eur_demande/modifierdemande/null">
        									<input type="hidden" value="'.$demande->getId().'" name="id"/>
        									<input class="btn btn-warning" type="submit" value="Modifier"/>
        								</form>
        							</td>';
        						echo'<td>
        								<form method="POST" action="/eureka/rout/eur_demande/modifierdemande/null" >
        									<input type="hidden" value="'.$demande->getId().'" name="id">
        									<input type="submit" class="btn btn-danger value="Supprimer" onsubmit="return suppr_confirm();"/>
        								</form>
        							</td>';
        					echo'</tr>';		
        				}
			echo '		</table>
					</div>
				</div>';

		} else {
			echo'<div class="row well">
					<p>
						Vous n\'&ecirctes pas connecter, <a href="/eureka/rout/eur_user/connexion/null">Connectez-vous!</a>
					</p>
				</div>
				';
		}
			
	}
}
?>