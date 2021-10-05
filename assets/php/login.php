<script type="text/javascript">
      var x = document.getElementById('signin');
      var y = document.getElementById('signup');
      var z = document.getElementById('btn');
     
      function signup() {
        x.style.left = "-400px";
        y.style.left = "50px";
        z.style.left = "110px";
      }
      function signin() {
        x.style.left = "50px";
        y.style.left = "450px";
        z.style.left = "0px";
      }
      function HideSignIn()
      {
         document.getElementById('SignUpDiv').style.display = 'none';
      }
      function ShowSignIn()
      {
          document.getElementById('SignUpDiv').style.display = 'flex';
      }
     function RedirectToCourse()
     {
         $.ajax({
            url: "ChqSignIn.php", success: function(result){
                if(result == "SignInFail")
                {
                    console.log(result);
                    ShowSignIn();
                }
                else
                {
                    console.log(result);
                    location.href = "courses.php";
                }
            }
         })
     }
     function RedirectToSignUp()
     {
        var UserName = document.getElementById("SignUpName").value;
        var UserEmail = document.getElementById("SignUpEmail").value;
        var UserPassword = document.getElementById("SignUpPass").value;
        if(UserName == '')
        {
            document.getElementById("AlertBox").innerHTML = "Please Fill up the UserName";
        }
        else if(UserEmail == '')
        {
            document.getElementById("AlertBox").innerHTML = "Please Fill up the User Email";
        }
        else if(UserPassword == '')
        {
            document.getElementById("AlertBox").innerHTML = "Please Fill up the Password field";
        }
        else
        {
            createCookie("UserName",UserName,2);
            createCookie("UserEmail",UserEmail,2);
            createCookie("UserPass",UserPassword,2);

            $.ajax({
                url: "SignUp.php",
                success: function(result){
                    if(result == "SignUpFail")
                    {
                        alert("Duplicate Email are not allowed ");
                    }
                    else
                    {
                        document.getElementById("SignIN").style.display = "none";
                        var DisplayName = document.getElementById("UserName");
                        DisplayName.innerHTML ="<div>"+ UserName+"<img src='assets/image/logout.png'  id='signout' onclick='Signout()' ></div>";
                        DisplayName.style.display = "block";
                        console.log("This is done"+result);
                        HideSignIn();
                        console.log("ID is <?php if(isset($_SESSION['UserID'])) echo "".$_SESSION['UserID'].""; ?>");
                    }
                }
            });
        }
    }
    function RedirectToSingnOut()
    {
        
    }
    function RedirectToSignIn()
    {
        var UserEmail = document.getElementById("SignInEmail").value;
        var UserPassword = document.getElementById("SignInPass").value;
        if(UserEmail == '')
        {
            document.getElementById("AlertBox").innerHTML = "Please Fill up the User Email";
        }
        else if(UserPassword == '')
        {
            document.getElementById("AlertBox").innerHTML = "Please Fill up the Password field";
        }
        else
        {
            createCookie("UserEmail",UserEmail,2);
            createCookie("UserPass",UserPassword,2);

            $.ajax({
                url: "SignIn.php", success: function(result){
                    if(result == "SignInFail")
                    {
                        alert("Login Details are Incorrect");
                        document.getElementById("AlertBox").innerHTML = "Incorrect Login details";
                        console.log(result);
                    }
                    else
                    {
                        document.getElementById("SignIN").style.display = "none";
                        var DisplayName = document.getElementById("UserName");
                        DisplayName.innerHTML = "<div>"+result +"<img src='assets/image/logout.png' id='signout' onclick='Signout()'></div>";
                        DisplayName.style.display = "block";
                        console.log("This is done"+result);
                        HideSignIn();
                    }
                }
            });
        }
    }
    function Signout()
    {
        
        $.ajax({
            url:"logout.php",
            success: function(result){
                
                /*document.getElementById("UserName").innerHTML = "";
                document.getElementById("UserName").style.display = "none";
                document.getElementById("SignIN").style.display = 'block';*/
                
                location.href = "index.php";
                
                
            }
        })
        
    }
    function createCookie(cookieName,cookieValue,Minute)
    {
          var date = new Date();
          date.setTime(date.getTime()+(Minute*60*1000));
          document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
    }
    var defaultID = "body";
    var defaultMainBodyId = "MainBodySection";
    function changeTheme(value)
    {
        document.getElementById(defaultID).id = "body"+value;
        defaultID = "body"+value;
        document.getElementById(defaultMainBodyId).id = value;
        defaultMainBodyId = value;
    }
</script>