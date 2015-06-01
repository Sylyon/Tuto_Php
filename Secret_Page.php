
<!-- Le corps -->
<?php 
    function check_pass($val,$pass)
    {
        $rep=array(false,false);
        if (isset($val) && $val != "")
        {
            $rep[0]=true;
            if($val == $pass)
            {
                $rep[1]=true;
            }
        }
        return $rep;
    } 
?>
<?php
    if (isset($_POST["name"]) && $_POST["name"] != "")
    {
        echo "Hello ".$_POST["name"];
        $rep=check_pass($_POST["pass"],"kangourou");
        if ($rep[0])
        {
            if ($rep[1])
            {
                echo "
                    <h1> Secret code: </h1>
                    <p>
                        A12BD45CDS148A
                    </p>

                    ";
            }
            else
            {
                echo "<p>Il n'existe pas de code secret</p>";
            }
        }
        else
        {
            echo "<p>Please insert your password</p>";
        }
    }
    else
    {
        echo "<p>Please insert your name</p>";
    }

 

?>