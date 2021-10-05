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
        function selectedCourse(Lesson)
        {
            localStorage.setItem("Lesson",Lesson);
            location.href = "CoursePage.php";
        }
        function activeCourse(value)
        {
            for(i=1;i<=4;i++)
            {
                if(i==value)
                {
                    if(active[i-1] == 0)
                    {
                        document.getElementById("course"+i).style.display = "flex";
                        document.getElementById("arrow"+i).innerHTML = "<i class='fas fa-angle-up'></i>";
                        active[i-1] = 1;
                    }
                    else
                    {
                        document.getElementById("course"+i).style.display = "none";
                        document.getElementById("arrow"+i).innerHTML = "<i class='fas fa-angle-down'></i>";
                        active[i-1]  = 0;
                    }
                }
                else
                {
                        document.getElementById("course"+i).style.display = "none";
                        document.getElementById("arrow"+i).innerHTML = "<i class='fas fa-angle-down'></i>";
                    active[i-1]  = 0;
                }
            }
        }
        
    </script>
    <script type="text/javascript" src="assets/js/Control.js"></script>
</head>
<body class="body" id="body">
   <!--section for main body to set middle " Use main.css for style"-->
    <secton id="MainBodySection" >
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <?php include "header.php"?>
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <section id="MiddleBody">
            <div id ="Courses">
                <div class="forMiddle">
                      
                      <div class="partision">
                             <div class="Button" onclick="activeCourse(1)">
                                 <div class="image">
                                     <img src="assets/image/course/TouchTyping.png" width="100%" height="100%">
                                 </div>
                                 <div class="CourseHeading">TouchTyping</div>
                                 <div class="arrow" id="arrow1"><i class="fas fa-angle-up"></i></div>
                             </div>
                             <div class="contant" Id="course1">
                                 <div class="contentbox" onclick="selectedCourse(1)">
                                     <div class="button chack">
                                         Lesson 1
                                     </div>
                                     <div class="heading">
                                         Introduction and initial test 
                                     </div>
                                 </div>
                                 
                                 <div class="contentbox" onclick="selectedCourse(2)">
                                     <div class="button chack">
                                         Lesson 2
                                     </div>
                                     <div class="heading">
                                         The Home row
                                     </div>
                                 </div>
                                 
                                 <div class="contentbox" onclick="selectedCourse(3)">
                                     <div class="button">
                                         Lesson 3
                                     </div>
                                     <div class="heading">
                                         Letter E and I
                                     </div>
                                 </div>
                                 
                                 <div class="contentbox" onclick="selectedCourse(4)">
                                     <div class="button">
                                         Lesson 4
                                     </div>
                                     <div class="heading">
                                         Letter R and U
                                     </div>
                                 </div>
                                                                  
                                 <div class="contentbox" onclick="selectedCourse(5)">
                                     <div class="button">
                                         Lesson 5
                                     </div>
                                     <div class="heading">
                                         Letter T and O
                                     </div>
                                 </div>                            
                                 <div class="contentbox" onclick="selectedCourse(6)">
                                     <div class="button">
                                         Lesson 6
                                     </div>
                                     <div class="heading">
                                        Capital Letter and Period                                         
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(7)">
                                     <div class="button">
                                         Lesson 7
                                     </div>
                                     <div class="heading">
                                         Letter G and H, Key ' and "
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(8)">
                                     <div class="button">
                                         Lesson 8
                                     </div>
                                     <div class="heading">
                                         Letter G and H, Key ' and "
                                     </div>
                                 </div>
                                
                                 <div class="contentbox" onclick="selectedCourse(9)">
                                     <div class="button">
                                         Lesson 9
                                     </div>
                                     <div class="heading">
                                         Letter V and N and Question Mark "
                                     </div>
                                 </div>  
                                 
                                                                  
                                 <div class="contentbox" onclick="selectedCourse(10)">
                                     <div class="button">
                                         Lesson 10
                                     </div>
                                     <div class="heading">
                                         Letter W and M
                                     </div>
                                 </div>                            
                                 <div class="contentbox" onclick="selectedCourse(11)">
                                     <div class="button">
                                         Lesson 11
                                     </div>
                                     <div class="heading">
                                           Letter Q and P                                         
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(12)">
                                     <div class="button">
                                         Lesson 12
                                     </div>
                                     <div class="heading">
                                         Letter B and Y
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(13)">
                                     <div class="button">
                                         Lesson 13
                                     </div>
                                     <div class="heading">
                                         Letter Z and X
                                     </div>
                                 </div>
                                
                                 <div class="contentbox" onclick="selectedCourse(14)">
                                     <div class="button">
                                         Lesson 14
                                     </div>
                                     <div class="heading">
                                         Final Test
                                     </div>
                                 </div>    
                             </div>
                             <div class="Button" onclick="activeCourse(2)">
                                 <div class="image">
                                     <img src="assets/image/course/NumberKey.png" width="100%" height="100%">
                                 </div>
                                 <div class="CourseHeading">NumberRow</div>
                                 <div class="arrow" id="arrow2"><i class="fas fa-angle-down"></i></div>
                             </div>
                             <div class="contant" Id="course2">
                                 <div class="contentbox" onclick="selectedCourse(15)">
                                     <div class="button chack">
                                         Lesson 1
                                     </div>
                                     <div class="heading">
                                         Number 3 , 4 , 5 , 6 , 7 and 8   
                                     </div>
                                 </div>
                                 
                                 <div class="contentbox" onclick="selectedCourse(16)">
                                     <div class="button chack">
                                         Lesson 2
                                     </div>
                                     <div class="heading">
                                         Number 1 , 2 , 9 and 0
                                     </div>
                                 </div>
                             </div>
                             <div class="Button" onclick="activeCourse(3)">
                                 <div class="image">
                                     <img src="assets/image/course/Symbols.png" width="100%" height="100%">
                                 </div>
                                 <div class="CourseHeading">Symbols</div>
                                 <div class="arrow" id="arrow3"><i class="fas fa-angle-down"></i></div>
                             </div>
                             <div class="contant" Id="course3">
                                 <div class="contentbox" onclick="selectedCourse(17)">
                                     <div class="button chack">
                                         Lesson 1
                                     </div>
                                     <div class="heading">
                                         Symbol ; : / ?  
                                     </div>
                                 </div>
                                 
                                 <div class="contentbox" onclick="selectedCourse(18)">
                                     <div class="button chack">
                                         Lesson 2
                                     </div>
                                     <div class="heading">
                                         Symbol " ' + = 
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(19)">
                                     <div class="button chack">
                                         Lesson 3
                                     </div>
                                     <div class="heading">
                                         Symbol ( ) [ ] { }  @ $ % &amp; 
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(20)">
                                     <div class="button chack">
                                         Lesson 4
                                     </div>
                                     <div class="heading">
                                         Symbol \ | ! # ^ * . , 
                                     </div>
                                 </div>
                             </div>
                             <div class="Button" onclick="activeCourse(4)">
                                 <div class="image">
                                     <img src="assets/image/course/Numpad.png" width="100%" height="100%">
                                 </div>
                                 <div class="CourseHeading">Numpad</div>
                                 <div class="arrow" id="arrow4"><i class="fas fa-angle-down"></i></div>
                             </div>
                             <div class="contant" Id="course4">
                                 <div class="contentbox" onclick="selectedCourse(21)">
                                     <div class="button chack">
                                         Lesson 1
                                     </div>
                                     <div class="heading">
                                         Number's 
                                     </div>
                                 </div>
                                 
                                 <div class="contentbox" onclick="selectedCourse(22)">
                                     <div class="button chack">
                                         Lesson 2
                                     </div>
                                     <div class="heading">
                                         Mathamatical Symbols
                                     </div>
                                 </div>
                                 <div class="contentbox" onclick="selectedCourse(23)">
                                     <div class="button chack">
                                         Lesson 3
                                     </div>
                                     <div class="heading">
                                         Review 
                                     </div>
                                 </div>
                                 
                             </div>
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
