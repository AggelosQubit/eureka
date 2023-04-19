<?php
include_once('../include/MysqlDao.php');
include("../setup.php");
//include ('confirm_demande.php');
if(!isset($_SESSION))
{
    session_start();
}

print_r($_SESSION);

if (isset($_SESSION['nature']) && !empty($_SESSION['nature']))  {$natu = $_SESSION['nature'];}

if (isset($_SESSION['frequence']) && !empty($_SESSION['frequence']))  {$fre = $_SESSION['frequence'];}

if (isset($_SESSION['ref']) && !empty($_SESSION['ref']))  {$dem = $_SESSION['ref'];}

if (isset($_SESSION['description']) && !empty($_SESSION['description']))  {$description = $_SESSION['description'];}

if (isset($_SESSION['id']) && !empty($_SESSION['id']))  {$idcli = $_SESSION['id'];}

if (isset($_SESSION['mail']) && !empty($_SESSION['mail']))  {$mail = $_SESSION['mail'];}


//$_SESSION['$demande']=$description;
//$_SESSION['$nature']=$natu;
//$_SESSION['$frequence']=$fre;
//$_SESSION['$demande']=$dem;


$dao = new MysqlDao;

$dao->updateDemande($dem, $natu, $description, $fre);
  
//echo 'voici votre numero de demande :" '.$dem.'" .';
echo'<br>';

echo "cliquez ici pour etre redirige vers votre menu";

?>


 <form method="post" action="accueilclient.php" class="form">
 <input type='submit' value='Confirmez' id="confirmer"/>
</form> 





