<?php
    include "assets/php/Connection.php";
?>
<?php

    $UserName = $_COOKIE['UserName'];
    $UserEmail = $_COOKIE['UserEmail'];
    $UserPassword = $_COOKIE['UserPass'];
    $query = "INSERT into `userdetails` (`UserName` ,`UserEmail`,`UserPassword`) VALUES ('$UserName','$UserEmail','$UserPassword');";
    $result = $conn->query($query);
    if($result)
    {
        $query = "INSERT INTO `userstatus`(`UserID`) VALUES(".$conn->insert_id.");";
        $result = $conn->query($query);
        if($result)
        {
            $_SESSION['UserID'] = "".$conn->insert_id."";
            $_SESSION['UserName'] = $UserName;
            echo "".$_SESSION['UserID']."";   
        }
        else
        {
            $query = "DELETE FROM `userdetails` WHERE `userdetails`.`UserID` =".$conn->insert_id.";";
            $result = $conn->query($query);
            echo "SignUpFail";
        }
    }
    else
    {
        echo"SignUpFail";
    }
?>