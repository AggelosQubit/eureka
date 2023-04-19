<?php

/**
 * Chargement des variables globales nécessaires à l'application. Les valeurs
 * des variables sont stockées dans la variable globale $_ENV. On ne défini une
 * variable que si elle n'existe pas déjà. Cela permet de surcharger
 * @param  array  $cfg Tableau contenant les variables d'environnement
 */
function config($cfg = array( 
	"DB_DSN" => "mysql:host=localhost;dbname=db_eureka",
 	"DB_USER" => "root",
 	"DB_PASSWORD" => "",
 	"DB_DBNAME" => "db_eureka",
 	"DEBUG" => TRUE)){

	foreach( $cfg as $k => $v) {
    	if(!isset($_ENV[$k])){
    		$_ENV[$k] = $v;
    	}
	}
};

?>