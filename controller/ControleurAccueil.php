<?php

class ControleurAccueil extends Controleur{

    public function actionAccueillir() {
        $this->rendu("accueillir");
    }
}
