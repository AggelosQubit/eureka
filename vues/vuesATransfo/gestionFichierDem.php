<?php
    $ref = $_POST['ref'];
    $statut = $_POST['statut'];
    $envoie = $_POST['envoie'];
    $origin = array(" ", ":");
    $change   = array("_", "-");
    $newref_demande = str_replace($origin, $change, $ref);
    $raison = getRaison($_SESSION['id']);
    $fichier = getNomFichier($ref);
    $file = 'intranet/files/'.$raison['raison'].'/'.$newref_demande.'/'.$fichier['nomFichier'];
    
    switch($statut)
    {
        case 'En attente':
        {
            if($envoie == 'Modifier')
            {
                
            }
            if($envoie == 'Supprimer')
            {
                suppDem($ref, $_SESSION['id']);
                header('location:index.php?uc=c_client&cc=recuppieces');
            }
        }
        break;
    
        case 'Uploader':
        {
            if($envoie == 'Telecharger')
            {
               if(file_exists($file))
               {
                    echo 'testexist';
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    ob_clean();
                    flush();
                    readfile($file);
                    updateDateDownload($ref);
                }
            }
            if($envoie == 'Supprimer')
            {
                suppDem($ref, $_SESSION['id']);
                header('location:index.php?uc=c_client&cc=recuppieces');
            }
        }
        break;
    
        case 'Telecharger':
        {
            if($envoie == 'Telecharger')
            {
                if(file_exists($file))
                {
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename='.basename($file));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($file));
                    ob_clean();
                    flush();
                    readfile($file);
                }
            }
            if($envoie == 'Supprimer')
            {
                suppDem($ref, $_SESSION['id']);
                header('location:index.php?uc=c_client&cc=recuppieces');
            }
        }
        break;
    }
?>
