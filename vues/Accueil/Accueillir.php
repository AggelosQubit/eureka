<?php
//linareythen
include_once('vues/Vue.php');

class Accueillir extends Vue
{
    public function contenu($data=array())
    {
        echo '<div class="well row">';
        var_dump($_SESSION);
        echo '</div>';
    }
}

