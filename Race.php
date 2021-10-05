<?php
    include "Connection.php"; 
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
    <link href="assets/css/Forrace.css" rel="stylesheet">
    <link href="assets/css/Progress.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       function Setrace()
        {
            var UserName = document.getElementById("Name").value;
            if(UserName == "")
            {
                UserName = "Guest";
            }
            createCookie("UserName",UserName,20);
            localStorage.setItem("UserName",UserName);
            $.ajax({
                url: "Setparticipants.php",
                success:function(result)
                {
                    alert(result);
                    if(result == "Pass")
                    {
                       
                        location.href = "StartRace.php";
                    }
                }
            });
        }
        function createCookie(cookieName,cookieValue,Hour)
        {
              var date = new Date();
              date.setTime(date.getTime()+(Hour*60*60*1000));
              document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
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
            <div id="EnterRace">
       
               <h1 style="color:rgba(30,40,50,1); position:absolute; top:10%; font-size:3vw">Play with online #LIVE opponents</h1><br>
                <form action="" method="post">
                    <input type="button" onclick="document.getElementById('SetNameFlexBox').style.display = 'flex'" name="submit" value="Click to Enter Race">
                </form>

            </div>
            <div id = "SetNameFlexBox">
                   <div Id="Close"  onclick="document.getElementById('SetNameFlexBox').style.display = 'none'">X</div>
                    <div id="SetName">
                        <input type="text" id="Name" max="10" placeholder="Set The coolest name (ofcourse For race Guys)" >
                        <button onclick ="Setrace()">Finaly Start</button>
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
