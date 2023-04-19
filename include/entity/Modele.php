<?php

// tatjana
class Modele{

    private static $conn= NULL;
    private $id = -1;

    public static function getConnexion() {
        if (Modele::$conn === NULL) {
            try {
                Modele::$conn = new PDO($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
                Modele::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                printf("Impossible d'établir la connexion (%s)\n", $e->getMessage());
                exit;
            }
        }
        return Modele::$conn;
    }
	public static function get($proprietes = array()) {

        if (is_integer($proprietes)) {
            $proprietes = array("id" => $proprietes);
        }

        // récupération du nom de la classe appelante
        $myClassName = get_called_class();
	
        // la table dans la base de donnée porte le même nom (sans majuscule et au pluriel)
        $myTableName = strtolower($myClassName) . "s";

        $myClass = new ReflectionClass($myClassName);

        // Liste des propriété "protected" de la classe appelante
        $props = $myClass->getProperties(ReflectionProperty::IS_PROTECTED);

        // Récupération de tuples de la base de données dont la table 
        // correspond au nom de la classe appelante (au singulier) et dont les 
        // critères correspondent aux couples (clé,valeur) passés en paramètres de la fonction.
        $where = implode(" OR ", array_map(function ($key) {
                    return sprintf("%s = :%s", $key, $key);
                }, array_keys($proprietes)));

        // Si pas de critère alors on récupères tous les objets.
        if ($where == "") {
            $where = "1";
        }
        $sql = "SELECT * from " . $myTableName . " WHERE " . $where;
        //printf("%s\n", $sql);
        try {
            Modele::$conn = Modele::getConnexion();
            $stmt = Modele::$conn->prepare($sql);

            foreach ($proprietes as $key => $value) {
                $stmt->bindValue(":" . $key, $value);
            }
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                //throw new ModeleException("No object found");
            }
        } catch (PDOException $e) {
            printf("Query failed: %s \n", $e->getMessage());
            exit;
        }

        // les données récupérées de la requête.
        $lines = $stmt->fetchAll();

        // un tableau qui va contenir les objets PHP crées.
        $objs = array();

        foreach ($lines as $line) {
            $obj = null;
            try {
                // Création d'un objet à partir de sa classe
                $obj = $myClass->newInstance();
            } catch (ReflectionException $re) {
                printf("Problème lors de la création d'une instance de la classe `%s` (%s).\n", $myClassName, $re->getMessage());
            }

            // parcours les propriétés de l'objet et on essaie de faire 
            // la correspondance avec les colonnes retournées par la requête SQL.
            foreach ($props as $prop) {
                $prop_name = $prop->name;
                if ($prop->class === $myClassName) {
                    //printf("property: '%s', value on DB : '%s'\n", $prop_name, $line[$prop_name]);
                    $val = $line[$prop_name];
                    if ($val !== null) {
                        $obj->$prop_name = $val;
                    }
                }
            }
            // l'id est une propriété obligatoire.
            $obj->id = $line["id"];
            //printf("%s\n", $obj);
            array_push($objs, $obj);
        }
        return $objs;
    }
	public static function suppr($id) {

		
		$myClassName = get_called_class();
	
        // la table dans la base de donnée porte le même nom (sans majuscule et au pluriel)
        $myTableName = strtolower($myClassName) . "s";

        $myClass = new ReflectionClass($myClassName);
		
		//SELECT AVG(note) FROM `commentaires` WHERE `idCafe`=3
        $sql = "DELETE FROM  ".$myTableName." WHERE id=:id";
        try {
            Modele::$conn = Modele::getConnexion();
            $stmt = Modele::$conn->prepare($sql);//UTILISATION  PDO, PLUS BESOIN DE mysql_real_escape_string CAR PDO EST PLUS SECURE
            $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
            $stmt->execute();
            if ($stmt->rowCount() === 0) {
                //throw new ModeleException("No object found");
            }
        } catch (PDOException $e) {
            printf("Query failed: %s \n", $e->getMessage());
            exit;
        }
    }
	public function save() {
		// récupération du nom de la classe appelante
        $myClassName = get_called_class();
		// la table dans la base de donnée porte le même nom (sans majuscule et au pluriel)
        $myTableName = strtolower($myClassName) . "s";
		$myClass = new ReflectionClass($myClassName);
        // Liste des propriété "protected" de la classe appelante
        $props = $myClass->getProperties(ReflectionProperty::IS_PROTECTED);
		// printf("%s\n", $sql);
		try 
		{
			if($this->id==-1)
			{
				//CREATION
				echo "CREATION\n";
				$sql = "INSERT INTO ".$myTableName." VALUES(DEFAULT";
				foreach($props as $prop){$sql.=",:".$prop->name;}
                $sql.= ")";

				Modele::$conn = Modele::getConnexion();
				$stmt = Modele::$conn->prepare($sql);
				foreach ($props as  $prop) {
					$stmt->bindValue(":".$prop->name,$this->getPropriete($prop->name));
				}
				$stmt->execute();
				$this->id=(Modele::$conn->LastInsertId());
				if ($stmt->rowCount() === 0) {
						//throw new ModeleException("No object found");
				}
			} else {
				//MODIFICATION
				$sql = "UPDATE `".$myTableName."` SET ";
				//UPDATE `trucs` SET value=2052, othervalue='ppppp' WHERE id=5
				$i=0;
				foreach($props as $prop)
				{
					if($i==count($props)-1)
					{
						$sql.=$prop->name." = :".$prop->name." ";
					} else {
						$sql.=$prop->name." = :".$prop->name.", ";
					}
					$i++;
				}
				$sql.= " WHERE id=".$this->id;
				//printf("%s\n", $sql);
				Modele::$conn = Modele::getConnexion();
				$stmt = Modele::$conn->prepare($sql);
				foreach ($props as  $prop) {
					$stmt->bindValue(":".$prop->name,$this->getPropriete($prop->name));
				}
				$stmt->execute();
				if ($stmt->rowCount() === 0) {
						//throw new ModeleException("No object found");
				}
			}
		} catch (PDOException $e) {
			//printf("Query failed: %s \n", $e->getMessage());
            return "queryFailed";
			//exit;
		}
    }
	/**
     * Renvoie la valeur d'une propriété dont le nom est donné en paramètre.
     * @param  string $propriete Nom de la propriété pour laquelle on veut la valeur
     * @return ???            valeur de la propriété (quelque soit son type)
     */
    public function getPropriete($propriete) {
        $myClass = new ReflectionClass($this);
        if($myClass->hasProperty($propriete)){
            $prop = $myClass->getProperty($propriete);
            if (!is_null($prop)) {
                $prop->setAccessible(true);
                $val = $prop->getValue($this);
                $prop->setAccessible(false);
                return $val;
            }
        }
        return null;
    }
    /**
     * Définit la valeur d'une propriété donné en paramètre pour cet objet. 
     * @param string $propriete Nom de la propriété a définir.
     * @param ??? $valeur    nouvelle valeur pour cette propriété.
     */
    public function setPropriete($propriete, $valeur) {
        $myClass = new ReflectionClass($this);
        if($myClass->hasProperty($propriete)){
            $prop = $myClass->getProperty($propriete);
            if (!is_null($prop) && $prop->getDeclaringClass() == $myClass) {
                $prop->setAccessible(true);
                $prop->setValue($this, $valeur);
                $prop->setAccessible(false);
            }
        }
    }
	/**
     * Retourne le champ 'id' de l'objet qui est aussi la clé unique du tuple dans la base. 
     * @return integer l'id de l'objet
     */
    public function getId(){
    	return $this->id;
    }
	/*********************************************************************************************************************************/
	/*********************************************************************************************************************************/
	/*********************************************************************************************************************************/
	/*********************************************************************************************************************************/
	/*********************************************************************************************************************************/
	/*********************************************************************************************************************************/
	/*********************************************************************************************************************************/

//afficher a liste des users (pour ladmin)
    public function getAllPersonnes() {
        $query = 'SELECT * FROM personne';
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function addPersonne($nom, $prenom) {
        $query = "INSERT INTO personne (nom, prenom) VALUES "
                . "('$nom', '$prenom')";
        $result = $this->conn->exec($query);
        return $result;
    }
    public function verifierStatut($mail){
    	$query="SELECT statut from eur_users WHERE email = '$mail'";
    	$stmt = $this->conn->query($query);
    	$result = $stmt->fetch(PDO::FETCH_ASSOC);
    	if ($result['statut']!='Admin'){
    		echo"<script language='JavaScript'>
				 	
				 	window.location.replace('../index.php');
					</script>";


    	}



    }
    
    public function inscriptionUser($stat,$form,$rais,$nomc,$prenc,$mailc,$telc,$portc,$faxc,$pass,$cle,$date,$adresse,$codePostal,$ville) {
        $query = "INSERT INTO eur_users(statut,forme,raison,nom, prenom,email,tel,portable,fax,password,cle,date_inscription,adresse,code_postal,ville) VALUES "
                . "('$stat','$form','$rais','$nomc','$prenc','$mailc','$telc','$portc','$faxc','$pass','$cle', '$date','$adresse','$codePostal','$ville')";
        $result = $this->conn->exec($query);

        return $result;
    }
    //identifier la personne par son mot de passe et mail
    public function identificationClient($mail, $pw)
	{
		$query= "select id, email, password, statut, raison from eur_users  where email ='$mail' and password='$pw'";
		$stmt = $this->conn->query($query);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result!= 0) {
			$_SESSION['id']=$result['id'];
			if ($result['statut']=='Admin'){
				echo"<script language='JavaScript'>
				 	
				 	window.location.replace('admin/admin.php');
					</script>";

                 }
                //header('Location: vues/accueilclient.php'); 
			echo"<script language='JavaScript'>
				 	
				 	window.location.replace('vues/accueilclient.php');
					</script>";
                 
          
                 }
                 else{
                echo 'Vous n\'etes pas inscrit';
            }
	}
       /* public function identificationAdmin($mail, $pw)
	{
		$query= "select id, login, password from eur_admin  where login ='$mail' and password='$pw'";
		$stmt = $this->conn->query($query);
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($result!= 0) {
		
                //header('Location: admin/admin.php');
                // echo "{$result['id']}, {$result['email']}"; testing

			echo"<script language='JavaScript'>
				 	
				 	window.location.replace('admin/admin.php');
					</script>";
                 }
                else{
                echo 'Vous n\'etes pas encore inscrit';
            }
	}
	*/
       
       public function affichage_infos($requete){
       
        $query = $requete;
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){die('Pas d entrée'.mysql_error());}
        else return $result;

       /* echo"
				 <table id='table_id' class='display'>
				 <thead>
					<tr>
						<th id='th_ad'>Statut</th>
						<th id='th_ad'>Forme juridique</th>
						<th id='th_ad'>Raison sociale</th>
						<th id='th_ad'>Nom du contact</th>
						<th id='th_ad'>Prénom du contact</th>
						<th id='th_ad'>E-mail du contact</th>
						<th id='th_ad'>Téléphone du contact</th>
						<th id='th_ad'>Portable du contact</th>
						<th id='th_ad'>Fax du contact</th>
						<th id='th_ad'>Date d'inscription</th>
						<th id='th_ad'>Intervenir</th>
						
					</tr>
					</thead>
					<tbody>
			";		
			 $compteur=1;
			 

	foreach($result as $row)
{
  

	$tr="";
	//if($compteur%2==1)
	//$tr="<tr class='alt'>";
	//else 
	$tr ="<tr>";
	$compteur++;
 //on affiche la ligne dans le tableau 
	echo"<form method='post'action='form_modif_client_par_admin.php' >
			$tr
				<td><input type='hidden'name='email' value='$row[email]'/>$row[statut]</td>
				<td>$row[forme]</td>
				<td>$row[raison]</td>
				<td>$row[nom]</td>
				<td>$row[prenom]</td>
				<td>$row[email]</td>
				<td>$row[tel]</td>
				<td>$row[portable]</td>
				<td>$row[fax]</td>
				<td>$row[date_inscription]</td>
				<td><input type='submit' value='Intervenir' name='modifier' id ='classname2' /></td>
				</form>

		
			</tr>";
			}
			echo'</tbody>';
			echo"</table>";
			
*/

					
		
        }

        
        //29/09/2014
       
	public function recherche_frequence()
	{
	$query = "SELECT nom FROM eur_frequences";
        $stmt = $this->conn->query($query);
         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
         return $result;
         

	}	




	function recherche_nature()
	{
		
		$query = "SELECT * FROM eur_tarifs";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;


     }
     function lire_service_Id($id){

		$query = "SELECT * FROM eur_tarifs where id = '$id'";
		$stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

     }
     function update_services($nom_service,$prix,$id){

     	$query="UPDATE eur_tarifs  set nom_service = '$nom_service', prix = '$prix' WHERE id = '$id'"; 
     	$stmt = $this->conn->exec($query);
		return $stmt;
					


     }

     function supprimer_service($id)
     {

     	$query = "DELETE FROM eur_tarifs  WHERE id = '$id'";
     	$stmt =$this->conn->exec($query);

      	if($stmt){
      			echo'Votre demande a ete executé';
						} 

		else {echo'votre demande a echoué';}




     }

     function ajouter_service($service,$prix)
	{

			$query = "INSERT INTO eur_tarifs (nom_service,prix) values('$service','$prix')";
            $result = $this->conn->exec($query);
        	return $result;



     }

     function rechercherInfos($ref)
     {

		
		$query = "SELECT * FROM eur_demandes WHERE ref_demande = $ref";
        $stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;


     }


	function recherche_forme()
	{
		
		$query="SELECT * FROM eur_formes_juridiques";
		
	}

	
	
/* fonction qui afficheune ligne du tableau récapitulatif, elle affiche également un formulaire contenant des champs cachés pour aller sur la page de la facture détaillée */

	function affichage_clients_tab ($statut, $reponse, $raison, $nom, $prenom, $email, $tel, $portable, $fax)
	{	
		
		echo("
			<tr>
				<td id='td_ad'>$statut</td>
				<td id='td_ad'>$reponse</td>
				<td id='td_ad'>$raison</td>
				<td id='td_ad'>$nom</td>
				<td id='td_ad'>$prenom</td>
				<td id='td_ad'>$email</td>
				<td id='td_ad'>$tel</td>
				<td id='td_ad'>$portable</td>
				<td id='td_ad'>$fax</td>
				
				<td id='td_ad'>
					<form action='modifier.php' method='post'>
						<div>
							<input type='hidden' name='statut' value='$statut' />
							<input type='hidden' name='forme' value='$reponse' /> 
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='nom' value='$nom' />
							<input type='hidden' name='prenom' value='$prenom' />
							<input type='hidden' name='fist' value='$email' id='fist'/>
							<input type='hidden' name='tel' value='$tel' />
							<input type='hidden' name='portable' value='$portable' />
							<input type='hidden' name='fax' value='$fax' />
							
							<input type='submit' value='Modifier' />
						</div>
					</form>
					
					<form action='index.php?uc=admin&ca=facture' method='post'>
						<div>
							<input type='hidden' name='statut' value='$statut' />
							<input type='hidden' name='forme' value='$reponse' /> 
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='nom' value='$nom' />
							<input type='hidden' name='prenom' value='$prenom' />
							<input type='hidden' name='fist' value='$email' id='fist'/>
							<input type='hidden' name='tel' value='$tel' />
							<input type='hidden' name='portable' value='$portable' />
							<input type='hidden' name='fax' value='$fax' />
							
							<input type='submit' value='Facture détaillée' />
						</div>
					</form>
				</td>
			</tr>
		");
	

/* fonction qui récupère les informations dans la base de donnée du centre et affiche grâce à la fonction précédente les infos pour chaque tuple */
			
		
	 $compteur=1;
	while($row = mysql_fetch_array($reponse)) { 
	$tr="";
	if($compteur%2==1)
	$tr="<tr class='alt'>";
	else 
	$tr ="<tr>";
	$compteur++;
/* on affiche la ligne dans le tableau */
	echo"$tr
				<td>$row[statut]</td>
				<td>$row[forme]</td>
				<td>$row[raison]</td>
				<td>$row[nom]</td>
				<td>$row[prenom]</td>
				<td>$row[email]</td>
				<td>$row[tel]</td>
				<td>$row[portable]</td>
				<td>$row[fax]</td>
				<td>$row[date_inscription]</td>
				
			</tr>";
			}
			
			echo"</table>";
				
		mysql_close();
	}
	
	function affichage_clients_tab_dem($raison, $ref_demande, $nat_demande, $descrip, $frequence, $statut, $email)
	{
		echo("
			<tr>
				<td id='td_ad'>$raison</td>
				<td id='td_ad'>$ref_demande</td>
				<td id='td_ad'>$nat_demande</td>
				<td id='td_ad'>$descrip</td>
				<td id='td_ad'>$frequence</td>
				<td id='td_ad'>$statut</td>
				<td id='td_ad'>
					<form action='modifier.php' method='post'>
						<div>
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='ref' value='$ref_demande' />
							<input type='hidden' name='nature' value='$nat_demande' /> 
							<input type='hidden' name='descrip' value='$descrip' />
							<input type='hidden' name='frequence' value='$frequence' />
							<input type='hidden' name='statut' value='$statut' />
							<input type='submit' value='Modifier' />
						</div>
					</form>
					<form action='index.php?uc=admin&ca=supprimer' method='post'>
						<div>
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='ref' value='$ref_demande' />
							<input type='hidden' name='nature' value='$nat_demande' /> 
							<input type='hidden' name='descrip' value='$descrip' />
							<input type='hidden' name='frequence' value='$frequence' />
							<input type='hidden' name='statut' value='$statut' />
							<input type='submit' value='Supprimer' />
						</div>
					</form>
					<form action='index.php?uc=admin&ca=envoipieces_2' method='post'>
						<div>
                                                       <input type='hidden' name='fist' value='$email' />
							<input type='hidden' name='raison' value='$raison' />
							<input type='hidden' name='ref' value='$ref_demande' />
							<input type='hidden' name='nature' value='$nat_demande' /> 
							<input type='hidden' name='descrip' value='$descrip' />
							<input type='hidden' name='frequence' value='$frequence' />
							<input type='hidden' name='statut' value='$statut' />
							<input type='submit' value='Déposer un document' />
						</div>
					</form>
				</td>
			</tr>
		");
	}
//pouvoir ajouter une demande par un utilisateur 
	public function ajoutdemande($dem, $natu, $description, $fre, $idcli, $mail ) {

		$requette="INSERT INTO eur_demandes(ref_demande,nat_demande,descrip_demande,freq_demande,date_demande,idClient,emailC) 
									VALUES ('$dem','$natu','$description','$fre',now(),'$idcli','$mail')";
					$stmt = $this->conn->exec($requette);				
               
				if($stmt){
						//mail($email,'', 'Votre demande a bien été prise en compte : La reference de votre demande est'.$refer.', la nature de votre 								demande est'.$nat.'et la description de votre demande est'.$desc.'');
					echo'Votre demande a bien été prise en compte : La reference de votre demande est : '.$dem.' une copie vous sera envoye par mail.';
						} 

				else {echo'votre demande a echoué';}
}

//pouvoir recuperer une demande et l'afficher
	public function recupdemande($id){

	$query ="SELECT  ref_demande,nat_demande,descrip_demande,freq_demande,date_demande,date_upload,date_download,statut_demande
	FROM eur_demandes
    WHERE eur_demandes.idClient='$id'";
        $stmt = $this->conn->query($query);
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		/*if(!$result)
			{
				die('erreur'.mysql_error());
			}
			*/
		if (empty($result)){

			die('le champs demande est vide');

			}	
			return $result;


}


	public function recuperer_Toutes_Les_Demandes() {
	$query = "SELECT * FROM eur_demandes,eur_users WHERE eur_demandes.idclient = eur_users.id";
	$stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;

        }	

//pouvoir modifier les infos concernant la demande si celle ci na pas ete encore validee
	public function updateDemande($dem, $natu, $description, $fre){

	$query ="UPDATE eur_demandes
	SET nat_demande = '$natu' ,
		descrip_demande = '$description' ,
		freq_demande = '$fre'

	WHERE ref_demande = '$dem'";

	$stmt = $this->conn->exec($query);
	if($stmt){
						//mail($email,'', 'Votre demande a bien été prise en compte : La reference de votre demande est'.$refer.', la nature de votre 								demande est'.$nat.'et la description de votre demande est'.$desc.'');
					echo'Votre modification a bien été prise en compte : La reference de votre demande est : '.$dem.' une copie vous sera envoye par mail.';
						} 

				else {echo'votre demande a echoué';}


}

// pouvoir recuperer les infos a partir du mail 
	public function recupererinfosclients($mail){

	$query = "SELECT * FROM eur_users where email ='$mail'";
	$stmt = $this->conn->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}
	// pouvoir updater les infos concernant le client
	public function modifierInfosClients($id,$statut,$forme,$raison,$nom,$prenom,$email,$tel,$portable,$fax){
	$query = "UPDATE eur_users 
							SET statut='$statut',
								forme='$forme',
								raison='$raison',
								nom='$nom',
								email='$email',
								prenom='$prenom',								
								tel='$tel',
								portable='$portable',
								fax='$fax' WHERE id = '$id'";
	$stmt = $this->conn->exec($query);
	if($stmt){
														
					echo'Votre modification a bien été prise en compte ';
						} 

				else {echo'votre demande a echoué';}
               



}
//supprimer une demande d'utilisateur 
	public function supprimerEnrengistrement($ref)
	{
	$query = "DELETE FROM eur_demandes
	WHERE ref_demande = '$ref'";
	$stmt = $this->conn->exec($query);
	if($stmt){
														
					echo'Votre demande a bien été supprimer ';
						} 

				else {echo'votre demande a echoué';}


}

//recuperer la facture correspondant a la ref 
	public function recupererLaFacture($ref){
	$query ="SELECT * FROM eur_factures WHERE ref_demande ='$ref'";

     $stmt = $this->conn->query($query);
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     return $result;

	}
// recuperer la liste des factures corres^pondant a l ID user
	public function recupererListeFactures($id){
	$query ="SELECT * FROM eur_factures WHERE id ='$id'";

     $stmt = $this->conn->query($query);
     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     return $result;

	}
// pour pouvoir diferencier les differentes factures et aussi la date ou a ete faite la facture pour pouvoir les identifier sur l infobulle
	public function recuperer_references_facture($ref){
		$query ="SELECT ref_facture , date_facture FROM eur_factures WHERE ref_demande ='$ref'";

		$stmt = $this->conn->query($query);
     	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     	return $result;


	}

	public function upload($file_name,$file_dest,$idClient,$ref)

	{

		$query="INSERT INTO  file(name,file_url,idClient,refDemande) VALUES('$file_name','$file_dest','$idClient','$ref')";

		$stmt = $this->conn->exec($query);	

		return $stmt;			
               
	}
	public function recupererfiles($ref)
	{

		$query="SELECT id,name,file_url,idClient,refDemande FROM file where refDemande = '$ref' ";
		$stmt =$this->conn->query($query);
		$result =$stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;



	}
	public function recupererListeFacture(){

	$query="SELECT * FROM eur_factures";
	$stmt=$this->conn->query($query);
	$result =$stmt->fetchAll(PDO::FETCH_ASSOC);
	return $result;

	}
	

	public function activer($ref){

	$query="UPDATE `eur_demandes` SET `statut_demande`='en cours de traitement' WHERE ref_demande='$ref'";

	$stmt = $this->conn->exec($query);
	if($stmt){
		header('Location:../admin/afficher_demande.php');
					}else{
					echo"<script language='JavaScript'>
     				alert('echec de modification.');
    				window.location.replace('afficher_demande.php');
   					</script>";
					}


	}
	public function supprimerClient($email){


			$query = "DELETE FROM eur_users
			WHERE email = '$email'";
			$stmt = $this->conn->exec($query);
	
			if($stmt){
														
			echo'Votre demande a ete executé';
						} 
			else {echo'votre demande a echoué';}

		}



		public function supprimerFichier($idfichier){


		    $query = "DELETE FROM file  WHERE id = '$idfichier'";
     	$stmt =$this->conn->exec($query);

      	return $stmt ; 


      }

      public function modifierstatut($statut,$refstatut){

      	$query ="UPDATE eur_demandes SET statut_demande = '$statut' WHERE ref_demande ='$refstatut'";


      	$stmt = $this->conn->exec($query);
		if(!$stmt){
					echo"<script language='JavaScript'>
     				alert('echec de modification.');
    				window.location.replace('afficher_demande.php');
   					</script>";
					}


	 }

	 public function recupererFacture($id,$Afacture){

		  
            $laDate="";
            
            switch ($Afacture)
            {
                case 'mois':
                        //Annee actuelle - Mois actuelle - 1 er du mois
                        $laDate= date("Y-m-01");
                        print_r($laDate);
                    break;
                
                case 'annee':
                        //Annee actuelle - janvier - 1er janvier
                        $laDate= date("Y-01-01");
                        print_r($laDate);
                    break;
                
                case 'toujours':
                        //Depuis toujours
                        $laDate= "0000-00-00";
                        print_r($laDate);
                    break;
                
                default :
                        //Par défault Depuis toujours
                        $laDate= "0000-00-00";
                        print_r($laDate);
            }
            
                    $query = "SELECT * FROM eur_factures WHERE id_client = '$id' AND date_facture >= $laDate";
                    $stmt = $this->conn->query($query);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    return $result;


	 }
         
         
         
	 public function facture_detaille($ref){

	 	$query = "SELECT * FROM eur_factures WHERE ref_demande = '$ref'";
	 	$stmt = $this->conn->query($query);
     	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     	return $result;


	 }

	 public function rechercherTarif($nature){

	 	$query = "SELECT * FROM eur_tarifs WHERE nom_service LIKE TRIM('$nature');";
	 	$stmt = $this->conn->query($query);
     	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

	 	

     	return $result;

	 }
	 public function definir_facture_restante($freq_demande){

	 	if($freq_demande=="Semestrielle"){

	 		return 6;
	 	}
	 	if($freq_demande=="Trimestrielle"){

	 		return 3;
	 	}
	 	if($freq_demande=="Annuelle"){

	 		return 12;
	 	}
	 	else{

	 		return 1;
	 	}




	 }

	 public function CreerFacture($ref,$nat_demande,$idClient,$freq_demande,$date_demande,$prix,$raison,$facture_restante){

	 	$query = "INSERT INTO eur_factures(ref_demande, nat_demande, mois_demande,prix_total,id_client,raison,ref_facture,facture_restante,date_facture) 
									VALUES ('$ref', '$nat_demande', '$date_demande', '$prix','$idClient','$raison','$ref$date_demande',$facture_restante,now())";

		$stmt = $this->conn->exec($query);	

				return $stmt;


	 }
	 public function Recuperer_Facture_Par_Refacture($ref_facture)
	 {

	 	$query = "SELECT * FROM eur_factures WHERE ref_facture = '$ref_facture'";
	 	$stmt = $this->conn->query($query);
     	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

     	return $result;
     }

	 public function recupererInfosClientsParId($idClient){

		$query ="SELECT * FROM eur_users WHERE id ='$idClient'";
		$stmt = $this->conn->query($query);
     	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


     	return $result;

	 }
	 	public function update_date_upload($ref_demande) {

		$requette="UPDATE eur_demandes SET date_upload = now() WHERE ref_demande ='$ref_demande'";
					$stmt = $this->conn->exec($requette);
					return $stmt;				
               
               }
        public function recuperer_date_upload($ref_demande) {


		$query="SELECT  date_upload FROM eur_demandes  WHERE ref_demande ='$ref_demande'";
					$stmt = $this->conn->query($query);
     				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


     				return $result;				
               
               }


    public function encrypt_url($string) {
    $key = "MAL_979805"; //key to encrypt and decrypts.
    $result = '';
    $test = "";
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)+ord($keychar));

     $test[$char]= ord($char)+ord($keychar);
     $result.=$char;
   }

   return urlencode(base64_encode($result));
}

public function decrypt_url($string) {
    $key = "MAL_979805"; //key to encrypt and decrypts.
    $result = '';
    $string = base64_decode(urldecode($string));
   for($i=0; $i<strlen($string); $i++) {
     $char = substr($string, $i, 1);
     $keychar = substr($key, ($i % strlen($key))-1, 1);
     $char = chr(ord($char)-ord($keychar));
     $result.=$char;
   }
   return $result;
}



               
				




}