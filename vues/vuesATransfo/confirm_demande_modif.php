<?php
if(!isset($_SESSION))
{
    session_start();
}




$idcli = $_SESSION['id'];

if(empty($_POST['nature']))
	{
		
		$natu=$_SESSION['natureOriginal'];
	}
else {
	
	$natu = $_POST['nature'];
	}

if(empty($_POST['frequence']))
	{

		$fre=$_SESSION['frequenceOriginal'];
	}
else {
	
	$fre = $_POST['frequence'];
	}

if(empty($_POST['comments']))
	{
		
		$description=$_SESSION['descriptionOriginal'];
	}
else {
	
	$description = $_POST['comments'];
}







$ref= $_SESSION['ref'];




echo "Reference de votre demande : ".$ref."</br>";
echo "<br>";
echo "<h2> Voici les caractéristiques de votre demande </h2>";
echo "Nature de votre demande : ".$natu."</br>";
echo "Description de votre demande : ".$description."</br>";
echo "Fréquence de votre demande : ".$fre."</br>";


$date = date("Y-m-d H:i:s");
echo $date."</br>";
echo ' ';


$_SESSION['nature']=$natu;
$_SESSION['frequence']=$fre;
$_SESSION['description']=$description;



echo"Si vous etes d accord avec les informations veuillez confirmez en appuyant sur 
le bouton 'Confirmez'.";

?>

 <form method="post" action="resumeModification.php" class="form">
 <input type='submit' value='Confirmez' id="confirmer"/>
</form> 

