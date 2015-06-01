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
        <form method="POST" action="Secret_Page.php">
            <label for="name">Your name : </label>
            <input type="text" name="name" />
            <br/>
            <label for="pass">Your password : </label>
            <input type="text" name="pass"   />
            <br/>
            <label for="submit">Connect : </label>
            <input type="submit"name="submit" />
        </form>
        
        
        
        <!-- Le pied de page -->

        <?php include("piedDePage.php"); ?>

    </body>
</html>