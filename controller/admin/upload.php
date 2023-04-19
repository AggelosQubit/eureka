<?php


$ref_demande = $_POST['ref_demande'];
$origin = array(" ", ":");
$change   = array("_", "-");
$newref_demande = str_replace($origin, $change, $ref_demande);
$raison = $_POST['raison'];
$fichier = basename($_FILES['nom_fichier']['name']); //Nom du fichier envoyé
$nomFichier = $_FILES['nom_fichier']['name'];
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if(isset($_FILES['nom_fichier']) AND $_FILES['nom_fichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if($_FILES['nom_fichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['nom_fichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                    if(file_exists('intranet/files/'.$raison) && (is_dir('intranet/files/'.$raison)))
                    {
                        if(file_exists('intranet/files/'.$raison.'/'.$newref_demande) && (is_dir('intranet/files/'.$raison.'/'.$newref_demande)))
                        {
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['nom_fichier']['tmp_name'], 'intranet/files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                            updateDateStatut($ref_demande, $nomFichier);
                            echo "L'envoi a bien été effectué !";
                        }
                        else
                        {
                            //Créer dossier ref_demande
                            mkdir('intranet/files/'.$raison.'/'.$newref_demande, 0777, true);
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['nom_fichier']['tmp_name'], 'intranet/files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                            updateDateStatut($ref_demande, $nomFichier);
                            echo "L'envoi a bien été effectué !";
                            
                        }
                    }
                    else
                    {
                        //Créer dossier raison
                        mkdir('intranet/files/'.$raison, 0777, true);
                        if(file_exists('intranet/files/'.$raison.'/'.$newref_demande) && (is_dir('intranet/files/'.$raison.'/'.$newref_demande)))
                        {
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['nom_fichier']['tmp_name'], 'intranet/files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                            updateDateStatut($ref_demande, $nomFichier);
                            echo "L'envoi a bien été effectué !";
                        }
                        else
                        {
                            //Créer dossier ref_demande
                            mkdir('intranet/files/'.$raison.'/'.$newref_demande, 0777, true);
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['nom_fichier']['tmp_name'], 'intranet/files/'.$raison.'/'.$newref_demande.'/'.$fichier);
                            updateDateStatut($ref_demande, $nomFichier);
                            echo "L'envoi a bien été effectué !";
                            
                        }
                    }
                        
                }
        }
}
?>
