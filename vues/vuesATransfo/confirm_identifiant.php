<?php
session_start();
?>
<?php


$nom=$_POST['nom'];
$pass=$_POST['pass'];
$type=$_POST['type'];
$nomC=$_POST['nom'];
$passC=$_POST['pass'];

if($type=="Admin"){

$requette="SELECT login , password from eur_admin where login='$nom' and password='$pass'"; 
$result = mysql_query($requette);
if(!$result || mysql_num_rows($result)==0){

echo"<script language='JavaScript'>
     alert('erreur d\'authentification');
     window.location.replace('../index.php?uc=client');
    </script>";
}
else{
	$row=mysql_fetch_array($result);
		$_SESSION['id']=$row['id'];
		$_SESSION['login']=$row['login'];
header('Location: ../admin/admin.php');		
}
}

else if($type=="Client"){

$requet="SELECT nom,id, prenom, email, password from eur_users where email='$nomC' and password='$passC'"; 
$resulta = mysql_query($requet);
if(!$resulta || mysql_num_rows($resulta)==0){
    echo"<script language='JavaScript'>
     alert('erreur d\'authentification');
     window.location.replace('../index.php?uc=client');
    </script>";
}
else{
		$row=mysql_fetch_array($resulta);
		$_SESSION['id']=$row['id'];
		$_SESSION['email']=$row['email'];
		$_SESSION['nom']=$row['nom'];
		$_SESSION['prenom']=$row['prenom'];
header('Location: ../vues/accueilclient.php');
		
}
}else{
		echo"<script language='JavaScript'>
     alert('Erreur d\'authentification.');
     window.location.replace('../index.php?uc=client');
    </script>";
}



//<?php
  /*  
error_reporting(E_ALL);
    $dao = new MysqlDao();
    if(isset($_POST['connect'])){
     
    if (isset($_POST['email'])){
		$mail =$_POST['email'];}
		else{
		echo 'problm email';
		}
		
    if (isset($_POST['password'])){
		$pwd = $_POST['password'];}
		else{
		echo 'problm password';
		}
         if (isset($_POST['type'])){
             
		$type = $_POST['type'];}
		else{
		echo 'problm type';
		}
      if($type=="Admin"){
         
      }          
        else{        
        
     $dao->identificationClient($mail, $pw);}
    header('Location: vues/accueilclient.php'); 
    }