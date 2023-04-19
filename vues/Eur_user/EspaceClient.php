
<?php
/**
 * @File: Confirmer.php
 * 
 * @Author: Cadet Dainty
 */

include_once("/vues/Vue.php");

class EspaceClient extends Vue {

    public function contenu($data=array()){

        //ESPACE CLIENT***************************************************************
        if( isset($_SESSION['id']))
        {
            if($_SESSION['statut']!="admin")
            {
                echo'   <div class="row well">';
                $this->nav();               

                echo'       <div class="col-md-offset-1 col-md-8">
                                <h3 style="text-align:center; ">Informations Client</h3>
                                <table class="table">';
                                foreach ($data as $user) {
                                    echo'<tr><th>Statut</th>                    <td>'.$user->getPropriete("statut")     .'</td></tr>';
                                    echo'<tr><th>Forme</th>                     <td>'.$user->getPropriete("forme")      .'</td></tr>';
                                    echo'<tr><th>Raison</th>                    <td>'.$user->getPropriete("raison")     .'</td></tr>';
                                    echo'<tr><th>Nom</th>                       <td>'.$user->getPropriete("nom")        .'</td></tr>';
                                    echo'<tr><th>Pr&eacute;nom</th>             <td>'.$user->getPropriete("prenom")     .'</td></tr>';
                                    echo'<tr><th>Ville</th>                     <td>'.$user->getPropriete("ville")      .'</td></tr>';
                                    echo'<tr><th>adresse</th>                   <td>'.$user->getPropriete("adresse")    .'</td></tr>';
                                    echo'<tr><th>Code Postal</th>               <td>'.$user->getPropriete("codePostal") .'</td></tr>';
                                    echo'<tr><th>E-mail</th>                    <td>'.$user->getPropriete("email")      .'</td></tr>';
                                    echo'<tr><th> T&eacute;l&eacute;phone</th>  <td>'.$user->getPropriete("tel")        .'</td></tr>';
                                    echo'<tr><th>Portable</th>                  <td>'.$user->getPropriete("portable")   .'</td></tr>';
                                    echo'<tr><th>Fax</th>                       <td>'.$user->getPropriete("fax")        .'</td></tr>';
                                }
                        echo'   </table>
                            </div>
                        </div>
                    ';
            }	else {
                //ESPACE ADMIN******************************************************************
                $this->nav();
                echo'
                    <div class="row well">
                        <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>Statut</th>
                                    <th>Forme Juridique</th>
                                    <th>Raison</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Ville</th>
                                    <th>Adresse</th>
                                    <th>Code Postal</th>
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th>Portable</th>
                                    <th>Fax</th>
                                    <th>Active</th>
                                    <th>Date Inscription</th>
                                </tr>';

                            foreach ($data as $user) {
                                echo'<tr>';
                                    echo'<td><a href="/eureka/rout/eur_user/modifierclient/'.$user->getId().'">'.$user->getId()            .'</td>';
                                    echo'<td>'.$user->getPropriete("statut")            .'</td>';
                                    echo'<td>'.$user->getPropriete("forme")             .'</td>';
                                    echo'<td>'.$user->getPropriete("raison")            .'</td>';
                                    echo'<td>'.$user->getPropriete("nom")               .'</td>';
                                    echo'<td>'.$user->getPropriete("prenom")            .'</td>';
                                    echo'<td>'.$user->getPropriete("ville")             .'</td>';
                                    echo'<td>'.$user->getPropriete("adresse")           .'</td>';
                                    echo'<td>'.$user->getPropriete("codePostal")        .'</td>';
                                    echo'<td>'.$user->getPropriete("email")             .'</td>';
                                    echo'<td>'.$user->getPropriete("tel")               .'</td>';
                                    echo'<td>'.$user->getPropriete("portable")          .'</td>';
                                    echo'<td>'.$user->getPropriete("fax")               .'</td>';
                                    echo'<td>'.$user->getPropriete("active")            .'</td>';
                                    echo'<td>'.$user->getPropriete("date_inscription")  .'</td>';
                                echo'</tr>';        
                            }
                echo'   </table>
                    </div>';
            }
        } else {
             echo'<div class="row">
                    <p class="well" style="text-align:center;">
                        Vous n\'&ecirc;tes pas connecter actuellement, Connectez Vous!
                    </p>
                </div>';
        }
    }
}
?>