<?php

include_once("Modele.php");
class Eur_admin extends Modele{

    protected $id;
    protected $login;
    protected $password;
    protected $tel;
   
    public function __toString() {
        return $this->id." ".$this->login." ".$this->password." ".$this->tel;
    }
}



?>
