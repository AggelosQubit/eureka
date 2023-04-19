<?php
include 'setup.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Conseils et formations - Accueil</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <link href="/components/bootstrap/css/oldCass/style.css" rel="stylesheet" type="text/css" />
        <link href="/components/bootstrap/css/oldCass/menu.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="/js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="/js/suggestions.php"></script>


    </head> 

    <body>
        <div id="conteneur">
            <div id="bandeau">
                <div id="logo"><a href="index_formation.php" title="Présentation d'Eureka" ><img src="/images/logo_cf.png" alt="Légende du logo" /></a></div>
            </div>

            <div id="nav_1">
                <ul>
                    <li><a href="/vues/vuesATransfo/index_formation.php" title="Présentation d'Eureka" id="menu_a1"><img src="/images/cap.jpg" id="menu1"/></a></li>
                    <li><a href="/vues/vuesATransfo/offre-formations.php" title="Nos activités" id="menu_a2"><img src="/images/cf_of.jpg" id="menu2"/></a></li>
                    <li><a href="client.php" title="Votre espace dédié" id="menu_a3"><img src="/images/cf_ies.jpg" id="menu3"/></a></li>
                    <li><a href="contact.php" title="Contacter Eureka (nos adresses email...)" id="menu_a4"><img src="/images/cf_contact.jpg" id="menu4"/></a></li>
                </ul>
            </div>

            <div id="news">
                <script type="text/javascript">

// new pausescroller(name_of_message_array, CSS_ID, CSS_classname, pause_in_miliseconds)

                    new pausescroller(pausecontent, "pscroller1", "someclass", 3000)
                </script>
            </div>

            <aside>
                <p>Un service d' :</p><br/><br/>
                <a href="/"><img src="/images/logo.png" alt="Légende du logo" /></a><br/><br/><br/>
                <p>c'est aussi :</p><br/>
                <a href="index_veille_it.php"><img src="/images/logo_vit.png" alt="Légende du logo" /></a><br/><br/><br/>
                <a href="index_sourcing_rh.php"><img src="/images/logo_srh.png" alt="Légende du logo" /></a>
            </aside>

