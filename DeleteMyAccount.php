<?php include "Connection.php";?>
<?php
        $UserID = $_SESSION['UserLiveID'];
        $query = "select * from `total_current_user` where Id = $UserID ;";
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
                $query = "delete from `total_current_user` WHERE ID = ".$row["ID"].";";
                $reuslt = $conn->query($query);            
                echo"pass";
            }
            
        }
        else
        {
            echo"fail";
        }
?>