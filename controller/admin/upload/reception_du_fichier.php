    <?php
//require('connexion.php');
include ('../../include/MysqlDao.php');
include('../../setup.php');
$dao = new MysqlDao;

$ref_demande=$_POST['ref'];
$idClient = $_POST['id'];

$infos_users=$dao->recupererInfosClientsParId($idClient);
if ($infos_users){

foreach ($infos_users as $key2){
$raison = $key2['raison'];


}
}
$origin = array(" ", ":");
$change   = array("_", "-");
$newref_demande = str_replace($origin, $change, $ref_demande);
if(isset($_FILES['fichier']))

{


$fichier = basename($_FILES['fichier']['name']); //Nom du fichier envoyé
$nomFichier = $_FILES['fichier']['name'];

}



// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if(isset($_FILES['fichier']) AND $_FILES['fichier']['error'] == 0)
    {
            // Testons si le fichier n'est pas trop gros
            if($_FILES['fichier']['size'] <= 10000000)
            {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['fichier']['name']);
                    $extension_upload = $infosfichier['extension'];
                    $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                    
                    if (in_array($extension_upload, $extensions_autorisees))
                    {
                        if(file_exists('../../files/'.$raison) && (is_dir('../../files/'.$raison)))
                        {
                            if(file_exists('../../files/'.$raison.'/'.$newref_demande) && (is_dir('../../files/'.$raison.'/'.$newref_demande)))
                            {
                                

                                if(!file_exists('../../files/'.$raison.'/'.$newref_demande.'/'.$fichier))
                                    {

                                // On peut valider le fichier et le stocker définitivement
                               move_uploaded_file($_FILES['fichier']['tmp_name'], '../../files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                                
                                    $file_url ='../../files/'.$raison.'/'.$newref_demande.'/'.$fichier;
                                    $dao->upload($fichier,$file_url,$idClient,$newref_demande);
                                    $dao->update_date_upload($newref_demande);
                                    echo "L'envoi a bien été effectué !1";

                                    }
                                    else{echo"ce fichier existe deja ";}

                                
                            }
                            else
                            {
                                //Créer dossier ref_demande
                                mkdir('../../files/'.$raison.'/'.$newref_demande, 0777, true);
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($_FILES['fichier']['tmp_name'], '../../files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                                
                                    $file_url ='../../files/'.$raison.'/'.$newref_demande.'/'.$fichier;
                                    $dao->upload($fichier,$file_url,$idClient,$newref_demande);
                                    $dao->update_date_upload($newref_demande);
                                    echo "L'envoi a bien été effectué !2";


                                
                                    
                                                        
                            }
                        }
                        else
                        {
                            //Créer dossier raison
                            mkdir('../../files/'.$raison, 0777, true);
                            if(file_exists('../../files/'.$raison.'/'.$newref_demande) && (is_dir('../../files/'.$raison.'/'.$newref_demande)))
                            {
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($_FILES['fichier']['tmp_name'], '../../files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                                
                                 $file_url ='../../files/'.$raison.'/'.$newref_demande.'/'.$fichier;
                                    $dao->upload($fichier,$file_url,$idClient,$newref_demande);
                                    $dao->update_date_upload($newref_demande);
                                    echo "L'envoi a bien été effectué !3";
                                echo $raison;
                            }
                            else
                            {
                                //Créer dossier ref_demande
                                mkdir('../../files/'.$raison.'/'.$newref_demande, 0777, true);
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($_FILES['fichier']['tmp_name'], '../../files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                                
                                 $file_url ='../../files/'.$raison.'/'.$newref_demande.'/'.$fichier;
                                    $dao->upload($fichier,$file_url,$idClient,$newref_demande);
                                    $dao->update_date_upload($newref_demande);
                                    echo "L'envoi a bien été effectué !4";
                                
                                
                            }
                        }
                            
                    }else{echo"Le Fichier n'est pas au format autorisé : ";}
            }else{echo"Le Fichier est trop volumineux";}
    }
    else {  echo" l'envoi a echoué ";
            echo "error".$_FILES['fichier']['error'];}

 echo' <a class="btn" href="../afficher_demande.php">Retour</a>';
