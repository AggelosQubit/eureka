<?php
include("/include/entity/Eur_demande.php");
class ControleurEur_demande extends Controleur{

    public function actionVoirDemande() {
    	//GRACE A GET ET SESSION[ID] ON OBTIENT LES DEMANDES D'UN MEMBRE
    	if(isset($_SESSION['id']) && (($_SESSION['statut']!="admin")) )
    	{
    		$eur_demandes=Eur_demande::get(array('idClient'=>$_SESSION['id']));
    		$this->rendu("voirdemande",$eur_demandes);
    	}  elseif($_SESSION['statut']=="admin")  {
    		$eur_demandes=Eur_demande::get();
            $this->rendu("voirdemande",$eur_demandes);
    	} else {
            $this->rendu("voirdemande");
        }
    }
    public function actionModifierDemande(){
        if(isset($_SESSION['id'])){
            $tempTab=null;
            //ON RECUPERE LE CLIENT QUI DOIT ETRE MODIFIER A L'AIDE DE LA SESSION
            if(  isset($_POST['id']) && ($_SESSION['statut']=="admin") && ($_POST['id']!="null") ){
                $eur_demande=Eur_demande::get(intval($_POST['id']))[0];
                $valeur=intval($_POST['id']);
            } else {
                $eur_demande=Eur_demande::get(intval($_POST['id']))[0];
                $valeur=intval($_POST['id']);
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
                        $eur_demande->setPropriete($key,$value);
                    }
                } else {
                    $this->rendu("modifierdemande",array  ('modification'  =>'none'));
                    exit();
                }
                //LA FONCTION SAVE RENVOIE UNE STRING 
                //LA STRING SERT DONC A CHOISIR QUOI ENVOYER COMME TABLEAU A LA VUE
                //EN FONCTION DE CE TABLEAU LA VUE DECIDERA QUOI AFFICHER COMME MESSAGE REUSSITE DE MODIFICATION OU NON
                if($eur_demande->save()!="queryFailed"){$this->rendu("modifierdemande",array  ('modification'  =>'granted'));}
                else {$this->rendu("modifierdemande",array  ('modification'=>'denied'));}
            } else {
                //SI ON A PAS CLIQUE SUR LE BOUTON D'ENVOI ON AFFICHE SEULEMENT LA PAGE DU CLIENT EN QUESTION

                $tabDataAsk=Eur_demande::get($valeur);
                $this->rendu("modifierdemande",$tabDataAsk);
            }
        }  else {
            //ICI LE CLIENT N'EST PAS CONNECTER CAR ID N'EST PAS CREER
            //LA VUE GERE LA NON-EXISTENCE DE ID AINSI ON RENVOI VERS LA VUE DIRECTEMENT
            $this->rendu("modifierdemande");
        }
    }
    public function actionSupprimerDemande()
    {
        if(isset($_POST['id']) && isset($_SESSION['id']))
        {
            Eur_demande::suppr(intval($_POST['id']));
        }
        $this->rendu("supprimerdemande");
    }
}
