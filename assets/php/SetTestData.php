<?php
    include"Connection.php"
?>

<?php
    $Netspeed = $_COOKIE['speed'];
    $GrossSpeed = $_COOKIE['GrossSpeed'];
    $accuracy = $_COOKIE['accuracy'];
    if($_SESSION['UserID'])
    {
        $userId = $_SESSION['UserID'];
        $query = "select Average_Net_Speed,Average_Gross_Speed,Average_Accuracy,`Total_tests` from `userstatus` where UserID = $userId ;";
        $result = $conn->query($query);
        if($result)
        {
            if($row = $result->fetch_assoc())
            {
                $AverageNetSpeed;
                $AverageGrossSpeed;
                $AverageAccuracy;
                $TotalTests = $row['Total_tests']+1;
                if($row['Total_tests'] != 0)
                {
                    $AverageNetSpeed = $row['Average_Net_Speed']*$row['Total_tests'];
                    $AverageNetSpeed = ($AverageNetSpeed+$Netspeed)/$TotalTests;
                    
                    $AverageGrossSpeed = $row['Average_Gross_Speed']*$row['Total_tests'];
                    $AverageGrossSpeed = ($AverageGrossSpeed+$GrossSpeed)/$TotalTests;
                    
                    $AverageAccuracy = $row['Average_Accuracy']*$row['Total_tests'];
                    $AverageAccuracy = ($AverageAccuracy+$accuracy)/$TotalTests;
                }
                else
                {
                    $AverageNetSpeed = $Netspeed;
                    $AverageGrossSpeed = $GrossSpeed;
                    $AverageAccuracy = $accuracy;
                }
                $query = "update `userstatus` set Average_Net_Speed = $AverageNetSpeed , Average_Gross_Speed = $AverageGrossSpeed , Average_Accuracy = $AverageAccuracy , `Total_tests` = $TotalTests where UserID = $userId ";
                $result = $conn->query($query);
                if($result)
                {
                    echo"Save Data SuccessFully";
                }
                else
                {
                    echo"Updation Fail";
                }
            }
            else
            {
                echo"Insertion Fail";
            }
        }
        else
        {
            echo"rowError";
        }
    }
    else
    {
        echo "userIDError" .$_SESSION['UserID']." ".$_SESSION['UserName']."";
    }
?>