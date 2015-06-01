<?php
session_start();
?>
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
        <?php
            if(isset($_SESSION["name"]) && $_SESSION["name"] != "")
            {
                if(isset($_GET["disconected"]) && $_GET["disconected"] == "true")
                {
                    echo "<p><strong> Session close : ".$_SESSION["name"]." </strong></p>";
                    session_destroy();
                }
                else
                {
                    echo "<p><strong> Session : ".$_SESSION["name"]." </strong></p>";
                }
            }
            if(isset($_COOKIE["name"]) && $_COOKIE["name"] != "")
            {

                 echo "<p><strong> Cookie : ".$_COOKIE["name"]." </strong></p>";
            }
        ?>

        <?php
            if (isset($_GET["page"]) && $_GET["page"] != "")
            {
                include($_GET["page"]);
            }
            else
            {
                include("home.php");
            }

        ?>
        
        
        <!-- Le pied de page -->

        <?php include("piedDePage.php"); ?>

    </body>
</html>