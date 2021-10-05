<?php
    include "Connection.php";
?>

    
    <?php
        $value = $_POST['value'];

        $result = $conn->query("select * from `paragraphstore` where S_NO = ".$value."");
        if($result)
        {
            if($row = $result->fetch_assoc())
            {
                echo"{'paragraph' : [{
                        'Heading':\"".$row['Heading']."\",
                        'writername' : \"".$row['WriterName']."\",
                        'content': \"".$row['Paragraph']."\"
                    }]}";
            }
            else
            {
                echo"NotDone";
            }
        }
        else
        {
            echo"NotDone";
        }
    ?>
    