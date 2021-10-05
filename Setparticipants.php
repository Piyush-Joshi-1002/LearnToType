<?php include "Connection.php";?>
<?php
        $UserLiveID = time()+5;
        $UserName = $_COOKIE["UserName"];
        $query = "INSERT INTO `total_current_user`(`IsLive`, `Is_free`,`Name`,Coundown) VALUES ($UserLiveID,true,'$UserName',10)";
        $result = $conn->query($query);
        $result = 1;
        if($result)
        {
            $UserID = $conn->insert_id;
            $TIME = time();
            $_SESSION['UserLiveID'] = $UserID;
            
        /*Code for deletion */
            $query = "select * from `total_current_user` where IsLive < $TIME ;";
            
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
        
            
            $hostID;
            $Users;
            $hostPara;
            $flag = 0;
            $hostUserConnectCount;
            $query = "select * from `total_current_user` where UserConnectCount < 3 and ID != $UserID and Coundown > 0;";
            $result = $conn->query($query);
            if(mysqli_num_rows($result)>0)
            {
                while($row = $result->fetch_assoc())
                {
                    if($row["Is_free"])
                    {
                        $hostID = $row["ID"];
                        $hostPara = $row["Paragraph_ID"];
                        $hostUserConnectCount = $row["UserConnectCount"];
                        $Users = $row["Users"];
                        $hostUserConnectCount +=1;
                        $flag = 1;
                        break;
                    }
                }
                if($flag)
                {
                    
                    $query = "update `total_current_user` set Users = '$Users,$UserID', UserConnectCount = $hostUserConnectCount , Is_Host = true where ID = $hostID;";
                    $result = $conn->query($query);
                    if($result)
                    {
                        $query ="select * from `total_current_user` where ID = $hostID;";
                        $result = $conn->query($query);
                        $row = $result->fetch_assoc();
                        if($row["UserConnectCount"] == 3)
                        {
                            $query = "update `total_current_user` set Is_free = false";
                        } 
                    }
                    $query = "update `total_current_user` set Users = '$Users,$UserID', UserConnectCount = $hostUserConnectCount , Is_Host = false ,Paragraph_ID = $hostPara,hostID = $hostID where ID = $UserID";
                    $result = $conn->query($query);
                    $query = "update `total_current_user` set Users = '$Users,$UserID', UserConnectCount = $hostUserConnectCount , Is_Host = false ,Paragraph_ID = $hostPara,hostID = $hostID where hostID = $hostID";
                    $result = $conn->query($query);
                    echo"Pass";

                }
                else
                {
                    $Para = rand(1,43);
                    $query = "update `total_current_user` set UserConnectCount = 1 , Is_Host = true ,Users = '$UserID' ,Paragraph_ID = $Para ,hostID = $UserID where ID = $UserID ;";
                    $result = $conn->query($query);
                    echo"Pass";
                }
            }
            else
            {
                    $Para = rand(1,43);
                    $query = "update `total_current_user` set UserConnectCount = 1 , Is_Host = true ,Users = '$UserID' ,Paragraph_ID = $Para ,hostID = $UserID where ID = $UserID ;";
                    $result = $conn->query($query);
                    echo"Pass";
            }
        }
        else
        {
            echo"fail2";
        }
?>