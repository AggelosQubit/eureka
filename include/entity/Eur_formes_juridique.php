<?php

include_once("Modele.php");
class Eur_formes_juridique extends Modele {

    protected $id;
    protected $nom;

    public function __toString() {
        return $this->id." ".$this->nom;
    }

}
?>
