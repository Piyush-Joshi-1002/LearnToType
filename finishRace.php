<?php include "Connection.php";?>
<?php
    $Time = time()+10;
    $UserLiveID = $_SESSION["UserLiveID"];
    $query = "UPDATE `total_current_user` SET IsLive = $Time , FinishRace = 1 where ID = $UserLiveID";
    $result = $conn->query($query);
    echo"Done";
?>