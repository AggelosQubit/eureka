<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gestionnaire de suppression</title>
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
 
    <form method="post" action="confirm_supprimer.php" id="monForm2">
 <fieldset>
  <legend><strong>Gestionnaire de suppression</strong></legend>
	<table>       

   <tr>
   <div class="left">
    <td><p><label for="input6">E-mail de contact &nbsp;:</label></p> </td>
   </div>
    <div class="right">
    <td><p><input type="text" id="input6" name="email_contact" /></p></td>
   </div>
   </tr>
   		<td>
        </td>
       <td> <input type="submit" name="supprimer" value="supprimer" /></td>
	
    
</table>
  </fieldset>
 </form>
 
<body>
</body>
</html>
