
<?php
/**
 * @File: Confirmer.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class Connexion extends Vue {
    public function contenu($data=array())
    {
        if(isset($_SESSION['id']))//si la variable session id n'existe pas
        {
			if( isset($data['etat']) && $data['etat']=="ConnexionR")
			{
				if($_SESSION['statut']!="admin")
				{
					echo'
						<div class="row panel panel-success">
							<div class="panel-heading">
								<h3 style="text-align:center;">Connexion R&eacute;ussie <i class="glyphicon glyphicon-sign"></i></h3>
							</div>
							<div class="panel-body">
					    		<p style="text-align:center;"">
					    			La Connexion &eacute;tablie Veuillez acc&eacute;d&eacute; &agrave; votre espace client!</br>
					    			<a style="text-align:center;" href="/eureka/rout/eur_user/espaceclient/null" 	title="Votre espace dédié"	class="btn btn-default"	>Aller vers L\'Espace Client...</a>
					    		</p>
					    		
					    	</div>
					   	</div>
					';
				} else {
					echo'
						<div class="row panel panel-success">
							<div class="panel-heading">
								<h3 style="text-align:center;">Connexion R&eacute;ussie <i class="glyphicon glyphicon-sign"></i></h3>
							</div>
							<div class="panel-body">
					    		<p style="text-align:center;"">
					    			La Connexion &eacute;tablie Veuillez acc&eacute;d&eacute; &agrave; votre espace administrateur!</br>
					    			<a style="text-align:center;" href="/eureka/rout/eur_user/espaceclient/null" 	title="Espace Admin"	class="btn btn-default"	>Aller vers L\'Espace Admin...</a>
					    		</p>
					    		
					    	</div>
					   	</div>
					';
				}
			}
		} else {
				if( isset($data['etat']) && $data['etat']=="ConnexionF")
				{
					echo'
							<div class="row panel panel-danger">
								<div class="panel-heading">
									<h3 style="text-align:center;">Connexion Impossible <i class="glyphicon glyphicon-remove"></i></h3>
								</div>
								<div class="panel-body">
						    		<p style="text-align:center;"">
						    			La Connexion &agrave; &eacute;chou&eacute;e Veuillez-vous de la saisie de vos identifiants!</br>
						    			<a href="#">Mot de passe oubli&eacute</a>?
						    		</p>
						    	</div>
						   	</div>
						';
				}
				echo'<div class="row well" >
	        			<div class="col-md-12" id="accordionConn">
		        			<h3>Connexion</h3>
		        			<form class="form-vertical" method="POST" action="/eureka/rout/eur_user/connexion/null">
								<input class="form-control" type="text" placeholder="Email..." name="email"/>
								<input class="form-control" type="password" placeholder="Mot de passe..." name="password"/>
								<button class="btn btn-primary form-control" type="submit">Se Connecter</button>
							</form>
							<h3>Inscription</h3>
					        <form method="POST" action="/eureka/rout/eur_user/inscription/null" id="formIns" class="form-vertical" onsubmit="return checkform(this);">
			   					<input class="form-control" type="text"  	placeholder="Nom..."					name="nom" />
								<input class="form-control" type="text"  	placeholder="Pr&eacute;nom..."			name="prenom" />
								<input class="form-control" type="text"  	placeholder="Raison Sociale..."			name="raison" />
								<br/>
								<input class="form-control" type="email" 	placeholder="Email..."					name="email" />	
			  					<input class="form-control" type="email" 	placeholder="Comfirmer Email..."		name="confirm_email" />
								<br>
								<select class="form-control" 														name="statut">
									<option value="" disabled selected	>Statut Choisi...</option>
									<option value="Client"> Client</option><!--Client-->
									<option value="prospect"> Prospect</option><!--Client a voir-->
									<option value="abonné"> Abonné newsletter</option><!--Client abonné au newsletter-->
								</select>
			      				<select class="form-control" 														name="forme">
									<option value="" disabled selected	>Forme Juridique... </option>
									<option value="SA"	> SA</option>
									<option value="SARL"> SARL</option>
									<option value="PME"	> PME</option>
								</select>
								<br/>
								<input class="form-control" type="tel"   	placeholder="Tel Fixe..."				name="tel" 	maxlength="10"/>
								<input class="form-control" type="tel" 	 	placeholder="Tel portable..."			name="portable" maxlength="10"/>
			   					<input class="form-control" type="tel" 	 	placeholder="Fax..."					name="fax" 	maxlength="10"/>
								<br/>
								<input class="form-control" type="text" 	placeholder="Adresse..."				name="adresse" />
								<input class="form-control" type="text" 	placeholder="Code Postal..."			name="codePostal" maxlength="5" />
								<input class="form-control" type="text" 	placeholder="Ville..."					name="ville" />		
								<br/>
								<input class="form-control" type="password" placeholder="Mot de passe..."			name="password"	minlength="6" maxlength="20"/>
			  					<input class="form-control" type="password" placeholder="Confirme Mot de passe..."	name="confirm_password"  minlength="6" maxlength="20"/>
			  					<br/>
								<input class="form-control btn btn-primary" type="submit" value="Confirmer"/>
			 				</form>
		        		</div>
	        		</div>';
    	}
    }
}
?>