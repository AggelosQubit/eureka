<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestionnaire de modification</title>
</head>

 <style type="text/css">
 #monForm2 {
   position:absolute;
   top:20%;
   left:30%;
   width:600px; /* A toi de donner la bonne largeur */
   height:150px; /* A toi de donner la bonne hauteur */
   margin-left:-150px; /* -largeur/2 */
   margin-top:-100px; /* -hauteur/2 */ 
}
 fieldset {
     width: 400px;
	  border-color:#00CC00;
	 border:2px solid #DF3F3F;
	
     }
 div.left {
     width: 50%;
     float: left;
	  font-weight : bold;
     }
 div.left p {
     text-align: right;
     margin-right: 30px;
     }
 div.right {
     width: 50%;
     float: left;
     }
 </style>

</head>
 
    <form method="post" action="confirm_modification.php" id="monForm2">
 <fieldset>
  <legend><strong>Gestionnaire de modification</strong></legend>
	<table>       
<tr><div class="left">
   
   <td><p><label for="input1">Statut&nbsp;:</label></p></td>
   
   </div>
    <div class="right">
	  <td><p><select name="statuts" id="input2">
 
		<option value="Client"> Client</option>
		<option value="Admin"> Prospect</option>
		<option value="jamais"> Abonné newsletter</option>
   </select></p></td>
   </div>
   </tr>
   <tr><div class="left">
   
   <td><p><label for="input1">Forme juridique&nbsp;:</label></p></td>
   
   </div>
    <div class="right">
	  <td><p><select name="formes_juridiques" id="input2">
 
		<option value="toujours"> SA</option>
		<option value="parfois"> SARL</option>
		<option value="jamais"> PME</option>
   </select></p></td>
   </div>
   </tr>
   <tr>
   <div class="left">
    <td><p><label for="input3">Raison Sociale selon Kbis &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input3" name="raison_sociale" /></p></td>
   </div>
   </tr>
   
   <tr>
   <div class="left">
    <td><p><label for="input4">Nom du contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input4" name="nom_contact" /></p></td>
   </div>
   </tr>
   
   <tr>
   <div class="left">
    <td><p><label for="input5">Prénom du contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input5" name="prenom_contact" /></p></td>
   </div>
   </tr>
   
   <tr>
   <div class="left">
    <td><p><label for="input6">E-mail de contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input6" name="email_contact" /></p></td>
   </div>
   </tr>
   
   
   <tr>
   <div class="left">
    <td><p><label for="input8">Tél. du contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input8" name="tel_contact" /></p></td>
   </div>
   
   <tr>
   <div class="left">
    <td><p><label for="input9">Portable du contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input9" name="port_contact" /></p></td>
   </div>
   </tr>
   
   <tr>
   <div class="left">
    <td><p><label for="input10">Fax du contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input10" name="fax_contact" /></p></td>
   </div>
   </tr>
   
    <tr>
    <td>
    </td>
       <td> <p><input type="submit" name="modifier" value="modifier" /></p></td>
	</tr>
    
</table>
  </fieldset>
 </form>
 
<body>
</body>
</html>
