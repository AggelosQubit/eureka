<?php

require("../include/MysqlDao.php");
include ('../setup.php');
if(!isset($_SESSION))
  
{
    session_start();
}

$dao = new MysqlDao;

$email=$_SESSION['email_personne_a_supprimer'];

$dao->supprimerClient($email);

echo 'Veuillez cliquez ici pour revenir au menu'

?>


<form method="post" action="admin.php" class="form">
<input type='submit' value='revenir' id="revenir"/>
</form> 