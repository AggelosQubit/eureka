<?php

session_start();

include ('../../include/MysqlDao.php');
include('../../setup.php');

$dao = new MysqlDao();

$idfichier=$_POST['idfichier'];

$ref=$_POST['ref'];


$file=$dao->recupererfiles($ref);

foreach ($file as $key)  {

	$url = $key['file_url'];

}

$result=$dao->supprimerFichier($idfichier);

if($result)

{


	echo "Votre demande de suppression a ete bien pris en compte";
	unlink($url);

	
}

else echo"sa marche pas";

echo "<a class='btn' href='../afficher_demande.php'>Retour</a>";