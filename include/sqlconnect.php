<?php       
require ('../setup.php');
	$conf = parse_ini_file(INI_FILE);
     $host = $conf['host'];
     $db_name = $conf['db_name'];
     $user=$conf['user'];
     $password=$conf['password'];
     $datasource="mysql:host=$host;dbname=$db_name";
     $conn = new PDO($datasource,$user,$password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));       
 	$daouda ='daouda';