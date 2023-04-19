<?php


include_once("Modele.php");
class Eur_facture extends Modele{

    protected $id;
    protected $raison;
    protected $ref_demande;
    protected $nat_demande;
    protected $mois_demande;
    protected $quantite;
    protected $prix_total;
    protected $ref_facture;

    public function __toString() {
        return $this->id."".$this->raison."".$this->ref_demande."".$this->nat_demande."".$this->mois_demande."".$this->quantite."".$this->prix_total."".$this->ref_facture;
    }

}
?>
