<?php
$dao= new \MysqlDao();
if(!isset($_REQUEST['action'])){
$_REQUEST['action'] = 'admin';
}
$action = $_REQUEST['action'];

switch($action){   
  case 'affichage_infos';
    
    $dao->affichage_infos($mail);
      break;
}

 
