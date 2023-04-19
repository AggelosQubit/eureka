<?php
namespace controller;

if(!isset($_REQUEST['action'])){
$_REQUEST['action'] = 'Test';
}
$action = $_REQUEST['action'];
