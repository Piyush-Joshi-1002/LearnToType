<?php
    include "assets/php/Connection.php";
?>
<?php
    if(isset($_SESSION['UserID']))
    {
        if($_SESSION['UserID'] != '')
            echo "".$_SESSION['UserName']."";
        else
        {
            echo"SignInFail";       
        }
    }
    else
    {
        echo"SignInFail";
    }
?>