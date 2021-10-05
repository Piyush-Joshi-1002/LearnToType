<section id="SectionForHeader">
            <div Id="header">
                <div id="Logo" class="Options">Logo Here</div>
                <div id="Options">
                    <ul>
                        <li class="Options" onclick="location.href= 'index.php'">Home</li>
                        <li class="Options" onclick="location.href= 'progress.php'">Progress</li>
                        <li class="Options" onclick="RedirectToCourse()">Courses</li>
                        <li class="Options" onclick="location.href = 'Race.php'">Race</li>
                        <li class="Options">About Us</li>
                        <li class="Options">Contact</li>
                        <li class="Options">Themes &nbsp;<i class="fas fa-angle-down"></i>
                            <ul class="drop-menu">
                                <li onclick="changeTheme('Theme1')">Theme1</li>
                                <li onclick="changeTheme('Theme2')">Theme2</li>
                                <li onclick="changeTheme('Theme3')">Theme3</li>
                                <li onclick="changeTheme('Theme4')">Theme4</li>
                                <li onclick="changeTheme('Theme5')">Theme5</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                  <div id="SignIN"  class="Options" onclick="ShowSignIn()">Sign up/Sign in</div>
                  <div id="UserName"  class="Options">Honey Singh</div>
            </div>
        </section>
        <script>
            function RedirectToProgress()
            {
                
            }
        </script>
        <section >
          <div id="SignUpDiv">
            <div id="cancle" onclick="HideSignIn()">X</div>
                  <div class="login_form" >
                    <div class="button_box"> 
                      <div id="btn"></div>
                      <button type="button" class="toggle_button" onclick="signin()">Sign in</button>
                      <button type="button" class="toggle_button" onclick="signup()">Sign up</button>
                    </div>
                    <form id="signin" class="get_input">
                      <input type="text" id="SignInEmail" class="input_field" placeholder="Email Id/User Id"
                      required="">
                      <input type="text" id="SignInPass" class="input_field" placeholder="Enter Password"
                      required="">
                      <input type="checkbox" class="check_box"><span>Remember Password</span>
                      <button type="button" onclick="RedirectToSignIn()"class="submit_button">Sign in</button>
                    </form>
                    
                    
                    <form id="signup" action="SignUp.php" class="get_input">
                      <input type="text" id="SignUpName" name="UserName" class="input_field" placeholder="User Name"
                      required="">
                      <input type="email" id="SignUpEmail" name="UserEmail" class="input_field" placeholder="Email Id"
                      required="">
                      <input type="text" id="SignUpPass" name="UserPassword" class="input_field" placeholder="Enter Password"
                      required="">
                      <input type="checkbox" class="check_box"><span>I agree to the terms and conditions</span>
                      <button type="button" onclick="RedirectToSignUp()" class="submit_button">Sign up</button>
                    </form>
                    
                      <span style="color:red; font-weight:800;font-size:16px; text-align:center;width:100%;" id="AlertBox"></span>
                  </div>
          </div>
        </section>