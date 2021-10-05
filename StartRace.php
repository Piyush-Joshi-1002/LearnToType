<?php
    include "Connection.php";
    if($_SESSION['UserLiveID'] == "")
    {
         header("location:Race.php");
    }
    $UserLiveID = $_SESSION['UserLiveID'];

    $query = "select * from `total_current_user` where ID = $UserLiveID ";
    $result = $conn->query($query);
    if($row = $result->fetch_assoc())
    {
        $UserConnected = explode(",",$row['Users']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>html</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="assets/css/coursesStyle.css" rel="stylesheet">
    <link href="assets/css/main.css" rel=stylesheet>
    <link href="assets/css/login.css" rel="stylesheet">
    <link href="assets/css/Forrace.css" rel="stylesheet">
    <script src="assets/js/jquery-3.6.0.slim.min.js"></script>
    <script type="text/javascript" src="RaceControl.js"></script>
    <link href="assets/css/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet" >
    <link href="assets/css/Forrace.css" rel="stylesheet">
</head>
   <body class="body" id="body">
   <!--section for main body to set middle " Use main.css for style"-->
    <secton id="MainBodySection" >
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <?php include "header.php"?>
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <section id="MiddleBody">
            <div id="MainBox">    
                <div id="CoundownDiv">
                    Race Start in <span id="Coundown">10</span> Seconds.
                </div>
                <div id="RaceBox">
                    <div id="time">Time Remaining :  <span id="minute">03</span>:<span id="second">00</span></div>
                    <div class="forMaintainAlignment">    
                            <div class="racer" id="racer">
                                <div class="performace" id="User<?php echo $UserLiveID?>">
                                    <p class="Name" id="Name<?php echo $UserLiveID?>">(could be you)</p>
                                    <img src="cars/<?php echo rand(1,5)?>.png" width>
                                </div>
                            </div>
                            <div class="speed" id="Speed<?php echo $UserLiveID?>" ><span id="speed<?php echo $UserLiveID?>"><?php echo"".$row["Speed"]."" ?></span> Wpm</div>
                     </div>
                 <?php
                        $i=6;
                        foreach($UserConnected as $str)
                        {
                            if($str!='' && $str!="$UserLiveID")
                            {

                                $query = "select * from `total_current_user` where ID = $str ";
                                $result = $conn->query($query);
                                $row = $result->fetch_assoc();
                ?>  
                    <div class="forMaintainAlignment">    
                            <div class="racer" id="racer">
                                <div class="performace" id="User<?php echo $str?>">
                                    <p class="Name" id="Name<?php echo $str?>"><?php echo"".$row["Name"].""; ?></p>
                                    <img src="cars/<?php echo rand($i,$i+4)?>.png" width>
                                </div>
                            </div>
                            <div class="speed" id="Speed<?php echo $str?>" ><span id="speed<?php echo $str?>"><?php echo"".$row["Speed"]."" ?></span> Wpm</div>
                     </div>
                <?php
                        $i +=5;
                        }
                    }
                }
                ?>
                </div>
                <div id="Paragraph">

                </div>
                <div>
                    <input type="text" id='InputBox' maxlength="100" onkeypress="changeTextValue(event)" onkeydown="chqSpecialCase(event)" autocomplete="off">
                </div>
                <div class="UserChoice">
                    <div class="button" id="Leave">
                        I want to Leave
                    </div>
                    <div class="button" onclick="StartNewRace()" id="one_more">
                        RACE AGAIN 
                    </div>
                </div>
            </div>
        </section>
            
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