<?php

if (!isset($_SESSION)) {
    session_start();
}

/*include '../setup.php';

$controllerName = $_GET['controller'];
$methodName = $_GET['method'];
if(!isset($_GET['controller'])) { $controllerName = 'Accueil'; }
if(!isset($_GET['method'])) { $methodName = 'POST'; }

$controllerClassName = "controller\\$controllerName";
echo $controllerClassName;
try {
    $class = new ReflectionClass($controllerClassName);
    $instance = $class->newInstance();
    $method = $class->getMethod($methodName);
    $method->invoke($instance);
} catch (Exception $ex) {
    //echo $ex->getMessage();
//    include VIEW . 'error.php';
    var_dump($ex);
}*/
include ("accueil.php");
?>



