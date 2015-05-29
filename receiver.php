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
                if(array_key_exists('first_name', $_POST))
                {
                    echo 'var1 = '.htmlspecialchars($_POST['first_name']).'<br/>';
                }
                else
                {
                    echo 'var1 undefined <br/>';
                }

                if(isset($_POST['chicken']))
                {
                    echo 'var2 = '.$_POST['chicken'].'<br/>';
                }
                else
                {
                    echo 'var2 undefined <br/>';
                }

                if(isset($_POST['choix']))
                {
                    echo 'var3 = '.$_POST['choix'].'<br/>';
                }
                else
                {
                    echo 'var3 undefined <br/>';
                }
                
                if(isset($_FILES['sendFile']))
                {
                    if($_FILES['sendFile']['error'] == 0)
                    {
                        if($_FILES['sendFile']['size'] < 1000000)
                        {
                            if(in_array(pathinfo($_FILES['sendFile']['name'])['extension'], array('jpg','jpeg','gif','png') ))
                            {

                                move_uploaded_file($_FILES['sendFile']['tmp_name'],'upload/'.basename($_FILES['sendFile']['name'])); 
                                $img= 'upload/'.basename($_FILES['sendFile']['name']);
                                echo '<img src="'.$img.'">';
                                echo  '<a href="download.php?filesize='.$_FILES['sendFile']['size'].'&filename='.basename($_FILES['sendFile']['name']).'">Download</a>';
                            }
                            else
                            {
                                echo 'Unadapted  extension<br/>';
                            }
                        }
                        else
                        {
                            echo 'maximum size 1 Mo <br/>';
                        }
                    }
                    else
                    {
                        echo 'error='.$_FILES['sendFile']['error'].' <br/>';
                    }
                }
                else
                {
                    echo 'var4 undefined <br/>';
                }
                
            ?>
        </p>






    </div>

    <!-- Le pied de page -->

    <?php include("piedDePage.php"); ?>

</body>
</html>