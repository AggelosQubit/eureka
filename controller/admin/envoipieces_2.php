<?php
	//session_start();
	include("controle_acces_page.php");
	//include("fonctions_liste.php");
	//include("sort.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 strict//EN">
<html>
	<head>
		<title>Administration - Déposer un document</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link href="/styles/commun.css" rel="stylesheet" type="text/css" />
		<link href="/styles/style.css" rel="stylesheet" type="text/css" />
		<link href="/styles/menu.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/js/jquery-1.8.3.js"></script>
		<script type="text/javascript" src="/js/jquery.placeholder.js"></script>
		<script type="text/javascript" src="/js/suggestions.php"></script>
		
		
		
<?php 
		$raison = $_POST['raison']; 
		$dest = $_POST['fist'];
                $ref_demande = $_POST['ref'];
                //echo "azerty".$_POST['fist'];
?>

	</head> 
	
	<body>
		
			
			
			
			<h1 id="titre4">Déposer des documents</h1>

			<form method="POST" action="index.php?uc=admin&ca=upload" enctype="multipart/form-data" id="up">

<!-- On limite le fichier à 1Mo -->
				
				<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
                                <input type="hidden" name="ref_demande" value="<?php echo $ref_demande ?>" />
				<input type='hidden' name='raison' value='<?php echo $raison ?>' />
				<input type='hidden' name='fist' value='<?php echo $dest ?>' />
                                


				Nature du service demandé : <?php recherche_nature(); ?><br/><br/>
				Fichier : <input type="file" name="avatar" /><br/>
<!--				Fichier : <input type="file" name="avatar[1]"><br/>
				Fichier : <input type="file" name="avatar[2]"><br/>
				Fichier : <input type="file" name="avatar[3]"><br/>
				Fichier : <input type="file" name="avatar[4]"><br/><br/>-->
				<input type="submit" name="envoyer" value="Envoyer les fichiers" />
			</form>
			
<?php
//
//			$dossier = '../intranet/files/'.$raison.'/';
//			$open = opendir($dossier);
//			$uploaded_files = "";
//			$allow_file_deletion = true;
//       
//			if($_REQUEST["delete"] && $allow_file_deletion)
//			{
//				if(strpos($_REQUEST["delete"],"/.") > 0);
//				elseif(strpos($_REQUEST["delete"],$dossier) === false);
//				elseif(substr($_REQUEST["delete"],0,(7+strlen($raison))) == $dossier)
//				{
//					unlink($_REQUEST["delete"]);
//				
//					$upload_log_file = "upload_log.txt"; //Modifiez ce paramètre pour le fichier journal que vous souhaitez utiliser
//					$resource = fopen($upload_log_file,"a");
//        
//					fwrite($resource,date("Y-m-d H:i:s")." - ".$_REQUEST["delete"]." supprimée par ".$_SERVER["REMOTE_ADDR"]."\n");
//					fclose($resource);
//        
//					$message = "File has been deleted.";
//
//					header("Location: $site_uri?message=$message");
//				}
//			}
//
//			while($file = readdir($open))
//			{
//				if(!is_dir($file) && !is_link($file))
//				{
//					$uploaded_files .= "
//						<tr>
//							<td style=\"background: #FFE; color: #000; text-align: left; width: 70%\">
//								<a href=\"$dossier$file\" title=\"$file (".round((filesize($dossier."".$file)/1024),0)." Ko)\">".$file."</a> (".round((filesize($dossier."".$file)/1024),0)." Ko)
//							</td>
//					";
//					if($allow_file_deletion)
//						$uploaded_files .= "
//                            <td style=\"background: #FFE; color: #000; text-align: right; width: 30%\">
//								<a href=\"?delete=$dossier".urlencode($file)."\" title=\"Delete File\">Supprimer le fichier</a>
//							</td>
//						";
//					else
//						$uploaded_files .= "
//                            <td style=\"background: #FFE; color: #000; text-align: right; width: 30%\"><del><strong>Supprimer le fichier</strong></del></td>
//						";
//					$uploaded_files .= "
//						</tr>
//						<tr>
//							<td colspan=\"2\" style=\"background: #FFE; color: #000; text-align: left; text-indent: 20px\">
//								Transféré le <strong>".date("Y-m-d H:i:s", filemtime($dossier.$file))."</strong>
//							</td>
//					";
//					$uploaded_files .="
//						</tr>
//					";
//				}
//			}
//
//?>

			<div style="position: absolute; top: 458px; left: 750px;">
				<p><strong>Les fichiers téléchargés</strong></p>
<!--				<table style="border: 2px dotted #000; width: 100%   right:5px; width:500px;" id='liste'>-->
     
//<?php
//
//				if($uploaded_files == "")
//				{
//					echo "
//						<tr>
//                            <td colspan=\"2\" style=\"background: #FFECF7; color: #000; text-align: center\"><br />
//								<strong>Il n'y a pas encore de fichiers téléchargés.</strong><br /><br />
//							</td>
//                        </tr>
//					";
//				}
//				else
//				{
//					echo $uploaded_files;
//				}
//					
?>

 			
		</div>
	</body>
</html>
