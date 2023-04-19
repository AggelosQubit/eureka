<?php
//linareythen

include("/include/entity/Eur_user.php");

class ControleurEur_user extends Controleur{

    public function actionAccueil(){
        if(!isset($_POST['login'])){$this->rendu("accueil");}
    }
    public function actionConnexion(){
        //ON RECUPERE TOUT LES MEMBRES {a changer car pas optimal si beaucoup de membres}
        if(!isset($_SESSION['id'])){
            if(isset($_POST['email']) && isset($_POST['password'])){
                //SOLUTION OPTIMALE REQUETE EN FONCTION DES IDENTIFIANTS

                //modification de POST POUR QUE LE MDP SOIT EN MD5
                $_POST['password']=md5($_POST['password']);
                //SELECTION DU MEMBRE EN FONCTION DES ID
                $eur_user = Eur_user::get($_POST);

                //SI EXACTEMENT UNE INSTANCE DE CLIENT EST TROUVEE
                //ALORS ON CREE LES VARIABLE DE SESSION
                //ON ENVOI A LA VUE LE RESULTAT DE LA CONNEXION (connexionF,connexionR)
                if(count($eur_user)==1)
                {
                    $_SESSION['statut'] =$eur_user[0]->getPropriete("statut");
                    $_SESSION['login']  =$eur_user[0]->getPropriete("email");
                    $_SESSION['id']     =$eur_user[0]->getId("id");
                    $this->rendu("connexion",array('etat'=>'ConnexionR'));
                } else {
                     $this->rendu("connexion",array('etat'=>'ConnexionF'));
                }
            } else {
                $this->rendu("connexion");
            }
        } else {
            $this->rendu("connexion",array('etat'=>'ConnexionR'));
        }
    }
    //DESTRUCTION DE SESSION ET ENVOI SUR LA VUE QUI GERE 
    //LA DESTRUCTION DE LA SESSION
    public function actionDeconnexion(){
        if( isset($_SESSION['id']) ){
            session_destroy();
            $this->rendu("deconnexion");
        } else {
            $this->rendu("deconnexion");
        }
    }
    public function actionInscription(){
        //VERIFICATION D'EXISTENCE 
        if  (   !empty($_POST['nom'])    &&  !empty($_POST['prenom'])         &&  !empty($_POST['raison'])             &&  
                !empty($_POST['email'])  &&  !empty($_POST['confirm_email'])  &&  !empty($_POST['statut'])             && 
                !empty($_POST['forme'])  &&  !empty($_POST['tel'])            &&  !empty($_POST['portable'])           &&  
                !empty($_POST['fax'])    &&  !empty($_POST['adresse'])        &&  !empty($_POST['codePostal'])         && 
                !empty($_POST['ville'])  &&  !empty($_POST['password'])       &&  !empty($_POST['confirm_password']) 
            )
        {   //VERIFICATION DES EQUIVALENCES EMAIL-PASSWORD
            if(   ($_POST['email'] == $_POST['confirm_email']) && ($_POST['password']==$_POST['confirm_password']) ){ 
                //NOUVELLE INSTANCE DE EUR_USER QUI VA ETRE UTILISER POUR FAIRE LE LIEN OBJET =>OBJET EN BD #ORM 
                $eur_user = new Eur_user();
                //CREATION DE TAB QUI VA REMPLACER POST POUR ETRE ENVOYER DANS SAVE POUR L'INSTANCIATION D'UN NOUVEAU EUR_USER
                //UTILISATION DE PDO ET DE REQUETES PREPARES CONTRE LES INJECTION DE SQL
                $tabASend['statut']     =$_POST['statut']; 
                $tabASend['forme']      =$_POST['forme'];
                $tabASend['raison']     =$_POST['raison'];
                $tabASend['nom']        =$_POST['nom'];     
                $tabASend['prenom']     =$_POST['prenom'];
                $tabASend['ville']      =$_POST['ville'];    
                $tabASend['adresse']    =$_POST['adresse'];
                $tabASend['codePostal'] =$_POST['codePostal'];
                $tabASend['email']      =$_POST['email'];
                $tabASend['tel']        =$_POST['tel'];
                $tabASend['portable']   =$_POST['portable'];
                $tabASend['fax']        =$_POST['fax'];
                $tabASend['password']   =md5($_POST['password']);
                $tabASend['cle']                =md5(microtime(TRUE)*100000);
                $tabASend['active']             ="non";
                $tabASend['date_inscription']   =date("Y-m-d");
                //INSTANCIATION DES VALEURS
                foreach ($tabASend as $key => $value) {
                    $eur_user->setPropriete($key, ($value));
                }
                $eur_user->save();            
                $this->rendu("inscription",array('nClient',$tabASend));
            }
        }
    }
    public function actionModifierClient(){
        //ETRE CONNECTER
        if(isset($_SESSION['id'])){
            //ON RECUPERE LE CLIENT QUI DOIT ETRE MODIFIER A L'AIDE DE LA SESSION
            if(  isset($_GET['id']) && ($_SESSION['statut']=="admin") && ($_GET['id']!="null") ){
                $eur_user=Eur_user::get(intval($_GET['id']))[0];
                $valeur=intval($_GET['id']);
            } else {
                $eur_user=Eur_user::get(intval($_SESSION['id']))[0];
                $valeur=intval($_SESSION['id']);
            }
            $tabDataSend=null;
            //AVOIR APPUYER SUR LE BOUTON D'ENVOI
            if(isset($_POST['modifier'])){
                //CETTE BOUCLE EPURE $_POST 
                //SI UNE VALEUR EST NULLE (ON A PAS REMPLI UN CHAMP)
                //ALORS CETTE VALEUR N'EST PAS TRANSMISE DANS tabDataSend
                //DONC CETTE VALEUR NE SERA PAS DANS LA REQUETE
                foreach($_POST as $key => $value){
                    if($value!=''){$tabDataSend[$key]=$value;}
                }
                //var_dump($tabDataSend);
                //IL EST POSSIBLE QUE L'UTILISATEUR APPUYE SUR VALIDER SANS AVOIR RIEN RENTRER
                //AUQUEL CAS IL FAUT S'ASSURER QUE $tabDataSend EST NULL ET CONDITIONNé LE "SETTAGE"
                //DES PROPRIETES D'EUR_USER
                if($tabDataSend!=null)
                {
                    //CETTE BOUCLE FAIS CHANGE LES PROPRIETE DE L'OBJET EUR_USER QUI SERA ENSUITE CHANGER DANS LA BD GRACE 
                    //A LA FONCTION SAVE
                    foreach ($tabDataSend as $key => $value){
                        $eur_user->setPropriete($key,$value);
                    }
                } else {
                    $this->rendu("modifierclient",array  ('modification'  =>'none'));
                    exit();
                }
                //LA FONCTION SAVE RENVOIE UNE STRING 
                //LA STRING SERT DONC A CHOISIR QUOI ENVOYER COMME TABLEAU A LA VUE
                //EN FONCTION DE CE TABLEAU LA VUE DECIDERA QUOI AFFICHER COMME MESSAGE REUSSITE DE MODIFICATION OU NON
                if($eur_user->save()!="queryFailed"){$this->rendu("modifierclient",array  ('modification'  =>'granted'));}
                else {$this->rendu("modifierclient",array  ('modification'  =>'denied'));}
            } else {
                //SI ON A PAS CLIQUE SUR LE BOUTON D'ENVOI ON AFFICHE SEULEMENT LA PAGE DU CLIENT EN QUESTION

                $tabDataUser=Eur_user::get($valeur);
                $this->rendu("modifierclient",$tabDataUser);
            }
        }  else {
            //ICI LE CLIENT N'EST PAS CONNECTER CAR ID N'EST PAS CREER
            //LA VUE GERE LA NON-EXISTENCE DE ID AINSI ON RENVOI VERS LA VUE DIRECTEMENT
            $this->rendu("modifierclient");
        }  
    }
    public function actionEspaceClient(){
        if(isset($_SESSION['id']) && ($_SESSION['statut']!="admin")){
            $tabDataUser=Eur_user::get(intval($_SESSION['id']));
            $this->rendu("espaceclient",$tabDataUser);
        }   elseif(isset($_SESSION['statut']) && $_SESSION['statut']=="admin")   {
            $tabDataUser=Eur_user::get();
            $this->rendu("espaceclient",$tabDataUser);
        }   else {
            $this->rendu("espaceclient");
        }
    }
}