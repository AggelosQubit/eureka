<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document sans titre</title>
</head>
<?php

$requette = mysql_query("SELECT statut, id, forme, raison, nom, prenom, email, tel, portable, fax FROM eur_users $critere ORDER BY $name $ordre");

?>
<body>
</body>
</html>
