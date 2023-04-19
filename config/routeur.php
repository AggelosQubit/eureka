<?php
/**
 * Script principal qui doit être lancé par le serveur dans le dossier racine du
 * projet.
 *
 * Commande a exécuter : `php -S locahost:8000 -t web app/routeur.php`
 *
 * Si la ressource demandé est une image, une feuille de style, une fonte, un
 * fichier js ou autre, On tente de la servir statiquement, c'est à dire
 * renvoyer le fichier existant dans le système de fichiers relativement au
 * dossier "web/".
 */


if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|woff2|woff|ttf|map|ico)$/', $_SERVER["REQUEST_URI"])) {
    return false;    // serve the requested resource as-is.
} else { 

	// Initialise les variables d'environnement
	include_once("config.php");
	config();


	include_once("controller/Controleur.php");
	include_once("vues/Vue.php");

	// Analyse de la requête.
	// On souhaite une URI de la forme "/controleur/action[/id]". 
	// Si ce n'est pas le cas on retourne une page d'erreur.
	$uri = $_SERVER["REQUEST_URI"];

	// On ne s'occupe pas ici des données GET (elles sont déjà gérées par PHP)
	$uri = explode("?", $uri)[0];

	// Si pas d'URI alors on redirige vers la page par défaut.
	// TODO :  à modifier probablement
	if($uri === "/"){
		$c = new Controleur();
		$c->actionIndex();
		exit();
	}

	$parties = explode("/", $uri);

	
	assert($parties[0] === "");
	assert(count($parties)>2 && count($parties)<6);

	$controleur = $parties[1];
	$action = $parties[2];
	if( !isset($action) || $action == ""){
		$action = "index";
	}
	if(count($parties) == 4){
		$id = $parties[3];
	}
	else {
		$id = NULL;
	}


	// On essaie de trouver un controleur qui correspond à celui passé en paramètre. 
	//  si le controleur trouvé dans l'URI s'appelle "truc" alors on charge le controleur "ControleurTruc"

	$nomControleur = "Controleur".ucfirst($controleur);


	// action
	// 
	$methodeAction = "action".ucfirst($action);



	try {
		include_once("controller/$nomControleur.php");
		$classeControleur =  new ReflectionClass($nomControleur); 
		$objetControleur = $classeControleur->newInstance();
		$objetControleur->$methodeAction(intval($id));
	} catch (Exception $e){
		Vue::erreur404($e);
		exit();
	}

}