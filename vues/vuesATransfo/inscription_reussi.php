<?php include VIEW.'header.php'; ?>

    <?php
    echo 'Inscription réussi !';
    echo "RAPPEL IDENTIFIANTS : " . "<br>" . "Votre mot de passe est : " . $password . "<br>" . "Votre login est :" . $email;
    ?>
<?php include VIEW.'footer.php' ; ?>