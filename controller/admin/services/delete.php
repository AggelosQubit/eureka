<?php

session_start();
if (isset($_SESSION['mail'])) {
include('../../include/MysqlDao.php');
include ('../../setup.php');
$dao = new MysqlDao;
}
else {
echo 'Les variables ne sont pas déclarées.';
}
    $id = 0;
     
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $id = $_POST['id'];
         
        // delete data
       $dao->supprimer_service($id);
        header("Location: ../ajoutservices.php");
         
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="../../css/bootstrap.min.css" rel="stylesheet">
    <script src="../../js/bootstrap.min.js"></script>
</head>
 
<body>
    <div class="container">
     
                <div class="span10 offset1">
                    <div class="row">
                        <h3>Supprimer un service</h3>
                    </div>
                     
                    <form class="form-horizontal" action="delete.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $id;?>"/>
                      <p class="alert alert-error">Etes vous sure de vouloir supprimer cet entrée ?</p>
                      <div class="form-actions">
                          <button type="submit" class="btn btn-danger">Oui</button>
                          <a class="btn" href="../ajoutservices.php">Non</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>
