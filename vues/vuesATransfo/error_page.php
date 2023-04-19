<?php
header("HTTP/1.1 500 INTERNAL SERVER ERROR");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sorry...</title>
    </head>
    <body>
        <header style="text-align: center">
            <img src="/img/control.png" height="150" width="150">
            
        </header>
        <h1>Oups...</h1>

        <?php
        var_dump(INI_FILE);
        ?>
        
    </body>
</html>
