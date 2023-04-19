<?php

include_once("Modele.php");
class tarifs extends Modele{

    protected $id;
    protected $nom_service;
    protected $prix;

	public function __toString() {
        return $this->id." ".$this->nom_service." ".$this->prix;
    }

}

?>
