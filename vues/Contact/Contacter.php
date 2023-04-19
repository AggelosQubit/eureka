
<?php
/**
 * @File: Confirmer.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class Contacter extends Vue 
{
	public function contenu($data=array())
	{
		Echo'
			<div role="tabpanel">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" >
						<a href="#nousContacter" aria-controls="nousContacter" role="tab" data-toggle="tab">
							Nous Contacter 
							<span class="caret"></span>
						</a>
					</li>
    				<li role="presentation">
    					<a href="#nousRejoindre" aria-controls="nousRejoindre" role="tab" data-toggle="tab">
    						Nous Rejoindre 
    						<span class="caret"></span>
    					</a>
    				</li>
    				<li role="presentation">
    					<a href="#carte" aria-controls="carte" role="tab" data-toggle="tab">
    						Plan d\'Acc&egrave;s 
    						<span class="caret"></span>
    					</a>
    				</li>
  				</ul>

 		 		<!-- Tab panes -->
  				<div class="tab-content">

  					<!--CONTACTER -->
				    <div role="tabpanel" class="tab-pane fade active" id="nousContacter">
				    	<div class="row well">
				    		<div class="panel panel-success">
								<div class="panel-heading">
									<h3 style="text-align:center;">Nous Contacter <i class="glyphicon glyphicon-envelope"></i></h3>
								</div>
								<div class="panel-body">
						    		<div class="col-md-12 well">
										<p style="text-align:center;">
											Vous voulez prendre rendez-vous pour un projet ou obtenir des conseils quelconque?<br>
											Vous voulez nous faire part d\'&eacute;l&eacute;ments &agrave; am&eacute;liorer?<br>
											Envoyez nous un couriel <i class="glyphicon glyphicon-thumbs-up"></i>.<br>
										</p>
									</div>	
									<div class="col-md-6 well">
										<!--FORMULAIRE-->
										<form method="POST" action="#" id="contactForm" class="form form-vertical">
											<input type="text" 	class="form-control" name="nom"	placeholder="Nom...">
											<input type="text" 	class="form-control" name="prenom" placeholder="Prénom...">
											<input type="tel" 	class="form-control" name="telephone" placeholder="Téléphone...">
											<input type="text"	class="form-control"	name="sujet" placeholder="Sujet...">
											<textarea form="contactForm" rows="6" class="form-control"	name="corpsMessage" placeholder="Entrez Vôtre texte..."></textarea>		
											<button type="submit" class="btn btn-success form-control"><i class="glyphicon glyphicon-ok-sign">
												</i>Envoyer votre message
											</button>
										</form>
									</div>
									<div class="col-md-offset-1 col-md-5 well">
										<!--INFORMATIONS-->
										<table class="table">	
											<caption><h3>Informations</h3></caption>
											<tr><td>Nom</td><td></td></tr>

											<tr><td>Ville</td><td></td></tr>
											<tr><td>Adresse</td><td></td></tr>
											<tr><td>Code Postal</td><td></td></tr>

											<tr><td>Téléphone</td><td></td></tr>
											<tr><td>Fax</td><td></td></tr>

											<tr><td>Adresse &eacute;lectronique</td><td></td></tr>
										</table>
									</div>
								</div>
						    </div>
				    	</div>
				    </div>

				    <!--REJOINDRE -->
				    <div role="tabpanel" class="tab-pane fade" id="nousRejoindre">
				    	<div class="row well">
				    		<div class="panel panel-info">
								<div class="panel-heading">
									<h3 style="text-align:center;">Nous Rejoindre <i class="glyphicon glyphicon-plus-sign"></i></h3>
								</div>
								<div class="panel-body">
									<div class="col-md-12 well">
										<p style="text-align:center;">
											Vous souhaitez int&eacute;grer une structure à fort potentiel?<br>
											Vous pensez avoir des comp&eacute;tences qui pourraient nous &ecirctre utiles? <br>
											Envoyez une candidature spontanée <i class="glyphicon glyphicon-thumbs-up"></i>
										</p>
									</div>	
									<div class="span8 offset2 ">
										<!--FORMULAIRE-->
										<form method="POST" enctype="multipart/form-data" action="contact.php?formRempliRejoindre=true" id="rejoindreForm" class="form form-vertical" onsubmit="return checkformRejoindre(this);">
										<!-- On limite le fichier à 300Ko -->
											<input type="hidden" name="MAX_FILE_SIZE" value="300000">
											<input type="text" 		class="form-control" 	name="nom" 	 		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Nom..."/>
											<input type="text" 		class="form-control"	name="prenom" 		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Prénom..."/>
											<input type="tel" 		class="form-control"	name="telephone" 	title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Téléphone..."/>
											<input type="text" 		class="form-control"	name="mail" 		title="Mail"												placeholder="Adresse électronique..."/>
											<input type="text" 		class="form-control"	name="sujet"  		title="N\'utiliser les caractères suivant (\ \' ; .  - )"	placeholder="Sujet..."/>
											<label for="curriVita">Curriculum Vitae (doc,docx,odt,pdf)</label>	<input type="file"	class="form-control"  id="curriVita"   name="curriVita"/>
											<label for="lettreMotiv">Lettre de Motivation (doc,docx,odt,pdf)</label><input type="file"	class="form-control"   id="lettreMotiv"   name="lettreMotiv"/>
											<textarea form="rejoindreForm" rows="6" class="form-control"	name="corpsMessage"		placeholder="Entrez Vôtre texte..."></textarea>		
											<button type="submit" class="form-control btn btn-info"><i class="glyphicon glyphicon-ok-sign"></i>Envoyer votre message</button>
										</form>
									</div>
						    	</div>
						    </div>
				    	</div>
				    </div>

				    <!--CARTE -->
				    <div role="tabpanel" class="tab-pane fade" id="carte">
				    	<div class="row well">
				    		<div class="panel panel-warning">
								<div class="panel-heading">
									<h3 style="text-align:center;">Plan d\'Acc&egrave;s <i class="glyphicon glyphicon-globe"></i></h3>
								</div>
								<div class="panel-body">
						    		<div class="col-md-8 col-md-offset-1">
						    			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2627.080231572564!2d2.2857094999999994!3d48.8185306!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67062c9a38e83%3A0xc94fa02b734dd279!2s7+Rue+Raymond+Marcheron%2C+92170+Vanves!5e0!3m2!1sfr!2sfr!4v1430837050389" width="800" height="600" frameborder="0" style="border:0"></iframe>
						    		</div>
						    	</div>
						   	</div>
				    	</div>
				    </div>
  				</div>
			</div>
			';
	}
}
?>