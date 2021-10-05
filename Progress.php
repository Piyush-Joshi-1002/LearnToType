<?php
    include"assets/php/Connection.php";
    if(isset($_SESSION['UserID']))
    {
        if($_SESSION['UserID'] == '')
        {
            header("location:index.php");
        }
    }
    else
    {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Speed typing online</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="assets/css/coursesStyle.css" rel="stylesheet">
    <link href="assets/css/main.css" rel=stylesheet>
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet" >
    <link href="assets/css/Progress.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var active = [1,0,0,0];
        window.onload = function()
        {
            $.ajax({
                url: "ChqSignIn.php", success: function(result){
                    if(result != "SignInFail")
                    {
                        console.log(result);
                        document.getElementById("SignIN").style.display = "none";
                        var DisplayName = document.getElementById("UserName");
                        DisplayName.innerHTML = "<div>"+result+"<img src='assets/image/logout.png' id='signout' onclick='Signout()'></div>";
                        DisplayName.style.display = "block";

                    }else
                    {
                        console.log(result);
                    }
                }
             });
        }
    </script>
</head>
<body class="body" id="body">
   <!--section for main body to set middle " Use main.css for style"-->
    <secton id="MainBodySection" >
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <?php include "header.php"?>
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <section id="MiddleBody">
            <div id="CenterDiv">
               <?php
                    $UserID = $_SESSION["UserID"];
                    $query = "Select * from `userstatus` where `UserID` = $UserID";
                    $Result = $conn->query($query);
                    if($Result)
                    {
                        if($row = $Result->fetch_assoc())
                        {
                            $CourseComplition = explode(',',$row["courseID"]);
                            $CourseSpeed = explode(',',$row["SpeedInCourse"]);
                            $CourseAccuracy = explode(',',$row["AccuracyInCourse"]);
                ?>
                <div id="Progrss Report">
                    <div id="Average">
                       
                        <div>
                            Total tests : <span><?php echo($row["Total_tests"])?></span>
                        </div>
                        <div>
                            Average Net Speed : <span><?php echo($row["Average_Net_Speed"])?></span>
                        </div>
                        <div>
                            Average Gross Speed : <span><?php echo($row["Average_Gross_Speed"])?></span>
                        </div>
                        <div>
                            Average Accuracy : <span><?php echo($row["Average_Accuracy"])?></span>
                        </div>
                    </div>
                    
                    <div id="Courses">
                       <table border="2px">
                           <tr>
                               <th>Courses</th>
                               <th>Best Speed</th>                               
                               <th>Best Accuracy</th>   
                           </tr>
                           <?php
                            $i = 0;
                            foreach($CourseComplition as $crs)
                            {
                           ?>
                           <tr>
                                <th>Lesson_<?php echo "$crs"?></th>
                                <th><?php echo "$CourseSpeed[$i]"?></th>
                                <th><?php echo "$CourseAccuracy[$i]"?></th>
                           </tr>
                           <?php
                                $i++;
                            }
                           ?>
                       </table>                        
                    </div>
                </div>
            </div>
        </section>
        <?php
                }
            }
        ?>
        <!--section start for footer ~~Use main.css for style~~ -->
        <section id="footerSection">
           <div id="footer">
               <div class="footerDetails">
                   <span><h3>Get Started</h3></span>
                   <h4>Home</h4>
                   <h4>SignUp</h4>
                   <h4>Deshboard</h4>
                   <h4>Update</h4>
               </div>
               <div class="footerDetails">
                   <span><h3>Get Started</h3></span>
                   <h4>Company Information</h4>
                   <h4>Contect_Us</h4>
                   <h4>Reviews</h4>
                   <h4>Status</h4>
               </div>
               <div class="footerDetails">
                   <span><h3>Support</h3></span>
                   <h4>FAQ</h4>
                   <h4>Help Desk</h4>
               </div>
               <div class="footerDetails">
                   <span><h3>Follow Us</h3></span>
                   <h4>
                      <i class="fab fa-facebook fa-fw"></i>
                      <i class="fab fa-whatsapp fa-fw"></i>
                      <i class="fab fa-instagram fa-fw"></i>
                      <i class="fab fa-twitter fa-fw"></i>
                   </h4>
                   <span>
                       <input type="text"  placeholder="Enter Your Messaage"><br>
                       <input type="button" value="Mail Now">
                   </span>
               </div>
            </div>
        </section>
        <!--section start for footer ~~Use main.css for style~~ -->
    </secton>
</body>

<?php include"assets/php/login.php"?>
</html>
