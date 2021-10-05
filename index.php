<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Speed typing online</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    
    <link href="assets/css/main.css" rel=stylesheet>
   <link rel="stylesheet" href="assets/css/login.css">
    <link href="assets/css/keyboardStyle.css" rel=stylesheet>
    
    <link href="assets/css/fontawesome-free-5.15.2-web/fontawesome-free-5.15.2-web/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/Control.js"></script>
   
</head>
<body class="body" id="body">
   <!--section for main body to set middle " Use main.css for style"-->
    <secton id="MainBodySection" >
        <!--header div including Nav Bar ~~Use main.css for style~~ -->
        <?php include "header.php"?>
        <section id="MiddleBody">
            <div id="TypingArea">
                <span id="Heading"><h3>Test your speed now / Challenge your friends</h3></span>
                <div id="TestHeader">
                  <div id="UserEfforts">
                       <div>Time
                           <div id="RemainTime" class="Data">01:00</div>
                       </div>
                       <div>
                           Speed
                           <div id="CurrentSpeed" class="Data">0 wpm</div>
                       </div>
                       <div>
                          Accuracy
                           <div id="Accuracy" class="Data">100%</div>
                        </div>
                    </div>
                    <div id="TestArea" tabindex="0" onclick="readyToType()" onkeypress="ChqValueCorrection(event)" onkeydown="NotDetectByKeyPress(event)">
                        <div id='lineNo1' class='Lines'>
                            <span id='LetterNo0' class='LetterToType'>T</span>
                        </div>
                        <div id='lineNo2' class='Lines'></div>

                        <div id='lineNo3' class='Lines'></div>
 
                        <div id='lineNo4' class='Lines'></div>

                        <div id='lineNo5' class='Lines'></div>
                    </div>
                    <div id = "reset" onclick="AudioFirst()">
                       <button onclick="Reset()"> Reset</button>
                    </div>
                    <div id="testResult">
                        <div class="testResult">
                            <div>
                                TestResult
                            </div>
                            <div class="content">
                                Speed : <span id="speed" class="Special"></span><br>
                                Accuracy : <span id="accuracy" class="Special"></span>
                            </div>
                            <div class="content">
                                Total Words : <span id="TotalWords" class="genral"></span><br>
                                Total Correct Words : <span id="CorrectWords" class="genral"></span><br>
                                Total Incorrect Words : <span id="InCorrectWords" class="genral"></span><br>
                                Rough Speed : <span id="RoughSpeed" class="genral"></span><br>
                                Net Speed : <span id="NetSpeed" class="genral"></span><br>
                                Common Mistakes Letters:<span id="CommonMistakes" class="genral"></span>
                            </div>
                            <div class="button" onclick="RedirectToCertification()">
                                View Certificate
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="fingurHelp">
                <div id="imageDivLeft">
                    <img id='LeftFingerImage' src="assets/image/fingerImage/Left.png" width="100%" height="100%">
                </div>
                <!--Just a little Keyboard Stuff don't mind it-->
                <div id="virtualKeyboard">
                    <div id="keyboard" class="keyboard">

                                  <div class="key num dual" id='keyS1' >
                                    ~<br>`
                                  </div>
                                  <div class="key num dual" id='key1'>
                                    !<br>1
                                  </div>
                                  <div class="key num dual" id='key2'>
                                    @<br>2
                                  </div>
                                  <div class="key num dual" id='key3'>
                                    #<br>3
                                  </div>
                                  <div class="key num dual" id='key4'>
                                    $<br>4
                                  </div>
                                  <div class="key num dual" id='key5'>
                                    %<br>5
                                  </div>
                                  <div class="key num dual" id='key6'>
                                    ^<br>6
                                  </div>
                                  <div class="key num dual" id='key7'>
                                    &<br>7
                                  </div>
                                  <div class="key num dual" id='key8'>
                                    *<br>8
                                  </div>
                                  <div class="key num dual" id='key9'>
                                    (<br>9
                                  </div>
                                  <div class="key num dual" id='key0'>
                                    )<br>0
                                  </div>
                                  <div class="key num dual" id='keyS2'>
                                    _<br>-
                                  </div>
                                  <div class="key num dual" id='keyS3'>
                                    +<br>=
                                  </div>
                                  <div class="key backspace" >
                                      Backspace
                                  </div>
                                    <br>
                                  <div class="key tab" >
                                    Tab
                                  </div>

                                  <div class="key letter" id='keyQ'>
                                    Q
                                  </div>
                                    <div class="key letter" id='keyW'>
                                    W
                                  </div>
                                    <div class="key letter" id='keyE'>
                                    E
                                  </div>
                                    <div class="key letter" id='keyR'>
                                    R
                                  </div>
                                    <div class="key letter" id='keyT'>
                                    T
                                  </div>
                                    <div class="key letter" id='keyY'>
                                    Y
                                  </div>
                                    <div class="key letter" id='keyU'>
                                    U
                                  </div>
                                    <div class="key letter" id='keyI'>
                                    I
                                  </div>
                                    <div class="key letter" id='keyO'>
                                    O
                                  </div>
                                    <div class="key letter" id='keyP'>
                                    P
                                  </div>
                                    <div class="key dual" id='keyS4'>
                                    {<Br>[
                                  </div>
                                    <div class="key dual" id='keyS5'>
                                    }<br>]
                                  </div>
                                    <div class="key letter dual slash" id='keyS6'>
                                    |<br>\
                                  </div><br>
                                  <div class="key caps" >
                                    Caps<br>Lock
                                    </div>
                                  <div class="key letter" id='keyA'>
                                    A
                                  </div>
                                    <div class="key letter" id='keyS'>
                                    S
                                  </div>
                                    <div class="key letter" id='keyD'>
                                    D
                                  </div>
                                    <div class="key letter" id='keyF'>
                                    F
                                  </div>
                                    <div class="key letter" id='keyG'>
                                    G
                                  </div>
                                    <div class="key letter" id='keyH'>
                                    H
                                  </div>
                                    <div class="key letter" id='keyJ'>
                                    J
                                  </div>
                                    <div class="key letter" id='keyK'>
                                    K
                                  </div>
                                    <div class="key letter" id='keyL'>
                                    L
                                  </div>
                                    <div class="key dual" id='keyS7'>
                                    :<br>;
                                  </div>
                                    <div class="key dual" id='keyS8'>
                                    "<br>'
                                  </div>
                                    <div class="key enter" >
                                    Enter
                                  </div>
                                    <br>
                                  <div class="key shift left" id='keyShift1'>
                                    Shift
                                  </div>
                                  <div class="key letter" id='keyZ'>
                                    Z
                                  </div>  
                                    <div class="key letter" id='keyX'>
                                    X
                                  </div>
                                    <div class="key letter" id='keyC'>
                                    C
                                  </div>
                                    <div class="key letter" id='keyV'>
                                    V
                                  </div><div class="key letter" id='keyB'>
                                    B
                                  </div><div class="key letter" id='keyN'>
                                    N
                                  </div><div class="key letter" id='keyM'>
                                    M
                                  </div>
                                    <div class="key dual" id='keyS9'>
                                    < <br>,
                                  </div>
                                    <div class="key dual" id='keyS10'>
                                    ><br>.
                                  </div>
                                    <div class="key dual" id='keyS11'>
                                    ?<br>/
                                  </div>
                                    <div class="key shift right" id='keyShift2'>
                                    Shift
                                  </div><br>
                                  <div class="key ctrl" >
                                    Ctrl
                                  </div>
                                    <div class="key" >
                                    &hearts;
                                  </div>
                                    <div class="key" >
                                    Alt
                                  </div>
                                    <div class="key space" id="keySpace" >

                                    </div>
                                    <div class="key">
                                    Alt
                                  </div>
                                    <div class="key">
                                    &hearts;
                                  </div>
                                    <div class="key">
                                    Prnt
                                  </div>
                                    <div class="key ctrl">
                                    Ctrl
                                  </div>
                      </div>

                </div>
                <!--End of Keyboard Stuff thanks to be pationt -->

                <div id="imageDivRight">
                    <img id='RightFingerImage' src="assets/image/fingerImage/Right.png" width="100%" height="100%">
                </div>
            </div>
            <div id="ControlsAndDetails">
                <div id="ForAlignCenter">
                    <div id="ParagraphDetails">
                        <div id="ParagraphName">Origin of "The Jungle Book" </div>
                        <div id="WriterName">From Wikipedia</div>
                        <hr>
                    </div>
                    <div id="TypingControls">
                        <div>
                            <select id="Time" onclick="Reset()">
                                <option value="0030">30 seconds</option>
                                <option value="0100" selected>01 minute</option>
                                <option value="0200">02 minutes</option>
                                <option value="0300">03 minutes</option>
                                <option value="0400">04 minutes</option>
                                <option value="0500">05 minutes</option>
                                <option value="1000">10 minutes</option>
                                <option value="1500">15 minutes</option>
                                <option value="3000">30 minutes</option>
                            </select>
                        </div>
                        <div>
                            <select id="SelectParagraph" onclick="Reset()">
                                <?php
                                    include "ParagraphOptions.php";
                                ?>
                            </select>
                        </div>
                        <div id="FingerChqBox">
                            <input type="checkbox" value="FingerHelp" onchange = "FingerHelpChange()" ><span>Use Keyboard To Improve Your Speed</span>           
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
                   <h4>Sign up</h4>
                   <h4>Dashboard</h4>
                   <h4>Update</h4>
               </div>
               <div class="footerDetails">
                   <span><h3>Get Started</h3></span>
                   <h4>Company Information</h4>
                   <h4>Contact Us</h4>
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
