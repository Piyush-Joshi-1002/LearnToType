<?php include "Connection.php";?>
<?php
    $Time = time()+3;
    $UserLiveID = $_SESSION["UserLiveID"];
    $query = "select Users , Coundown from `total_current_user` where ID = $UserLiveID ";
    $result = $conn->query($query);
    if($row = $result->fetch_assoc())
    {
        $UserConnected = explode(",",$row['Users']);
        $Coundown = $row['Coundown'];
        $Coundown--;
        foreach($UserConnected as $str)
        {
            $query = "UPDATE `total_current_user` SET Coundown = $Coundown where ID = $str";
            $result = $conn->query($query);
        }
        $query = "UPDATE `total_current_user` SET IsLive = $Time where ID = $UserLiveID";
        $result = $conn->query($query);
        echo "".$Coundown."";
    }
    else
    {
        echo "fail";
    }
?>