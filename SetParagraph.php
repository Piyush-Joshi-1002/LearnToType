<?php
    include"Connection.php"
?>
<?php
    $UserLiveID = $_SESSION['UserLiveID'];
    $query = "SELECT * FROM `total_current_user` where ID = $UserLiveID";
    $result = $conn->query($query);
    if(mysqli_num_rows($result)>0)
    {
        $row = $result->fetch_assoc();
        $selectParaNo = $row['Paragraph_ID'];
        $query = "SELECT * FROM `racetable` where S_NO = $selectParaNo";
        $result = $conn->query($query);
        if(mysqli_num_rows($result)>0)
        {
            $row = $result->fetch_assoc();
            $paragraph= $row["Paragraph"];
            echo"$paragraph";
        }
        else
        {
            echo"fail";
        }
    }
    else
    {
        echo"fail";
    }
?>