<?php

include_once("Modele.php");
class statuts extends Modele{

    protected $id;
    protected $nom;

	public function __toString() {
        return $this->id." ".$this->nom;
    }

}

?>
