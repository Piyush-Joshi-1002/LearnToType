<?php
    include "assets/php/Connection.php";
?>
<?php
    if(isset($_SESSION['UserName']))
    {
        session_destroy();
        echo"ThisIsGood";
    }
    else
    {
        echo"ThisIsNotGood";
    }
?>