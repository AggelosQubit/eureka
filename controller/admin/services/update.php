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
    $id = null;
    if ( !empty($_GET['id'])) {
        $id = $_REQUEST['id'];
    }
     
    if ( null==$id ) {
        header("Location: ../ajoutservices.php");
    }
     
    if ( !empty($_POST)) {
        // keep track validation errors
        $serviceError = null;
        $prixError = null;
        
         
        // keep track post values
        $nom_service = $_POST['nom_service'];
        $prix = $_POST['prix'];
        
         
        // validate input
        $valid = true;
        if (empty($nom_service)) {
            $serviceError = 'Entrer nom service';
            $valid = false;
        }
         
        if (empty($prix)) {
            $prixError = 'Entrer un prix';
            $valid = false;
        
        }
         
      
         
        // update data
        if ($valid) {
           
            $result=$dao->update_services($nom_service,$prix,$id);
            if($result){header("Location: ../ajoutservices.php");}
            
            
        }
    } else {
        
        $resultat=$dao->lire_service_Id($id);
        foreach ($resultat as $key) {

        $nom_service=$key['nom_service'];
        $prix = $key['prix'];
          
        }
    }
?>

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
                        <h3>Modifier un service</h3>
                    </div>
             
                    <form class="form-horizontal" action="update.php?id=<?php echo $id?>" method="post">
                      <div class="control-group <?php echo !empty($serviceError)?'error':'';?>">
                        <label class="control-label">Nom Service</label>
                        <div class="controls">
                            <input name="nom_service" type="text"  placeholder="nom service" value="<?php echo !empty($nom_service)?$nom_service:'';?>">
                            <?php if (!empty($serviceError)): ?>
                                <span class="help-inline"><?php echo $serviceError;?></span>
                            <?php endif; ?>
                        </div>
                      </div>
                      <div class="control-group <?php echo !empty($prixError)?'error':'';?>">
                        <label class="control-label">Prix</label>
                        <div class="controls">
                            <input name="prix" type="text" placeholder="prix" value="<?php echo !empty($prix)?$prix:'';?>">
                            <?php if (!empty($prixError)): ?>
                                <span class="help-inline"><?php echo $prixError;?></span>
                            <?php endif;?>
                        </div>
                      </div>
                      
                      <div class="form-actions">
                          <button type="submit" class="btn btn-success">Mettre a jour</button>
                          <a class="btn" href="../ajoutservices.php">Retour</a>
                        </div>
                    </form>
                </div>
                 
    </div> <!-- /container -->
  </body>
</html>

