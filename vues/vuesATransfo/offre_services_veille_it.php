<?php include './header_veille_it.php'; ?>
     
			<div id="vit_principale">
				<br/><br/>
				<h3 id="pres_h3">Offre de services</h3><br/>
					<p id="txt_pres">Eureka, ce n'est pas une pas deux mais trois activités : des conseils et des formations, de la veille et du recrutement.<br/>
					Ces trois domaines permettent de fournir aux entreprises qui en ont besoin, un tryptique de services essentiels à la<br/>
					réussite sur un marché du numérique de plus en plus riche et complexe.<br/>
					Mais trêve de bavardages, découvrons ensemble ce qui se cache derrière les prestations que nous vous proposons :<br/><br/><br/><br/><br/><br/>
					</p>
				
				<div id="foot_pres1">
					<img src="/images/logo_cf.png" id="osv_log1"/>
				</div>
				<div id="foot_pres2">
					<img src="/images/logo_vit.png" id="osv_log2"/>
				</div>
				<div id="foot_pres3">
					<img src="/images/logo_srh.png" id="osv_log3"/>
				</div>
				
				<?php if(isset($contenu_principal)) {echo $contenu_principal;} ?>
				<?php if(isset($fichier_principal)){include($fichier_principal);} ?>
				<?php if(isset($contenu_presentation)) {echo $contenu_presentation;} ?>                     
			</div>    
<?php include './footer_veille_it.php'; ?>
