<?php include 'vues/structures/header_sourcing_rh.php'; ?>

<div id="srh_principale">
    <br/><br/>



    <div id="foot_pres1">
        <img src="/images/image200.jpg" id="srh_log1"/>
    </div>
    <div id="foot_pres2">
        <h1 id="srh_pres_h3">Présentation générale</h1><br/>
    </div>
    <div id="foot_pres3">
        <img src="/images/image200.jpg" id="srh_log3"/>
    </div>

    <p id="srh_txt_pres">
        Eureka, ce n'est pas une pas deux mais trois activités : des conseils et des formations, de la veille et du recrutement.<br/>
        Ces trois domaines permettent de fournir aux entreprises qui en ont besoin, un tryptique de services essentiels à la
        réussite sur un marché du numérique de plus en plus riche et complexe.<br/>
        Mais trêve de bavardages, découvrons ensemble ce qui se cache derrière les prestations que nous vous proposons :
        Lorem ipsum dolor sit amet...
        Vivamus sed libero nec mauris pulvinar facilisis ut non sem...
        Phasellus ligula massa, congue ac vulputate non, dignissim at augue...<br/><br/><br/><br/><br/><br/>
    </p>

    <?php
    if (isset($contenu_principal)) {
        echo $contenu_principal;
    }
    ?>
    <?php
    if (isset($fichier_principal)) {
        include($fichier_principal);
    }
    ?>
<?php
if (isset($contenu_presentation)) {
    echo $contenu_presentation;
}
?>                     
</div>    

<?php include 'vues/structures/footer_sourcing_rh.php'; ?>
