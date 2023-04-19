<!--http://localhost/localeureka/index.php?uc=formulaire-->


        <title>Ajout d'une personne</title>
      
        <form action="" method="post"> 
            <label>Nom : <input type="text" id="nom" name="nom"></label><br>
            <label>Prénom : 
                <input type="text" id="prenom" name="prenom">
            </label><br>
            <input type="submit" value="Ajouter">
        </form>
   
<?php
// formulaire.php

$dsn = 'mysql::host=localhost;dbname=db_eureka';
$username = 'root';
$passwd = '';
try {
    $dao = new MysqlDao($dsn, $username, $passwd);
    if(isset($_POST['nom'])){
    $nom = $_POST['nom'];}
    if(isset($_POST['prenom'])){
    $prenom = $_POST['prenom'];
    $dao->addPersonne($nom, $prenom);}
    } catch (PDOException $ex) {
    header('Location: vues/error_page.php');
}
