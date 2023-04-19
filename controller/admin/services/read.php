<?php

//Lire les services

session_start();
if (isset($_SESSION['mail'])) {
include('../../include/MysqlDao.php');
include ('../../setup.php');
$dao = new MysqlDao;
}
else {
echo 'Les variables ne sont pas déclarées.';
}

    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if (null==$id) {
        header("Location:../ajoutservices.php");
    } else {
    
    $data=$dao->lire_service_Id($id);

    }
    foreach ($data as $key) {
      $nomservice = $key['nom_service'];
      $prixservice = $key['prix'];
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
                        <h3>Services</h3>
                    </div>
                     
                    <div class="form-horizontal" >
                      <div class="control-group">
                        <label class="control-label">Nom du Service</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $nomservice;?>
                            </label>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label">Prix du Service</label>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $prixservice;?>
                            </label>
                        </div>
                      </div>
  
                        <div class="form-actions">
                          <a class="btn" href="../ajoutservices.php">retour</a>
                       </div>
                     
                      
                    </div>
                </div>
                 
    </div> 
  </body>
</html>
