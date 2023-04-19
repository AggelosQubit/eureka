<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php

include("form_identification.php");
$stat=$_POST['form1'];

	
/*if($stat=="client"){
 
 statut_infos('nom', 'asc', 'WHERE statut = ' . "'Client'");
}*/
if($stat=="Prospect"){

 statut_infos('nom', 'asc', 'WHERE statut = ' . "'Prospect'");
}
if($stat=="Abonné newsletter"){

 statut_infos('nom', 'asc', 'WHERE statut = ' . "'Abonné newsletter'");
}


?>
<body>
</body>
</html>
