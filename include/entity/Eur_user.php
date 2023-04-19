<?php

include_once("Modele.php");
class Eur_user extends Modele
{
    protected $statut;
    protected $forme;
    protected $raison;
    protected $nom;
    protected $prenom;
    protected $ville;
    protected $adresse;
    protected $codePostal;
    protected $email;
    protected $tel;
    protected $portable = null;
    protected $fax = null;
    protected $password;
    protected $cle;
    protected $active;
    protected $date_inscription;

    public function __toString() {
        return $this->id." ".$this->statut." ".$this->forme." ".$this->raison." ".$this->nom." ".$this->prenom." ".$this->ville." ".$this->adresse." ".$this->codePostal." ".$this->email." ".$this->tel." ".$this->portable." ".$this->fax." ".$this->password." ".$this->cle." ".$this->active." ".$this->date_inscription;
    }

}

?>
