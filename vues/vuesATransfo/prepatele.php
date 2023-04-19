<?php
/* 
 * prepatele.php est le diminutif de préparer le téléchargement
 * Ce fichier se chargera de la création de la facture au format pdf
 * la librairie "TCPDF" est le code permettant de générer des fichiers pdf
 * C'est celle-ci qui est utilisée.
 * 
 * Il persiste cependant quelque bug, comme le dépassement d'une cellule si le texte est trop large
 * car les méthodes utilisés sont celle de la librairie précédemment utilisé FPDF 
 * et n'ont pas été substitués.
 * 
 * Cependant même si c'est moins bien, il est tout à fait possible de travailler avec les méthodes de FPDF
 * 
 * Ce qu'il manque dans cette génération des facture et du code permettant générer des factures contenant
 * uniquement les demandes correspondant a la même année et au même mois.
 */
session_start();
require_once('../include/MysqlDao.php');
include_once("../setup.php");
//Librairie TCPDF
require_once('../tcpdf/tcpdf.php');


/*********************************************************************
**Recupération des caracteristiques de la facture et celle du client**
*********************************************************************/

//Caracterisitques de la facture

$id = $_SESSION['id'];

$RecupDemandes = new MysqlDao;
$InfosDemande = $RecupDemandes->recuperer_Toutes_Les_Demandes($id);

//Juste un test: echo $InfosDemande[0]['nat_demande'].' '.$AffectInfosDemande[0]['ref_demande'].' '.$AffectInfosDemande[0]['prix'];
//Caracteristiques du client

$mail=$_SESSION['mail'];
$RecupInfosClient = new MysqlDao;

$AffectInfosClient=$RecupInfosClient->recupererinfosclients($mail);



foreach ($AffectInfosClient as $cle )
{
        $infosClient['prenom']=$cle['prenom'];
        $infosClient['nom']=$cle['nom'];
        $infosClient['adresse']=$cle['adresse'];
        $infosClient['ville']=$cle['ville'];
        $infosClient['code_postal']=$cle['code_postal'];
}

$adresse=$infosClient['adresse'];
$codePostal=$infosClient['code_postal'];
$ville=$infosClient['ville'];
$prenomClient=$infosClient['prenom'];
$nomClient=$infosClient['nom'];


/*************************************************/
$x=210; $y=297;
//Constructeur
$facture = new TCPDF('P','mm','A4',true,'UTF-8',false,false); //Format de la page
$facture->AddPage();               //Ajouter une page

//Epaisseur des lignes ou bordures de la facture.
$facture->SetLineWidth(0.5);
/**************************************************************************************************
**   Caracteristique du fournisseur de service et de la facture (sauf prix) comprises.           **
**************************************************************************************************/

$facture->SetFont('dejavusans','B',25); /*Style et taille de caractère, gras ,alignement...
                                    Certains paramètres sont facultatifs*/
$facture->Cell(180,10,"FACTURE",0,0,"C");// Cell() Ajoute une cellule
$facture->Ln();                         // Ln() Permet de passer à la ligne suivante
$facture->Ln();
                    //MultiCell creer automatiquement une cellule sous l'autre après "\n"

$facture->SetFont('dejavusans','B',10); 
$facture->Cell(40,4,"Régis GRANAROLO "); 
$facture->Ln(); 


$facture->SetFont('dejavusans','',8);
$facture->Cell(120,4,"10 av Jean Monnet");
$facture->SetFont('dejavusans','B',9);
$facture->Cell(30,4,"DATE: ");
$facture->SetFont('dejavusans','',9);
$facture->Cell(30,4,"...");
$facture->Ln();

$facture->SetFont('dejavusans','',8);
$facture->Cell(120,4,"92130 Issy les Moulineaux ");
$facture->SetFont('dejavusans','B',9);
$facture->Cell(30,4,"REF FACTURE:");
$facture->SetFont('dejavusans','',9);
$facture->Cell(40,4,"...");
$facture->Ln();

$facture->Cell(120,4,"N°Siret : 52765156600012 | Code APE : 6202A");
$facture->SetFont('dejavusans','B',9);
$facture->Cell(30,4,"POUR:");
$facture->SetFont('dejavusans','',9);
$facture->Cell(40,4,"...");
$facture->Ln();

$facture->SetFont('dejavusans','',7);
$facture->Cell(120,4,"Auto-entrepreneur (dispensé d’immatriculation au Registre du");
$facture->SetFont('dejavusans','B',9);
$facture->Cell(30,4,"REF DEMANDE:");
$facture->SetFont('dejavusans','',9);
$facture->Cell(40,4,"...");
$facture->Ln();

$facture->SetFont('dejavusans','',7);
$facture->Cell(120,4,"Commerce et des Sociétés et au Répertoire des Métiers)");
$facture->Ln();
$facture->Ln();
/***************************************************/




/***************************
**Nom et adresse du client**
***************************/

$facture->SetFont('dejavusans','I',9);
$facture->Cell(30,4,"Client :");
$facture->Ln();

$facture->SetFont('dejavusans','B',9);
$facture->Cell(30,4,"$prenomClient $nomClient");
$facture->Ln();

$facture->SetFont('dejavusans','',9);
$facture->Cell(30,4,"$adresse");
$facture->Ln();

$facture->Cell(30,4,"$codePostal");
$facture->Ln();

$facture->Cell(30,4,"$ville");
$facture->Ln();
$facture->Ln();
$facture->Ln();

$facture->SetFont('dejavusans','B',15);
$facture->Cell(90,4,"DOIT:",0,0,"C");
$facture->Ln();
$facture->Ln();
/***************************************/



/******************************************************
**Création du tableau (prix total, description etc...)**
*******************************************************/
//Début entête
    $facture->SetFont('dejavusans','B',10);
    $facture->Cell(80,6,"DESCRIPTION",1,0,"C");
    $facture->Cell(60,6,"REF DEMANDE",1,0,"C");
    $facture->Cell(50,6,"COUT UNITAIRE",1,0,"C");
    $facture->Ln();
//Fin entête
    
 $i=0;
 $prixTotal=0;
foreach ($InfosDemande as $tab)
{
    //COLONNE Description
    $natDemande=$InfosDemande[$i]['nat_demande'];
    $facture->Cell(80,9," $natDemande ",1,0,"C");

    //COLONNE REF DEMANDE
    $refDemande=$InfosDemande[$i]['ref_demande'];
    $facture->Cell(60,9,"$refDemande",1,0,"C");

    //COLONNE COUT UNITAIRE D'UNE DEMANDE
    $prixDemande=$InfosDemande[$i]['prix'];
    $facture->Cell(50,9,"$prixDemande €",1,0,"C");
    $facture->Ln();
    
    $prixTotal+=$prixDemande;
    $i++;
}
    //Prix total
    $facture->Cell(140,9,"Prix totale  ",0,0,"R");
    $facture->Cell(50,9,"$prixTotal €",1,0,"C");
    $facture->Ln();

//COLONNE MONTANT

/***************************************************/
$facture->Ln();
$facture->Ln();
$facture->Ln();
//Détails de droit et de contrat sous le tableau
$facture->SetFont('dejavusans','',9);
$facture->Cell(30,4,"TVA non applicable, art. 293B du CGI");
$facture->Ln();
$facture->Ln();

$facture->SetFont('dejavusans','',9);


$facture->MultiCell(150,4,"Si paiement par chèque : libeller au nom de Régis GRANAROLO\nDélai de paiement : à réception de facture\nPénalités de retard (applicable après du dépassement du délai légal) : 15% (taux annuel)");
$facture->Ln();

$facture->Output();//Output renvoie l'objet pdf facture en sortie dans le navigateur
?>
