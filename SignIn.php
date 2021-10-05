<?php
    include "assets/php/Connection.php";
   
?>
<?php

    $UserEmail = $_COOKIE['UserEmail'];
    $UserPassword = $_COOKIE['UserPass'];
    $query = "Select * from `userdetails` where `UserEmail` = '$UserEmail'";
    $result = $conn->query($query);
    if($result)
    {
        if($row = $result->fetch_assoc())
            {
                if(($UserEmail == $row['UserEmail']) && ($UserPassword == $row['UserPassword']))
                {
                    $_SESSION['UserID'] = "".$row['UserID']."";
                    $_SESSION['UserName'] = "".$row['UserName']."";
                    echo "".$_SESSION['UserName']."";
                }
                else
                {
                    echo"SignInFail";
                }
            }
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