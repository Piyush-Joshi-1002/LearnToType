var para = "A paragraph is a series of related sentences developing a central idea, called the topic. Try to think about paragraphs in terms of thematic unity: a paragraph is a sentence or a group of sentences that supports one central, unified idea. Paragraphs add one idea at a time to your broader argument.";
var Currentcount = 0,wrongLetters = 0,TypingRunInMiddle=1,letterCount = 0;
var UserLiveID;
var Coundown = 10; 
var InputTextInBox ;
var chqInputBox = false;
var TotalCorrectWord = 0;
var TotalIncorectWord = 0;
var TotalWordWritten = 0;
var TimeInSec = 59; // ByDefault
var TimeInMin = 02; // ByDefault
var StartTyping = 1;
var IsWordWrong = false;
var countSeconds = 0;
var speed =0, accuracy = 0;
var totalWords = 0;
var RaceTrackWidth = 0;
var WordAndTrackRatio = 0;
var finishRace = false;
window.onload = ()=>{
   setTypingData();
}
function setTypingData()
{
    
    document.getElementById("InputBox").disabled = true;
    document.getElementById("one_more").disabled = false;
    $.ajax({
        url:"SetParagraph.php",
        success: function(result){
            a = result.trim();
            for(i =0; a[i]; i++)
            {

                RaceTrackWidth = parseInt(window.getComputedStyle(document.getElementById("racer")).width);
                document.getElementById("Paragraph").innerHTML += "<span id='letter"+i+"' class='letters'>"+a[i]+"</span>";
                if(a[i] == " ")
                {
                    totalWords++;
                }
            }
            totalWords+=3;
            WordAndTrackRatio = RaceTrackWidth/totalWords;
            $.ajax({
                url:"FatchData.php",
                success : function(result)
                {
                    if(result.trim() != "fail")
                    {
                        let Users = JSON.parse(result.trim());
                        let finishRace = 0;
                        let loopCount = Users.UserCount;
                        UserLiveID   = Users.UserLiveID;
                        while(loopCount>0)
                        {
                            loopCount--;
                            let ID = Users.User[loopCount].ID;
                            if(ID == UserLiveID)
                            {
                                TotalWordWritten = Users.User[loopCount].TotalWords;
                                TotalIncorectWord = Users.User[loopCount].IncorrectWords;
                                TotalCorrectWord = TotalWordWritten - TotalIncorectWord;
                                Coundown = Users.User[loopCount].Coundown;
                                changePositions(Users,Users.UserCount);
                                finishRace = Users.User[loopCount].FinishRace;
                                TimeInMin = Users.User[loopCount].Minute;
                                TimeInSec = Users.User[loopCount].Second;
                                countSeconds = parseInt((2-TimeInMin)*60+(59-TimeInSec));
                                
                                if(Users.User[loopCount])
                                RefreshUserPosition();
                                
                            }
                        }
                        let CoundownIntervel  = setInterval(function(){
                            if(Coundown > 0)
                            {
                                $.ajax({

                                    url : "CoundownUpdate.php",
                                    success : function(result)
                                    {
                                        if(result != "fail")
                                        {
                                            Coundown = parseInt(result);
                                            document.getElementById("Coundown").innerHTML = Coundown;
                                        }
                                        else
                                        {
                                            alert("Connection not established");
                                        }
                                    }
                                });
                            }
                            else if (finishRace == 0)
                            {
                                document.getElementById("CoundownDiv").style.display = "none";
                                document.getElementById("InputBox").disabled = false;
                                document.getElementById("one_more").disabled = true;
                                document.getElementById("InputBox").focus();
                                setInterval(update,1000);
                            
                                clearInterval(CoundownIntervel);
                            }
                        },1000)
                    }
                    /*let Users = JSON.parse(result.trim());
                    alert(Users.UserLiveID);*/
                }
            });
            
        }
    });
}
function RefreshUserPosition()
{
    let WordCounter = 0;
    if(finishRace == 0)
    {
        while(WordCounter < TotalWordWritten && a[Currentcount] != undefined)
        {
            if(a[Currentcount] == " ")
            {
                WordCounter++;
            }
            Currentcount ++;
        }
        document.getElementById("letter"+Currentcount).style.background = "rgb(0,0,0,0.3)";
        document.getElementById("Coundown").innerHTML = Coundown;
        if(Coundown == 0)
        {
            document.getElementById("CoundownDiv").style.display = "none";
        }
    }
}
function changeTextValue(e)
{
    if(StartTyping)
    {
        var inputChar = String.fromCharCode(e.keyCode);
        if(a[Currentcount+1]== undefined)
        {
            document.getElementById("InputBox").disabled = true;
            document.getElementById("one_more").disabled = false;
            finishRace = true;
            StartTyping = false;
            $.ajax({
                url:"finishRace.php",
                success : function(result)
                { 
                    alert(result);
                    /*Update Finhish Status ONLY (__may be Time also :)__) )*/
                }
            });
            return;   
        }
        if(wrongLetters == 0)
        {
            TypingRinInMiddle = 1;
        }
        if((TypingRunInMiddle==1))
        {

            if((inputChar == a[Currentcount])&&(wrongLetters==0))
            {
                document.getElementById("letter"+Currentcount).style.textShadow  = "0px 0px 5px lime";
                Currentcount++; 
                letterCount++;
            }
            else if(wrongLetters <6 )
            {
                document.getElementById("letter"+Currentcount).style.textShadow = "0px 0px 5px red";
                if(a[Currentcount] == " ")
                {
                    document.getElementById("letter"+Currentcount).style.boxShadow = "0px 0px 5px 0px red inset";
                }
                wrongLetters ++;
                IsWordWrong = true;
                Currentcount++;
                letterCount++;
            }

            chqInputBox = false;
        }
        if(a[Currentcount-1] == " " && wrongLetters == 0)
        {
            if(wrongLetters == 0)
            {
                letterCount = 0;
                document.getElementById("InputBox").value = "";
                if(IsWordWrong == false)
                {
                    TotalCorrectWord++;
                }
                else
                {
                    TotalIncorectWord++;
                    IsWordWrong = false;
                }
                TotalWordWritten++;
            }
        }
        if(wrongLetters ==6)
        {
            TypingRunInMiddle = 0;

            if(chqInputBox == false)
            {
                InputTextInBox = document.getElementById("InputBox").value;
                chqInputBox = true;
            }
            document.getElementById("InputBox").maxLength = InputTextInBox.length+1;

        }
        document.getElementById("letter"+(Currentcount-1)).style.background = "none";
        if(a[Currentcount]!= undefined)
        {
            document.getElementById("letter"+Currentcount).style.background = "rgb(0,0,0,0.3)";
        }
    }
}
function chqSpecialCase(e)
{
    var inputChar = String.fromCharCode(e.keyCode);
    
    if(e.keyCode == 8 && letterCount>0  )
    {
        TypingRunInMiddle = 1;
        chqInputBox = false;
        document.getElementById("InputBox").maxLength = 100;
        document.getElementById("letter"+(Currentcount)).style.background = "none";
        Currentcount--;
        if(wrongLetters >0)
            wrongLetters--;
        letterCount--;
        document.getElementById("letter"+Currentcount).style.textShadow  = "none";
        document.getElementById("letter"+Currentcount).style.boxShadow = "none";
        document.getElementById("letter"+Currentcount).style.background = "rgb(0,0,0,0.3)";
    }
}
/* For update Second By Second */
function update()
{
    if(StartTyping == true)
    {
        countSeconds++;
        TimeInSec--;
        speed = parseInt(TotalWordWritten/(countSeconds/60));
        if(TotalWordWritten > 0)
        {
            accuracy = parseInt((TotalCorrectWord/TotalWordWritten)*100); 
        }
        else
        {
            accuracy = 0;
        }
        if(TimeInSec ==-1)
        {
            TimeInMin--;
            TimeInSec=59;
        }
        if(TimeInMin <0)
        {
            StartTyping = 0;
            countSeconds = 0;
            document.getElementById("InputBox").disabled = true;
            document.getElementById("one_more").disabled = false;
        }
        if(speed> 0)
        {
            createCookie("TotalWords",TotalWordWritten,1);
            createCookie("Speed",speed,1);
            createCookie("Accuracy",accuracy,1);
            createCookie("Minute",TimeInMin,1);
            createCookie("Second",TimeInSec,1);
            createCookie("IncorrectWords",TotalIncorectWord);
            if(finishRace)
            {
                createCookie("finishRace","true",1);
            }
            else
            {
                createCookie("finishRace","false",1)
            }
            $.ajax({
                url : "updateUserTime.php",
                success : function(result)
                {
                    let Users = JSON.parse(result);
                    for(i=0;i<Users.UserCount;i++)
                    {
                        document.getElementById(Users.User[i].ID);  
                    }
                    changePositions(Users,Users.UserCount);
                }
            });
        }
    }    
}
function changePositions(UserDetails,userCount)
{
    /*WordAndTrackRatio*/
    for(i=0;i<userCount;i++)
    {
        let Element = document.getElementById("User"+UserDetails.User[i].ID);
        Element.style.left = parseInt(WordAndTrackRatio*UserDetails.User[i].TotalWords) + "px";
        document.getElementById("Name"+UserDetails.User[i].ID).innerHTML =""+UserDetails.User[i].Name;
        document.getElementById("Speed"+UserDetails.User[i].ID).innerHTML = UserDetails.User[i].Speed;
    }
}
function StartNewRace()
{
    $.ajax({
       url:"DeleteMyAccount.php",
        success: function(result)
                {
                    if(result == "pass")
                    {
                        
                        $.ajax({
                            url : "Setparticipants.php",
                            success: function(result)
                            {
                                if(result == "Pass")
                                {
                                    location.href = "startrace.php";
                                    
                                }
                                else
                                {
                                    console.log(result);
                                }
                            }
                        })
                    }
                    else
                    {
                        console.log(result+"qq");
                    }
                }
    });
}
function createCookie(cookieName,cookieValue,Minute)
{
      var date = new Date();
      date.setTime(date.getTime()+(Minute*60*1000));
      document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
}
/* End of update function */