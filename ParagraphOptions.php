<?php
    include "assets/php/Connection.php";
?>
<?php
        
    $result = $conn->query("SELECT * FROM `paragraphstore`");
    if($result)
    {
        echo "<option value='random'>random</option>";
        if($result->num_rows > 0)
        {
            while($row = $result->fetch_assoc())
            {
                echo"<option value=".$row["S_NO"]." >".$row["Heading"]."</option>";
            }
        }
        echo "<option value='custom'>custom</option>";
    }
    else
    {
        echo"Connnection Failed ";
    }
?>