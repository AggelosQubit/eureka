<?php
session_start();
?>
<?php
include("../include/MysqlDao.php");
include ("../setup.php");
//include("/include/MysqlDao_1.php");
//require_once("include/entity/services.php");
$dao = new MysqlDao();
//$pdo = PdoGsb::getPdoGsb();

//$services = $pdo->rechercheServices();
//$frequences = $pdo->rechercheFrequences();

/*echo $_SESSION['nom'] ;
echo ' ';
echo $_SESSION['prenom'] ;
echo '<br>';
*/
var_dump($_POST);
var_dump($_SESSION);

echo '<br>';

$ref = $_POST['ref'];
$_SESSION['ref']=$ref;
$result=$dao->rechercherInfos($ref);

foreach ($result as $key ) {

    $date =$key['date_demande'];
    $nature=$key['nat_demande'];
    $description=$key['descrip_demande'];
    $frequence=$key['freq_demande'];


    $_SESSION['descriptionOriginal']=$description;
    $_SESSION['natureOriginal']=$nature;
    $_SESSION['frequenceOriginal']=$frequence;

}

?>


<div id="fiste">
    <h1 id="titre5">Modifier l'entrée du <?php echo $date; ?></h1><br/><br/>
    <form action='confirm_demande_modif.php' method="POST" id="mod2">
        <table>
            
                
            <div>Nature du service demandé : <?php echo $nature ;?>


                        
                         <input type="button" value="Modifier" onClick="bascule('divnature'); return false ;"/> 

            </div>

            <div id ='divnature' style='display:none;'>

            <?php


                $resultnature=$dao->recherche_nature();

                echo '<select name="nature">';
                echo '<option value="">Choisissez la nature de votre demande</option>';

                  foreach ($resultnature as $key) {
                  ?>
                      <option value=" <?php echo $key['nom_service']; ?>"> <?php echo $key['nom_service']; ?></option>
                  <?php
                  }
                  echo '</select>';

                  ?>
            </div>
        <br>
        <br>
        
            <div>Description de la demande : 
                 <?php echo $description ;?>
                        
                        <input type="button" value="Modifier" onClick="bascule('divdescription') ; return false; "/> 
            </div>



            <div id ='divdescription' style='display:none;'>
                
                <textarea COLS=40 ROWS=8 name=comments placeholder="Tapez la description de votre demande" id="comments"></textarea>


            </div>



            <br>
            <br>

            <div>Fréquence demandée :
                <?php echo $frequence ;?>
                

                        <input type="button" value="Modifier" onClick="bascule('divfrequence'); return false;"/> 

             </div>  


             <div id='divfrequence' style='display:none;'>
                <?php
                                              $result=$dao->recherche_frequence();
                  echo '<select name="frequence">';
                  echo'<option value="">Choisissez une fréquence </option>';
                  foreach ($result as $key) {
                  ?>
                      <option value=" <?php echo $key['nom']; ?>"> <?php echo $key['nom']; ?></option>
                  <?php
                  }
                  echo '</select>';
    ?>


            </div>
                
                        
                            
        </table>
        <br/>
        <input type="button" value="supprimer"  onClick="Myfunction()"/>
        <button type='submit' value='Envoyer'>Soumettre</button>


    </form>




<script language="javascript" type="text/javascript">


function bascule(elem) {

   etat=document.getElementById(elem).style.display;

   if(etat=="none"){

   document.getElementById(elem).style.display="block";
    }
}

   function Myfunction(){

       var confirmation = confirm( "Voulez vous vraiment supprimer cet enregistrement ?" ) ;
  if(confirmation)
  {
    document.location.href ="suppressionEnregistrement.php";
  }

  }
</script>

   
