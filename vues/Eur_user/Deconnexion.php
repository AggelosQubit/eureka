
<?php
/**
 * @File: Confirmer.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class Deconnexion extends Vue {

    public function contenu($data=array()){
        echo'
        		<div class="row well">
        			<p class="well" style="text-align:center;">
        				Vous avez été déconnecter correctement, A Bientôt!
        			</p>
        		</div>
            ';
    }
}
?>