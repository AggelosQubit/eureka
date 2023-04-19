<form method="post" action="index.php?uc=connexion&action=inscription" class="form">
   
 <fieldset>
  <legend><strong>Inscription</strong></legend>
  
<table>       
<tr>
   
   <td><label for="input1">Statut&nbsp;:</label></td>
   
	  <td><select name="statuts" id="input1">
 
		<option value="Client"> Client</option>
		<option value="prospect"> Prospect</option>
		<option value="abonné"> Abonné newsletter</option>
   </select>
          </td>
 
   </tr>
   
   <tr>
      <td><label for="input1">Forme juridique&nbsp;:</label></td>
      
     <td><select name="formes_juridiques" id="input2">
 
		<option value="SA"> SA</option>
		<option value="SARL"> SARL</option>
		<option value="PME"> PME</option>
   </select>
         </td>
 
   </tr>
   <tr>
 
    <td><label for="input3">Raison Sociale selon Kbis &nbsp;:</label></td>
  
   
    <td><input type="text" id="input3" name="raison_sociale" /></td>
   
   </tr>
   
   <tr>
  
    <td><label for="input4">Nom du contact &nbsp;:</label> </td>
   

    <td><input type="text" id="input4" name="nom_contact" /></td>
  
   </tr>
   
   <tr>
 
    <td><label for="input5">Prénom du contact &nbsp;:</label> </td>
  
   
    <td><input type="text" id="input5" name="prenom_contact" /></td>
   
   </tr>
   
   <tr>
   
    <td><label for="input6">E-mail de contact &nbsp;:</label></td>
  
   
    <td><input type="email" id="input6" name="email_contact" /></td>
 
   </tr>
   
   <tr>
  
    <td><label for="input7">Confirmez votre e-mail&nbsp;:</label></td>
  

    <td><input type="email" id="input7" name="confirm_email" /></td>
  
   </tr>
   
   <tr>
 
    <td><label for="input8">Tél. du contact &nbsp;:</label> </td>
  
    
    <td><input type="tel" id="input8" name="tel_contact" /></td>
   
   
   <tr>
   
    <td><label for="input9">Portable du contact &nbsp;:</label></td>
 

    <td><p><input type="tel" id="input9" name="port_contact" /></p></td>

   </tr>
   
   <tr>

    <td><label for="input10">Fax du contact &nbsp;:</label> </td>
   
 
    <td><input type="tel" id="input10" name="fax_contact" /></td>
   
   </tr>
   
    <tr>
 
    <td><label for="input11">Mot de passe &nbsp;:</label></td>
  
    <td><input type="password" id="input11" name="password" /></td>
  
   </tr>
   <tr>

    <td><label for="input12">Confirmez votre mot de passe &nbsp;:</label> </td>
  

    <td><input type="password" id="input12" name="confirm_password" /></td>
  
   </tr>
   <tr>

    <td><label for="input13">Adresse &nbsp;:</label> </td>
  

    <td><input type="text" id="input13" name="adresse" /></td>
  
   </tr>
   <tr>

    <td><label for="input14">Code postal &nbsp;:</label> </td>
  

    <td><input type="text" id="input14" name="codePostal" maxlength="5" /></td>
  
   </tr>
   <tr>

    <td><label for="input15">Ville &nbsp;:</label> </td>
  

    <td><input type="text" id="input15" name="ville" /></td>
  
   </tr>
    <tr>
   
       <td> <input type="submit" name="connect" value="Confirmer" /></td>
    </tr>
</table>
  </fieldset>
  
 </form>
<?php
    
error_reporting(E_ALL);
 
/*$dsn = 'mysql::host=localhost;dbname=db_eureka';
$username = 'root';
$passwd = '';
 * 
Avant de mettre en oeuvre un fichier config.ini appelé par setup.php, il fallait spécifier le nom
 * de la connection avant chaque appel Modele
 *  */

/*
try {

    $dao = new Modele();
    
    if(isset($_POST['connect'])){
        
    if(isset($_POST['statuts'])){
    $stat =$_POST['statuts'];
    }
    else{'prblm';}
    
    if(isset($_POST['formes_juridiques'])){
    $form = $_POST['formes_juridiques'];
    }
    else{'prblm';}
    
    if(isset($_POST['raison_sociale'])){
    $rais =$_POST['raison_sociale'];
     }
     else{'prblm';}
     
    if(isset($_POST['nom_contact'])){
    $nomc = $_POST['nom_contact'];
    }
    else{'prblm';}
    
    if(isset($_POST['prenom_contact'])){
    $prenc = $_POST['prenom_contact'];
    }
    else{'prblm';}
    
    if(isset($_POST['email_contact'])){
    $mailc = $_POST['email_contact'];
    }
    else{'prblm';}
    
    if(isset($_POST['confirm_email'])){
    $confmail =$_POST['confirm_email'];
    }
    else{'prblm';}
    
    if(isset($_POST['tel_contact'])){
    $telc = $_POST['tel_contact'];
    }
    if(isset($_POST['port_contact'])){
    $portc = $_POST['port_contact']; 
    }
    else{'prblm';}
    
    if(isset($_POST['fax_contact'])){
    $faxc =$_POST['fax_contact'];
    }
    else{'prblm';}
    
    if(isset($_POST['password'])){
    $pass =$_POST['password'];
    }
    else{'prblm';}
    
    if(isset($_POST['confirm_password'])){
    $confpass = $_POST['confirm_password'];
    }else{'prblm';}
     
	$cle = md5(microtime(TRUE)*100000);
        $date = date("Y-m-d H:i:s");
        
        
$dao->inscriptionUser($stat, $form, $rais, $nomc, $prenc, $mailc, $telc, $portc, $faxc, $pass, $cle, $date);}
   } catch (PDOException $ex) {
    header('Location: vues/error_page.php');
   }
   */
 
   