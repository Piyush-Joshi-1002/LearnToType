<?php include "Connection.php";?>
<?php
    $UserLiveID = $_SESSION["UserLiveID"];
    $query = "select * from  `total_current_user` where ID = $UserLiveID ";
    $result = $conn->query($query);
    if(mysqli_num_rows($result)>0)
    {
        $row = $result->fetch_assoc();
        $i = 0;
        $UserConnected = explode(",",$row['Users']);
        $last_key = end($UserConnected);
        echo"{\"User\":[ ";
        foreach($UserConnected as $str)
        {
            if($str != "" || $str != " ")
            {
                $i++;
                $query = "select * from  `total_current_user` where ID = $str";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();
                $Name = $row["Name"];
                $Speed = $row["Speed"];
                $Accuracy = $row["Accuracy"];
                $TotalWords = $row['TotalWordWrittern'];
                $IncorrectWords = $row['TotalIncorrectWords'];
                $FinishRace = $row['FinishRace'];
                $Coundown = $row['Coundown'];
                $Minute = $row['Minute'];
                $Second = $row['Second'];
                echo"{ \"ID\":\"$str\",\"Name\":\"$Name\",\"Speed\":\"$Speed\",\"Accyracy\":\"$Accuracy\",\"TotalWords\":\"$TotalWords\",\"IncorrectWords\":\"$IncorrectWords\",\"Coundown\":\"$Coundown\",\"FinishRace\":\"$FinishRace\",\"Minute\":$Minute,\"Second\":$Second}";
                if($str!=$last_key)
                {
                    echo ",";
                }
            }
                
        }
        echo"],\"UserCount\":$i ,\"UserLiveID\" :$UserLiveID ";
        echo"}";
    }
    else
    {
        echo "fail";
    }
?>