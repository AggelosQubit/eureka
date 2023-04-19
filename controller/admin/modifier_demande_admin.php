<?php
session_start();
?>
<?php
include("../include/fonctions_liste.php");
//include("/include/MysqlDao_1.php");
//require_once("include/entity/services.php");
//$dao = new dao\MysqlDao_1();
//$pdo = PdoGsb::getPdoGsb();

//$services = $pdo->rechercheServices();
//$frequences = $pdo->rechercheFrequences();
$ref=$_POST['ref'];
echo $ref ;

?>


<div id="fiste">
    <h1 id="titre5">Formulaire de demande</h1><br/><br/>
    <form action='confirm_demande_modif_admin.php' method="POST" id="mod2">
        <table>
            
                
            <tr><td>Nature du service demandé (*) : </td>
                <td>
                        <?php recherche_nature(); ?>
                            
                    
            <tr><td colspan=2>Description de la demande (*) : <br />
                    <textarea COLS=40 ROWS=8 name=comments placeholder="Tapez la description de votre demande" id="comments"></textarea>
                </td></tr>
            <tr><td>Fréquence demandée (*) : </td>
                <td>
                        <?php recherche_frequence(); ?>
                            
        </table><br/>
        <input type='hidden' name='ref' value= "<?php echo $ref;?>" />
        <input type='submit' value='Envoyer' id="envoyer2"/>
    </form>

   
