<h1 id="nous">Nous contacter :</h1>
<div id="form">
    <form action="#" method="post" name='form1' id='form2'>
        <input type=hidden name=subject value=formmail />
        <table>
            <tr><td>E-mail (*) : </td>
                <td><input type=text name=realname size=30 /></td></tr>
            <tr><td>Téléphone / Fax (*) : </td>
                <td><input type=text name=tel size=30 /></td></tr>
            <tr><td>Prénom (*) : </td>
                <td><input type=text name=news size=30 id='prenom' /></td></tr>
            <tr><td>Nom (*) : </td>
                <td><input type=text name=site size=30 /></td></tr>
            <tr><td>Entreprise (*) : </td>
                <td><input type=text name=email size=30 /></td></tr>
            <tr><td>Sujet (*) : </td>
                <td><input type=text name=sujet size=30 /></td></tr>
            <tr><td colspan=2>Votre message (*) : <br />
                    <textarea COLS=40 ROWS=8 name=comments></textarea>
                </td></tr>
        </table><br/>
        <p id='remarque_con'>Les champs marqués d'un * sont obligatoires. N'oubliez pas de mettre votre prénom.</p><br/>

        <p id='cap'>

            <?php
            require_once('recaptchalib.php');

            $publickey = "6LeiLOUSAAAAAKNstRLQSHhP44thCjAJsvy1qfFy"; // you got this from the signup page

            echo recaptcha_get_html($publickey);
            ?>

        </p><div id="form5">
            <input type='submit' value='Envoyer' id="envoyer"/>
        </div>
        <p></p></form>
    <p></p><br/>
</div>