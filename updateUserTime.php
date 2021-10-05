<?php include "Connection.php";?>
<?php
    if($_SESSION['UserLiveID'] == "")
    {
        header:"Race.php";
    }
    $UserLiveID = $_SESSION["UserLiveID"];
    /* fetching Cookies ____ Too Boaring*/

    $TotalWords = $_COOKIE["TotalWords"];
    $Speed = $_COOKIE["Speed"];
    $Accuracy = $_COOKIE["Accuracy"];
    $Minute = $_COOKIE["Minute"];
    $Second = $_COOKIE["Second"];
    $IncorrectWords = $_COOKIE["IncorrectWords"];

    /* fetching Cookies ____ Too Boaring*/
    
    $UserLiveTime = time()+5;
    $CurrentTime = time();
    
    $query = "select * from  `total_current_user` where ID = $UserLiveID ";
    $result = $conn->query($query);
    if(mysqli_num_rows($result)>0)
    {
        $row = $result->fetch_assoc();
        $UserConnected = explode(",",$row['Users']);
        
        $query = "update `total_current_user` set Speed = $Speed, Accuracy = $Accuracy , Minute = $Minute , Second = $Second,  IsLive = $UserLiveTime, TotalWordWrittern = $TotalWords ,TotalIncorrectWords = $IncorrectWords where ID = 
        $UserLiveID";
        $i = 0;
        $result = $conn->query($query);
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
                echo"{ \"ID\":\"$str\",\"Name\":\"$Name\",\"Speed\":\"$Speed\",\"Accyracy\":\"$Accuracy\",\"TotalWords\":\"$TotalWords\",\"IncorrectWords\":\"$IncorrectWords\"}";
                if($str!=$last_key)
                {
                    echo ",";
                }
            }
                
        }
        echo"],\"UserCount\":$i";
        echo"}";
        /*Code for deletion */
        $query = "select * from `total_current_user` where IsLive < $CurrentTime ;";

        $result = $conn->query($query);
        if(mysqli_num_rows($result)>0)
        {
            while($row = $result->fetch_assoc())
            {
                $DeleteID = $row["ID"];
                $UsersConnected = explode(",",$row["Users"]);
                $UsersRemaining = "";
                $i = 0;
                foreach($UsersConnected as $str)
                {
                    if($str == $row["ID"])
                    {
                       array_splice($UsersConnected,$i,1);
                       break;
                    }
                    $i++;
                }
                $LastID = end($UsersConnected);
                foreach($UsersConnected as $str)
                {
                    $UsersRemaining .= "".$str."";
                    if($str!=$LastID)
                    {
                        $UsersRemaining .= ",";
                    }
                }
                foreach($UsersConnected as $str)
                {
                      $query = "UPDATE `total_current_user` SET `Users`= $UsersRemaining WHERE ID = $str;";
                    $reuslt = $conn->query($query);
                }
                $query = "delete from `total_current_user` WHERE ID = $DeleteID;";
                $reuslt = $conn->query($query);
            }
        }
        
        /*End Code for deletion*/
        
        
    }
    else
    {
        $UserLiveID = time()+10;
        $query = "INSERT INTO `total_current_user`(`IsLive`, `Is_free`) VALUES ($UserLiveID,false);";
        $result = $conn->query($query);
        if($result)
        {
            $_SESSION['UserLiveID'] = $conn->insert_id; 
            $query = "delete from `total_current_user` where IsLive < $CurrentTime";
            $result = $conn->query($query);
            if($result)
            {
                echo"UserIdUpdate";
            }
            else
            {
                echo"UserIdUpdate";
            }
        }
        else
        {
            echo"Fail";
        }
    }
?>