<?php
if(!isset($_REQUEST['ca'])){
	header('Location: ../index.php');
}
$ca = $_REQUEST['ca'];

switch($ca){
	//Matthieu, dirige vers la page d'accueil (ADMIN)
	case 'accueiladmin':
	{
            include('include/menu_admin.php');
            include("admin/admin.php");
	}
	break;
		
	//Matthieu, dirige vers la page affichant la liste des demandes (ADMIN)
	case 'demandes':
	{
            include('include/menu_admin.php');
            include("admin/demandes.php");
	}
	break;
		
	//Matthieu, dirige vers la page de paramètres de compte (ADMIN)
	case 'configcompte':
	{
            include('include/menu_admin.php');
            include("admin/config_compte.php");
	}
	break;
	
	//Matthieu, dirige vers la page de paramètres de contacts (ADMIN)
	case 'configcontact':
	{
            include('include/menu_admin.php');
            include("admin/config_contact.php");
	}
	break;
	
	case 'configcontact2':
	{
            include('include/menu_admin.php');
            include("admin/config_contact_2.php");
	}
	break;
	
	case 'valid':
	{
            include('include/menu_admin.php');
            include("admin/page_valid.php");
	}
	break;
	
	case 'valid2':
	{
            include('include/menu_admin.php');
            include("admin/page_validation2.php");
	}
	break;
    
        case 'valid3':
	{
            include('include/menu_admin.php');
            include("admin/page_validation3.php");
	}
	break;
        //Matthieu, case facture
        case 'facture':
	{
            include('include/menu_admin.php');
            include("admin/facture.php");
	}
	break;
        //Matthieu, case modifier
	case 'modifier':
	{
            include('include/menu_admin.php');
            include("admin/modifier.php");
	}
	break;

	case 'supprimer':
	{
            include('include/menu_admin.php');
            include("admin/supprimer.php");
	}
	break;

	case 'envoipieces_2':
	{
            include('include/menu_admin.php');
            include("admin/envoipieces_2.php");
	}
	break;
        //Matthieu, cas d'une validation de demande
        case 'pagevaliddem':
        {
            include('include/menu_admin.php');
            include("admin/page_valid_dem.php");
        }
        break;
        //Matthieu, cas d'upload d'un fichier
        case 'upload':
        {
            include('include/menu_admin.php');
            include('admin/upload.php');
        }
    
            
}
