<?php
    session_start();
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
    <link href="assets/css/Certificate.css" rel="stylesheet">
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
            var Name =  localStorage.getItem("UserName");
            var time =  parseInt(localStorage.getItem("Time"));
            var speed = localStorage.getItem("speed");
            var accuracy = localStorage.getItem("accuracy");
            var Paragraph = localStorage.getItem("Paragraph");
            document.getElementById('Name').innerHTML = Name;
            document.getElementById("Name2").innerHTML = Name;
            document.getElementById('paragraph').innerHTML = Paragraph;
            document.getElementById("speed").innerHTML = speed;
            document.getElementById('accuracy').innerHTML = accuracy;
            document.getElementById("second").innerHTML = time%100;
            time = parseInt(time/100);
            document.getElementById("minute").innerHTML = time;
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
                <div id="Certification">
                    <div id="Name">Woulf Gupta</div>
                    <div id="UserProgress">
                         <p>
                              <span id="Name2">Woulf Gupta</span> has Sucessfully Complete the Computer Based Online Typing Test with The following results 
                        </p>
                        <table>
                           <tr>
                                <td>
                                     <span class="heading">Paragraph</span>   
                                </td>
                                <td>
                                     <span class="details" id="paragraph"> Aladdin and the wonderfull lamp</span><br>
                                </td>
                           </tr>
                           <tr>
                                <td>
                                     <span class="heading">Speed</span>
                                </td>
                                <td>
                                     <span class="details" id="speed">20</span>wpm<br>
                                </td>
                           </tr>
                           <tr>
                                <td>
                                     <span class="heading">Accuracy</span>   
                                </td>
                                <td>
                                     <span class="details" id="accuracy">92</span>%<br>
                                </td>
                           </tr>
                          <tr>
                                <td>
                                     <span class="heading">Time Use</span>   
                                </td>
                                <td>
                                     <span class="details"><span id="minute">01</span>:<span id="second">00</span></span><br>
                                </td>
                           </tr>
                        </table>
                    </div>
                </div>
                <div id="DownloadResult" class="button">
                    Download Result
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
