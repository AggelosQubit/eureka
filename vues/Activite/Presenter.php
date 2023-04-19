
<?php
/**
 * @File: Presenter.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class Presenter extends Vue 
{
	public function contenu($data=array())
	{
		Echo'<div class="row well">
				Vue Presenter de Activite
			</div>';
	}
}
?>