<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Mon super site</title>
</head>

<body>

    <?php include("enTete.php"); ?>

    <?php include("menu.php"); ?>

    <!-- Le corps -->

    <div id="corps">
        <h1>Receiver</h1>

        <p>
            Receive informations
        </p>
        <p>
            <?php 
                if(array_key_exists('var1', $_GET))
                {
                    echo 'var1 = '.$_GET['var1'].'<br/>';
                }
                else
                {
                    echo 'var1 undefined <br/>';
                }
                if(array_key_exists('var2', $_GET))
                {
                    echo 'var2 = '.$_GET['var2'].'<br/>';
                }
                else
                {
                    echo 'var2 undefined <br/>';
                }
                
            ?>

        </p>
    </div>

    <!-- Le pied de page -->

    <?php include("piedDePage.php"); ?>

</body>
</html>