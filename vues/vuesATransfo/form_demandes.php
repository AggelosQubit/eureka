<link rel="stylesheet" type="text/css" href="../css/form.css" media="all"/>  
<link rel="stylesheet" type="text/css" href="../css/menu.css" media="all"/> 
<link rel="stylesheet" type="text/css" href="../css/menuClient.css" media="all"/> 
<link rel="stylesheet" type="text/css" href="../css/table.css" media="all"/> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<?php
require ('../include/MysqlDao.php');
include ("../setup.php");
$dao = new MysqlDao();
?>
 <figure>
         <img src="../images/logo.png" alt="logo" />
    </figure>

 <section id="article12" >
                  <div class="menu_div">
<ul class="menu_ul">
<li><a href="">Compte</a>
<ul>
<li><a href="../vues/accueilclient.php">Acceuil</a></li>
<li><a href="../admin/deconnexion.php">Deconnexion</a></li>
</ul>
</li>
<li><a href="">Configuration</a>
<ul>
<li><a href="modifier.php">Parametre du compte</a></li>
<li><a href="configcompte.php">Preference du contacte</a></li>
</ul>
<li><a href="">business</a>
<ul>
<li><a href="facture.php">Mes factures</a></li></ul>
</li>
</div>
</section>



<div id="fiste">
    <h1 id="titre5">Formulaire de demande</h1><br/><br/>
    <form action='confirm_demande.php' method="POST" id="mod2">
        <table>
                 
            <tr><td>Nature du service demandé: 
             <!--  <form method="post" action="index.php?uc=c_client&cc=recherchefrequence" class="form"> -->
             <?php    


             $resultnature=$dao->recherche_nature();
             /*
                echo'<select name="eur_frequences">';
                foreach ($resultnature as key){
                  ?>
                    <option value=" <?php echo $key['nom_service']; ?>"> <?php echo $key['nom_service']; ?></option>
                   <?php
                 }
                 echo'</select>';*/

                 echo '<select name="nature">';
                  foreach ($resultnature as $key) {
                  ?>
                      <option value=" <?php echo $key['nom_service']; ?>"> <?php echo $key['nom_service']; ?></option>
                  <?php
                 
                  }

                  echo '</select>';


                 
                ?>

                </td>


                 
            <tr><td colspan=2>Description de la demande (*) : <br />
                    <textarea COLS=40 ROWS=8 name=comments placeholder="Tapez la description de votre demande" id="comments"></textarea>
                </td></tr>




            <tr><td>Fréquence demandée: <?php
            //Daouda 5/11/14 
                              $result=$dao->recherche_frequence();
                  echo '<select name="frequence">';
                  foreach ($result as $key) {
                  ?>
                      <option value=" <?php echo $key['nom']; ?>"> <?php echo $key['nom']; ?></option>
                  <?php
                  }
                  echo '</select>';
    ?>
          </td>
                <td>
                     
                          
                            
        </table><br/>
        <input type='hidden' name='ref' value='$ref' />
        <input type='submit' value='Envoyer' id="envoyer2"/>
        </form> 

   
