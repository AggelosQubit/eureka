
<?php
/**
 * @File: Confirmer.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class Accueil extends Vue {

    public function contenu($cafe=array()){
	    //if($_SESSION[''])
	        echo'
				<div class="row well">
					<!--FORMULAIRE CONNEXION-->
					<div class="col-md-4">
		        		<form method="POST" action="/eur_user/connexion" class="form form-vertical ">
							<legend><strong>Autentification</strong></legend>
							<input type="text"  class="form-control" name="email" placeholder="Email"/>
							<input type="password" class="form-control"  name="password" placeholder="Mot de passe"/>
							<input type="submit" class="form-control" name="connect" value="se connecter" />
		 				</form>
		 			</div>
	        	</div>
	        '; 
    }
}
?>