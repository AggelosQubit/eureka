<?php
//include("../include/fonctions_liste.php");
//include("connexion.php");
include_once("../include/MysqlDao.php");

if(!isset($_SESSION))
{
    session_start();
   
}
//$idcli = $_SESSION['id'];
if (isset($_SESSION['id']) && !empty($_SESSION['id']))  {$idcli = $_SESSION['id'];}

//$mail = $_SESSION['mail'];

$description = $_POST['comments'];
echo "<h2> Voici les caractéristiques de votre demande </h2>";
echo "Nature de votre demande : ".$_POST['nature']."</br>";
echo "Description de votre demande : ". $description."</br>";
echo "Fréquence de votre demande : ".$_POST['frequence'];
$natu = $_POST['nature'];
echo $natu;

$fre = $_POST['frequence'];
//$service = getIdNature($natu);
//echo $service['nom_service'];
echo'<br>';
$date = date("Y-m-d H:i:s");
echo $date;
echo '<br>';
$dem = $idcli + $date+rand();

$_SESSION['nature']=$natu;
$_SESSION['frequence']=$fre;
$_SESSION['description']=$description;
$_SESSION['demande']=$dem;



//if (isset($_SESSION['$nature']) && !empty($_SESSION['$nature'])){$_SESSION['$nature']=$natu;}
//if (isset($_SESSION['$frequence']) && !empty($_SESSION['$frequence'])){$_SESSION['$frequence']=$fre;}
//if (isset($_SESSION['$demande']) && !empty($_SESSION['$demande'])){$_SESSION['$demande']=$dem;}
//if (isset($_SESSION['$description']) && !empty($_SESSION['$description'])){$_SESSION['$description']=$description;}



//$pdo->ajoutdemande($dem, $natu, $description, $fre, $idcli, $mail);

echo"Si vous etes d accord avec les informations veuillez confirmez en appuyant sur 
le bouton 'Confirmez'.";

?>

 <form method="post" action="confirmationetredirection.php" class="form">
 <input type='submit' value='Confirmez' id="confirmer"/>
</form> 


