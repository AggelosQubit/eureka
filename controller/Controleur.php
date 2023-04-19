<?php
session_start();
include_once('/vues/Vue.php');
class Controleur 
{
	public function rendu($vue= "vue", $data = array())
	{

        
		// qui suis-je ? 
		$myClassName = get_called_class();
		
		// Le nom du controleur est normalement préfixé par le mot "Controleur" (10 lettres)
		$controleur = strtolower(substr($myClassName, 10));

		//La vue doit avoir une majuscule
		$vue = ucfirst($vue);

		// Si la vue s'appelle "Vue" alors on affiche la vue d'index par défaut sans nom de contrôleur.
		if($vue == "Vue"){ $controleur = ""; }

		// inclusion du code
		$includefile = "vues/$controleur/$vue.php";
		if (file_exists($includefile)) { include_once($includefile); }
		
		// Instanciation dynamique d'un objet qui hérite de Vue
		$classeVue = new ReflectionClass($vue);
		$objetVue =  $classeVue->newInstance();

		// On construit la page avec les 3 méthodes 
		$objetVue->entete();
		$objetVue->contenu($data);
		$objetVue->pied();
	}

	
	public function actionIndex(){ $this->rendu(); }
}