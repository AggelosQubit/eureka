<?php
$dao= new \MysqlDao();
if(!isset($_REQUEST['cc'])){
$_REQUEST['cc'] = 'c_client';//appel nom controller
}
//include("include/fonctions_liste.php");
switch($cc){

// dirige vers la page d'accueil (CLIENT)
        case 'accueilclient': {
            include("vues/accueilclient.php");
	}
        break;
	// dirige vers la page affichant le détail d'une facture sélectionnée 
	//à partir d'un lien "facture détaillée" dans le tableau affichant les clients (ADMIN)
	case 'facture':
		{
            
            
                    include("vues/accueilclient.php");
                    include("admin/facture.php");
                    include("admin/recuperation_facture.php");
                    
		}
		break;

	case 'demandes':
	{session_start();
        $_SESSION['mail'] = $_POST['email'];
            
            $dao->affichage_clients_tab_dem($raison, $ref_demande, $nat_demande, $descrip, $frequence, $statut, $email);
            include("vues/accueilclient.php");
            include("vues/form_demandes.php");
        }
	break;
         case 'recherchenature':
        {
            $dao->recherche_nature();
           // include("vues/accueilclient.php");
            //include("vues/copie.php");
        }
        break;
    
        case 'recherchefrequence':
        {
            $dao->recherche_frequence();
           // include("vues/accueilclient.php");
            //include("vues/copie.php");
        }
        break;
    
        case 'confirmdemande':
        {
            include("vues/accueilclient.php");
            include("vues/confirm_demande.php");
        }
        break;
    
        case 'recuppieces':
        {
            include("vues/accueilclient.php");
            include("vues/recuppieces.php");
        }
        break;

	case 'mesdemandes':
	{
            include("vues/accueilclient.php");
            include("controleurs/Demandes.php");
	}
	break;
            
        case 'configcompte':
        {
            include("vues/accueilclient.php");
            include("admin/config_compte.php");
        }
        break;
    
        case 'configcontact':
        {
            
            include("vues/accueilclient.php");
            include("admin/config_contact.php");
        }
        break;
    
        case 'gestionDem':
        {
            include("vues/accueilclient.php");
            include('vues/gestionFichierDem.php');
        }
        break;
}
        