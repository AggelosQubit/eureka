<?php

session_start();

include("../include/MysqlDao.php");
include ("../setup.php");

$dao = new MysqlDao();

$ref=$_SESSION['ref'];
echo $ref;

$result = $dao->supprimerEnrengistrement($ref);




