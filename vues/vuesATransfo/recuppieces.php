<h1 id='titre2'>Gestion des demandes</h1><br/><br/>
<table id='oeuvre' border='1'>
    <tr>
        <th id='th_ad'>Référence de la demande</th>
        <th id='th_ad'>Raison sociale</th>
        <th id='th_ad'>Nature du service demandé</th>
        <th id='th_ad'>Description de la demande</th>
        <th id='th_ad'>Fréquence de la demande</th>
        <th id='th_ad'>Statut</th>
        <th id='th_ad'>Date demande</th>
        <th id='th_ad'>Date upload</th>
        <th id='th_ad'>Date download</th>
        <th id='th_ad'>Actions</th>
    </tr>
    <?php
        
	mysql_select_db("db_eurekaint");
	mysql_query("SET NAMES 'utf8'");
	$sql = mysql_query("SELECT ref_demande, raison, nat_demande, descrip_demande, freq_demande, statut_demande, date_demande, date_upload, date_download FROM eur_demandes, eur_users WHERE eur_users.id = eur_demandes.idClient and idClient=".$_SESSION['id']." ORDER BY date_demande DESC");
        
        while($colonne = mysql_fetch_array($sql))
	{
            ?>
                <tr>
                    <td id='td_ad'><?php echo $colonne['ref_demande'] ?></td>
                    <td id='td_ad'><?php echo $colonne['raison'] ?></td>
                    <td id='td_ad'><?php echo $colonne['nat_demande'] ?></td>
                    <td id='td_ad'><?php echo $colonne['descrip_demande'] ?></td>
                    <td id='td_ad'><?php echo $colonne['freq_demande'] ?></td>
                    <td id='td_ad'><?php echo $colonne['statut_demande'] ?></td>
                    <td id='td_ad'><?php echo $colonne['date_demande'] ?></td>
                    <td id='td_ad'><?php echo $colonne['date_upload'] ?></td>
                    <td id='td_ad'><?php echo $colonne['date_download'] ?></td>
                    <td id='td_ad'><?php actionListePiece($colonne['ref_demande'], $colonne['statut_demande']) ?></td>
                </tr>
            <?php
        }
    ?>
</table>
