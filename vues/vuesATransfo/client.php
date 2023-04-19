<?php
// ext $nomBase, $nomuser, $numport initialisees dans config.php
// ext $nomBase nom de la base utilisee 
// ext $nomuser: login pour la base de donnees 
// ext $numport port du serveur base de donnees
// le contenu du fichier config.php doit etre complété préalablement
//include("../includes/en_tete.php");
//include("../dao/fonctions_liste.php");
// enregistrer en variable de session la variable $nomBase du fichier config
/*print_r($_SESSION);

 $_SESSION['dbname']=$dbname;
  $_SESSION['numport']=$numport;
  $_SESSION['dbuser']=$dbuser;

  enTete("Accueil", "../css/default"); 
if(isset($_SESSION['statut']))
{
    if($_SESSION['statut'] != 'Admin')
    {
        header('location:index.php?uc=c_client&cc=accueilclient');
    }
    if($_SESSION['statut'] == 'Admin')
    {
        header('location:index.php?uc=admin&ca=accueiladmin');
    }
}
else
{
*/

include 'form_identification.php'; 


include 'form_inscription.php'; 

