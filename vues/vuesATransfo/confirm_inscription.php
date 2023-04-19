<?php
           
error_reporting(E_ALL);
  
   try {
    $dao = new MysqlDao(/*$datasource, $user, $password*/);

    $stat = mysql_real_escape_string ($_POST['statuts']);
    $form = mysql_real_escape_string( $_POST['formes_juridiques']);
    $rais = mysql_real_escape_string($_POST['raison_sociale']);
    $nomc = mysql_real_escape_string( $_POST['nom_contact']);
    $prenc = mysql_real_escape_string($_POST['prenom_contact']);
    $mailc = mysql_real_escape_string($_POST['email_contact']);
    $confmail = mysql_real_escape_string( $_POST['confirm_email']);
    $telc = mysql_real_escape_string($_POST['tel_contact']);
    $portc = mysql_real_escape_string($_POST['port_contact']); 
    $faxc = mysql_real_escape_string($_POST['fax_contact']);
    $pass = mysql_real_escape_string( $_POST['password']);
    $confpass = mysql_real_escape_string($_POST['confirm_password']);
	$cle = md5(microtime(TRUE)*100000);
        
    $adresse = mysql_real_escape_string($_POST['adresse']);
    $code_postal = mysql_real_escape_string($_POST['codePostal']);
    $ville = mysql_real_escape_string($_POST['ville']);
       
        
    $dao->inscriptionUser($stat, $form, $rais, $nomc, $prenc, $mailc, $telc, $portc, $faxc, $pass, $cle,now(),$adresse,$code_postal,$ville);
   
    header('Location: vues/client.php');

} catch (PDOException $ex) {
    header('Location: vues/error_page.php');
    
} 