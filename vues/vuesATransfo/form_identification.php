
     <form method="post" action="index.php?uc=connexion&action=connexion" class="form">
   <!---->
    <fieldset>
 
     <legend><strong>Autentification</strong></legend>
           <!-- <form method="post" action=""> -->
      <!-- <form method="post" action=""> -->
  <table>
    <tr>
        
       <td>  <label for="input1">Identifiant&nbsp;:</label> </td>
       <td> <input type="text" name="email" /></td>
       
    </tr>
       
     <tr>
           <td> <label for="input2">Mot de passe&nbsp;:</label></td>
            <td><input type="password"  name="password" /></td>
     </tr>
 

    
  <tr>
      <td>
    <!--<select name="type" id="input3">
 	<option value="Client">Client</option>
	<option value="Admin">Admin</option>
 </select>-->
 
      </td>
  </tr> 
  <tr>
      <td>
  <input type="submit" class="classsubmit" name="connect" value="se connecter" />
  </td>
  </tr> 
   </table>
 </fieldset>
 </form>

 <?php
 
    /*
     * 
     * J'ai d'abord placé l'action ici maintenant  elle se trouve dans connexion controller
error_reporting(E_ALL);
    $dao = new Modele();
        try {
       $is_valid = true;
        if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['type'])){
		$mail =$_POST['email'];
		$pwd = $_POST['password'];
                $type=$_POST['type'];
      
	if(!$mail){
            echo 'mail erreur';
          $is_valid = false;
        }	
         if(!$pwd) {
              echo 'password erreur';
            $is_valid = false;
        }    
        if(!$type) {
              echo 'type erreur';
            $is_valid = false;
        } 
      
  if($is_valid){      
        
      if($type=="Admin"){
        
   $dao->identificationAdmin($mail, $pwd);
            }       
    elseif ($type=="Client"){
          $dao->identificationClient($mail, $pwd);
      
            }
      else{
           header('Location: vues/client.php'); 
         
      }      
    }  
  }  
     
} catch (Exception $exc) {
    echo 'PROBLEM';
}
*/
     
  