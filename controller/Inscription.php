<?php

//namespace controller;
//
//use dao\MysqlDao_1;
//use entity\users;
//use entity\formes_juridiques;
//use entity\statuts;
//use \DateTime;
//use control\Control;
//
//class Inscription {
//
//    public function action() {
//        $dao = new MysqlDao_1();
//        $verif = new control();
//        $messages_erreur = array();
//
//        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            $messages_erreur = array();
//            $statut = htmlentities($_POST['statuts']);
//            $forme = htmlentities($_POST['formes_juridiques']);
//            $raison = htmlentities($_POST['raison_sociale']);
//
//            if (!$verif->checkNomPrenom($_POST['prenom_contact'])) {
//                $messages_erreur['prenom_contact'] = "Votre prénom n'est pas correct.";
//            } else {
//                $prenom = htmlentities($_POST['prenom_contact']);
//            }
//            if (!$verif->checkNomPrenom($_POST['nom_contact'])) {
//                $messages_erreur['nom_contact'] = "Votre nom n'est pas correct.";
//            } else {
//                $nom = htmlentities($_POST['nom_contact']);
//            }
//            if (!$verif->checkMail($_POST['email_contact'])) {
//                $messages_erreur['email_contact'] = "Votre adresse mail n'est pas correct.";
//            } else {
//                $email = htmlentities($_POST['email_contact']);
//            }
//            if (!isset($_POST['confirm_email']) || ($_POST['email_contact'] != $_POST['confirm_email']) || !$verif->checkMail($_POST['confirm_email'])) {
//                $messages_erreur['confirm_email'] = "Vous n'avez pas retapé la même adresse mail.";
//            } else {
//                $confirm_email = htmlentities($_POST['confirm_email']);
//            }            
//            if (!$verif->checkMotdepasse($_POST['password'])) {
//                $messages_erreur['password'] = "Votre mot de passe n'est pas correct.";
//            } else {
//                $password = htmlentities($_POST['password']);
//            }
//            if (!isset($_POST['confirm_password']) || ($_POST['password'] != $_POST['confirm_password']) || !$verif->checkMotdepasse($_POST['confirm_password'])) {
//                $messages_erreur['confirm_password'] = "Vous n'avez pas retapé le même mot de passe.";
//            } else {
//                $password = htmlentities($_POST['password']);
//            }
//            if (!$verif->checkTel($_POST['tel_contact'])) {
//                $messages_erreur['tel_contact'] = "Votre numéro de téléphone n'est pas correct.";
//            } else {
//                $tel = htmlentities($_POST['tel_contact']);
//            }
//            $portable = htmlentities($_POST['port_contact']);
//            $fax = htmlentities($_POST['fax_contact']);
//
//
//            if (count($messages_erreur) == 0) {
//                $user = new users(NULL, $statut, $forme, $raison, $nom, $prenom, $email, $tel, $portable, $fax, $password);
//                $dao->ajoutUsers($user);
//                include VIEW . "inscription_reussi.php";
//            } else {
//                
//                include VIEW . "form_identification.php";
//            }
//        } else {
//            include VIEW . "form_identification.php";
//        }
//    }
//
//    public function formulaire() {
//        include VIEW . "form_identification.php";
//    }
//
//}
if(!isset($_REQUEST['ui'])){
    header('Location: ../index.php');
}

$ui = $_REQUEST['ui'];

switch($ui){
 case 'confirmer':
        {  
include("vues/confirm_inscription.php");
        }
}
?>