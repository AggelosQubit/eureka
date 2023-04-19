<?php

include_once("Modele.php");
class Eur_demande extends Modele{

    protected $ref_demande;
    protected $nat_demande;
    protected $descrip_demande;
    protected $freq_demande;
    protected $statut_demande;
    protected $date_demande;
    protected $date_upload      =null;
    protected $date_download    =null;
    protected $prix             =null;
    protected $url              =null;
    protected $idClient         =null;


   

    public function __toString() {
        return  $this->id." ".$this->ref_demande." ".$this->nat_demande." ".$this->descrip_demande." ".$this->freq_demande." ".$this->statut_demande." ".$this->date_demande." ".$this->date_upload." ".$this->date_download." ".$this->prix." ".$this->url." ".$this->idClient;
    }

}

?>
