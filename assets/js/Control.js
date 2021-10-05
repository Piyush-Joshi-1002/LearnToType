var a = "The Jungle Book is a 2016 American fantasy adventure film directed and produced by Jon Favreau, written by Justin Marks and produced by Walt Disney Pictures. Based on Rudyard Kipling's eponymous collective works, the film is a live-action/CGI hybrid remake of the Walt Disney's 1967 animated film of the same name.The Jungle Book tells the story of Mowgli, an orphaned human boy who, guided by his animal guardians, sets out on a journey of self-discovery while evading the threatening Shere Khan.The film introduces Neel Sethi, along with voice and motion capture performances from Bill Murray, Ben Kingsley, Idris Elba, Lupita Nyong'o, Scarlett Johansson, Giancarlo Esposito, and Christopher Walken.";
var charInLines = [0,0,0,0,0];
var i = 0 , j=0 , CharCount = 0;
var CurrentTypeingLine = 0;
var LineChangeDecider = false;
var ChangableLine = 0;
var CharCounter = 0;
var ArrayIndex = 0;
var TotalWordWritten = 0;
var isWordCorrect = true;
var TotalCorrectWord = 0;
var TotalNoOfLines = 5;
var CurrentLineCompare = 1;
var TimeInSec = 59; // ByDefault
var TimeInMin = 0; // ByDefault
var StartTyping = false;
var TimeOver = false;
var countSeconds = 0;
var ChqFingerHelp = false;
var previousKeyboadKey = 'keySpace';
var previousShiftKey = 'keyShift1' ;
var updateValue = setInterval(update,1000);
var speed , accuracy,gross_Speed;
var Selected_Option;
window.onload = function() {
    $.ajax({
            url: "ChqSignIn.php", success: function(result){
                if(result != "SignInFail")
                {
                    console.log(result);
                    document.getElementById("SignIN").style.display = "none";
                    var DisplayName = document.getElementById("UserName");
                    DisplayName.innerHTML ="<div>"+result+"<img src='assets/image/logout.png' id='signout' onclick='Signout()'></div>";;
                    DisplayName.style.display = "block";
                        
                }else
                {
                    console.log(result);
                }
            }
         });
    Reset();
}
function RedirectToProgress()
{
    location.href="progress.php"
}
function setTextData()
{
    var element = document.getElementById("lineNo1");   
    var lineCounterControler = 1, lineCounter = 1;
    var elementStyle = getComputedStyle(element);
    var elementWidth = parseInt(elementStyle.width);
    var elementHeight = parseInt(elementStyle.height);
    var letterSize = parseInt(getComputedStyle(document.getElementById("LetterNo0")).width);
    var totalLetterInOneLine = parseInt((elementWidth/(letterSize)));
    var loop_Counter = 0;
    CharCount = 0;
    j=0;
    document.getElementById("LetterNo0").remove();
    for(i=0;lineCounter!=(TotalNoOfLines+1); i++)
    {
		
		if((a[i] == ' ')||(a[i]==undefined))
		{
			CharCount += (i-j)+1;
			if(CharCount < totalLetterInOneLine)
			{
				while(i>=j && (a[j]!=undefined))
				{
                    
					element.innerHTML+="<span id='LetterNo"+j+"' class='LetterToType'>"+a[j]+"</span>";
					j++;
                    
				}		
			}
			else
			{
				CharCount -= (i-j)+1;
				charInLines[lineCounter-1] = CharCount ;
				lineCounter++;
				element = document.getElementById("lineNo"+lineCounter+"");
				CharCount = 0;
                
			}			
		}
		if((a[(i-1)]== undefined)&&(i!=0))
		{
			break;
		}
    }
}
function ChangeLine(LineToChange)
{
    LineToChange++;
    var element = document.getElementById("lineNo"+LineToChange);
    element.innerHTML = "";
    var elementStyle = getComputedStyle(element);
    var elementWidth = parseInt(elementStyle.width);
    var totalLetterInOneLine = parseInt((elementWidth/20));
    while(1)
    {
        if((a[i] == ' ')||((a[i]==undefined)))
		{
			CharCount += (i-j)+1;
			if(CharCount < totalLetterInOneLine)
			{
				while(i>=j && (a[j]!=undefined) )
				{
					element.innerHTML+="<span id='LetterNo"+j+"' class='LetterToType'>"+a[j]+"</span>";
					j++;
					
				}		
			}
			else
			{
				CharCount -= (i-j)+1;
				charInLines[LineToChange-1] = CharCount ;
                CharCount = 0;
                break;
			}			
		}
        i++;
        if((a[i-1]== undefined)&&(i!=0))
		{
			
            i = 0;
            j = 0;
            charInLines[LineToChange-1] = CharCount ;
            CharCount = 0;
            break;
            
		}
		
    }
}
function readyToType()
{
    document.getElementById('LetterNo0').style.background= 'rgba(50,25,200,0.3)';
    document.getElementById('LetterNo0').style.color= 'black';
    TimeOver = false;
    
}
function ChqValueCorrection(e)
{
    if(TimeOver == false)
    {
        StartTyping = true;
        if(a[ArrayIndex+1] != undefined)
        {
            DetectingFingure(a[ArrayIndex+1]);
            keyboardMarks(a[ArrayIndex+1]);    
        }
        else
        {
            DetectingFingure(a[ArrayIndex]);
            keyboardMarks(a[ArrayIndex]);
        }
        if(CurrentTypeingLine ==CurrentLineCompare)
        {
            LineChangeDecider = true;
        }
        if((CharCounter== charInLines[CurrentTypeingLine]))
        {
            CurrentTypeingLine++;
            CharCounter=0;
            if(LineChangeDecider)
            {
                if(ChangableLine == TotalNoOfLines)
                {
                    ChangableLine = 0;
                }
                ChangeLine(ChangableLine);
                ChangableLine++;
            }
            if(CurrentTypeingLine == TotalNoOfLines)
            {
                CurrentTypeingLine =0;
            }
        }
        var InputChar = String.fromCharCode(e.keyCode);
        if(InputChar == a[ArrayIndex])
        {
            document.getElementById("LetterNo"+ArrayIndex).style.textShadow = "0px 0px 5px lime";
        }
        else
        {
            document.getElementById("LetterNo"+ArrayIndex).style.textShadow = "0px 0px 5px red";
            if(a[ArrayIndex] == ' ')
            {
                   document.getElementById("LetterNo"+ArrayIndex).style.boxShadow = " 0px 0px 12px rgba(255,0,0,0.5) inset";


            }
            isWordCorrect = false;
        }
        CharCounter ++;
        document.getElementById("LetterNo"+ArrayIndex).style.background= "none";

        ArrayIndex++;
        if(a[ArrayIndex] == undefined)
        {
            ArrayIndex = 0;
        }
        document.getElementById("LetterNo"+ArrayIndex).style.background= "rgba(50,25,200,0.3)";
        document.getElementById("LetterNo"+ArrayIndex).style.color = "black";
        
    }
}
function DetectingFingure(value)
{
    
    var LeftImage = 'Left4.png';
    var RightImage = 'Right4.png';
    if((value >= 'a' && value <= 'z') || (value >= '0' && value <= '9') || (value == '-')|| (value == '=') || value=='\\' || value == ';' || value == '\'' || value == ',' || value == '.' || value == '/' || value == ' ')
    {
        LeftImage = 'Left.png';
        RightImage = 'Right.png';
    }
    if(value == 'a' || value == 'A' || value == 'q' || value == 'Q' || value == 'z' || value == 'Z' || value == '1'|| value == '!' || value == '`' || value == '~')
    {
        LeftImage = 'Left4.png';
    }
    else if(value == 'w' || value == 'W' || value == 's' || value == 'S' || value == 'X' || value == 'x' || value == '2'|| value == '@')
    {
        LeftImage = 'Left3.png';
    }
    else if(value == 'e' || value == 'E' || value == 'd' || value == 'D' || value == 'c' || value == 'C' || value == '3'|| value == '#')
    {
        LeftImage = 'Left2.png';
    }
    else if(value == 'R' || value == 'r' || value == 'F' || value == 'f' || value == 'C' || value == 'c' || value == 'v'|| value == 'V' || value == 'B' || value == 'b' || value == 'g' || value == 'G' || value == 't' || value == 'T' || value == '5'|| value == '%')
    {
        LeftImage = 'Left1.png';
    }
    else if(value == '6' || value == '^' || value == 'y' || value == 'Y' || value == 'h' || value == 'H' || value == 'N'|| value == 'n' || value == 'u' || value == 'U' || value == 'J' || value == 'j' || value == 'M' || value == 'm' || value == '7'|| value == '&')
    {
        
        RightImage = 'Right1.png';
    }
    else if(value == 'i' || value == 'I' || value == 'k' || value == 'K' || value == ',' || value == '<' || value == '8'|| value == '*' )
    {
        RightImage = 'Right2.png';
    }
    else if(value == '9' || value == '(' || value == 'O' || value == 'o' || value == 'L' || value == 'l' || value == '.'|| value == '>' )
    {
        RightImage = 'Right3.png';
    }
    else if(value == '0' || value == ')' || value == 'P' || value == 'p' || value == ':' || value == ';' || value == '?'|| value == '/' || value == '{' || value == '[' || value == '}' || value == ']' || value == '\"' || value == '\'' || value == '-' || value == '_'|| value == '='|| value == '+' || value == '|' || value == '\\')
    {
        RightImage = 'Right4.png';
    }
    else
    {
        RightImage = 'Right0.png';
        LeftImage = 'Left.png';
    }
    document.getElementById("LeftFingerImage").src = "assets/image/fingerImage/"+LeftImage+"";
    document.getElementById("RightFingerImage").src = "assets/image/fingerImage/"+RightImage+"";
}
function NotDetectByKeyPress(e)
{
    
    if(e.keyCode == 32 && TimeOver == false)
    {
        if(a[ArrayIndex+1] != undefined)
        {
            DetectingFingure(a[ArrayIndex+1]);
            keyboardMarks(a[ArrayIndex+1]);    
        }
        else
        {
            DetectingFingure(a[ArrayIndex]);
            keyboardMarks(a[ArrayIndex]);
        }
        if(CurrentTypeingLine ==CurrentLineCompare)
        {
            LineChangeDecider = true;
        }
        if(CharCounter== charInLines[CurrentTypeingLine])
        {
            CurrentTypeingLine++;
            CharCounter=0;
            
            if(LineChangeDecider)
            {
                
                if(ChangableLine == TotalNoOfLines)
                {
                    ChangableLine = 0;
                }
                ChangeLine(ChangableLine);
                ChangableLine++;
            }
            if(CurrentTypeingLine == TotalNoOfLines)
            {
                CurrentTypeingLine =0;
            }
        }
        if(a[ArrayIndex] == ' ')
        {
           TotalWordWritten ++;
           if(isWordCorrect)
           {
               TotalCorrectWord ++;
           }
            isWordCorrect = true;
        }
        else
        {
           
            document.getElementById("LetterNo"+ArrayIndex).style.textShadow = "0px 0px 5px red";
            isWordCorrect = false;
        }
        document.getElementById("LetterNo"+ArrayIndex).style.background= "none";

        ArrayIndex++;
        CharCounter++;
        if(a[ArrayIndex] == undefined)
        {
            ArrayIndex = 0;
        }
        document.getElementById("LetterNo"+ArrayIndex).style.background= "rgba(50,25,200,0.3)";
        document.getElementById("LetterNo"+ArrayIndex).style.color = "black";
        
    }
}
function Reset()
{
    
    Selected_Option = document.getElementById("SelectParagraph").value;
    var value = null;
    if(Selected_Option == "custom")
    {
        alert("Sorry Custom is not set Yet");
        return;   
    }
    else if(Selected_Option == "random")
    {
        value = ""+(Math.floor(Math.random()*11)+1);
    }
    else
    {
        value = Selected_Option;
    }
    var ajax = new XMLHttpRequest();
    ajax.open("post", "assets/php/changeParagraph.php", true);
    ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    ajax.send("value="+value+"");
    ajax.onreadystatechange= function()
    {
        if(this.readyState == 4 && this.status == 200)
        {
            if(this.responseText.trim() == "NotDone")
            {
                alert("their was an error in changing paragraph");
                return 0;
            }
            var data = eval('('+this.responseText.trim()+')');
            document.getElementById("ParagraphName").innerHTML =data.paragraph[0].Heading;
            document.getElementById("WriterName").innerHTML =data.paragraph[0].writername;
            a = data.paragraph[0].content;
            document.getElementById("testResult").style.display = "none";
           document.getElementById('LeftFingerImage').src = "assets/image/fingerImage/All_Fingure_Left.png";
            document.getElementById('RightFingerImage').src = "assets/image/fingerImage/All_Fingure_Right.png";
            var element = document.getElementById("lineNo1");        
            element.innerHTML = "<span id='LetterNo0' class='LetterToType'>T</span>";
            for(var Index=2;Index<6;Index++)
            {
                element = document.getElementById("lineNo"+Index+"");
                element.innerHTML ="";
            }
            ResetVariables();
            setTextData()
        }
    }
      
    
    var TimeGiven = document.getElementById("Time").value;
    TimeInSec = TimeGiven%100;
    
    TimeInMin = parseInt(TimeGiven/100);
    document.getElementById("RemainTime").innerHTML = ""+TimeInMin+":"+TimeInSec+"";
    document.getElementById("CurrentSpeed").innerHTML = "0 wpm";
    document.getElementById("Accuracy").innerHTML = "100%";
    
}
function ResetVariables()
{
    TestStartFlag = false;
    charInLines= [0,0,0,0,0];
    i = 0;j=0;CharCount = 0;
    CurrentTypeingLine = 0;
    LineChangeDecider = false;
    ChangableLine = 0;
    CharCounter = 0;
    ArrayIndex = 0;
    TotalWordWritten = 0;
    isWordCorrect = true;
    TotalCorrectWord = 0;
    StartTyping = false;
    TimeOver = false;
    countSeconds = 0;
    document.getElementById(previousKeyboadKey).style.background = "rgba(0,0,0,0.5);";
    document.getElementById(previousShiftKey).style.background = "rgba(0,0,0,0.5);";
}
function update()
{
    if(StartTyping)
    {
        
        document.getElementById("RemainTime").innerHTML = ""+TimeInMin+":"+TimeInSec+"";
        TimeInSec--;
        speed = parseInt(TotalCorrectWord/(countSeconds/60));
        accuracy = parseInt((TotalCorrectWord/TotalWordWritten)*100); 
        document.getElementById("Accuracy").innerHTML = ""+accuracy+"%";
        countSeconds++;
        document.getElementById("CurrentSpeed").innerHTML = ""+speed+" wpm";
        if(TimeInSec ==-1)
        {
            TimeInMin--;
            TimeInSec=59;
        }
        if(TimeInMin < 0)
        {
            countSeconds++;
            StartTyping = false;
            TimeOver = true;
            gross_Speed = parseInt(TotalWordWritten/((countSeconds/60)));
            document.getElementById("testResult").style.display = "block";
            document.getElementById("speed").innerHTML =speed+" wpm";
            document.getElementById("accuracy").innerHTML =accuracy+"%";
            document.getElementById("TotalWords").innerHTML = TotalWordWritten+" Words";
            document.getElementById("CorrectWords").innerHTML = TotalCorrectWord+" Words";
            document.getElementById("InCorrectWords").innerHTML =(TotalWordWritten - TotalCorrectWord)+" Words";
            document.getElementById("RoughSpeed").innerHTML = gross_Speed+" wpm";
            document.getElementById("NetSpeed").innerHTML =speed+" wpm";
            countSeconds = 0;
            createCookie("speed",speed,2);
            createCookie("accuracy",accuracy,2);
            createCookie("GrossSpeed",gross_Speed,2);
            $.ajax({
                url : "ChqSignIn.php",
                success : function(result)
                {
                    if(result.trim()!="SignInFail")
                    {
                        $.ajax({
                            url : "assets/php/SetTestData.php",
                            success : function(result)
                            {
                                console.log(result);
                                alert(result);
                            }
                        })          
                    }
                }
            })
        }
    }
}
function AudioFirst()
{
    var audio = new Audio('assets/sound/Button.mp3');
    audio.play();
    Reset();
}
function RedirectToCertification()
{
    var audio = new Audio("assets/sound/Button.mp3");
    audio.play();
    $.ajax({
        url : "ChqSignIn.php",
        success : function(result)
           {
               if(result != "SignInFail")
                {
                    var time = document.getElementById("Time").value;
                    localStorage.setItem("Time",time);
                    localStorage.setItem("UserName",""+result+"");
                    localStorage.setItem("speed",speed);
                    localStorage.setItem("accuracy",accuracy);
                    localStorage.setItem("Paragraph",Selected_Option);
                    location.href = "Certification.php";
                    
                    
                }
               else
               {
                    document.getElementById('SignUpDiv').style.display = 'flex';
                    console.log(result);
               }
           }
    });
}
function FingerHelpChange()
{
    if(ChqFingerHelp)
    {
        TotalNoOfLines = 5;
        CurrentLineCompare = 1;
        document.getElementById('fingurHelp').style.display = 'none';
        ChqFingerHelp = false;
    }
    else
    {
        TotalNoOfLines = 2;
        CurrentLineCompare = 0;
        document.getElementById('fingurHelp').style.display = 'flex';
        ChqFingerHelp = true;
    }
    
    Reset();
}
window.addEventListener('keydown', function(e) {
  if(e.keyCode == 32 ) {
    e.preventDefault();
  }
})


/*Keyboard Event Start's hears (Warning: Decoding is dengerous for your helth please Do with your own risk)*/
function keyboardMarks(value)
{
    var shift = 'None';
    var keyId = 'None';
    if((value >='A' && value <='Z') || value == '!' || value == '~' || value == '@' || value == '#' || value == '%'  || value == '^' || value == '&' || value == '*' || value == '(' || value == ')' || value == '_'  || value == '+' || value == '{' || value == '}' || value == ':' || value == '"' || value == '<' || value == '>' || value == '?'  )
    {
        if(value == 'A' || value == 'Q' || value == 'Z' || value == '!' || value == '~' || value == 'W' || value == 'S' || value == 'X' || value == '@' || value == 'E' || value == 'D' || value == 'C' ||  value == '#' || value == 'R' || value == 'F' || value == 'C' || value == 'V' ||  value == 'B' || value == 'G' ||  value == 'T' || value == '%')
        {
            shift = "keyShift2";
        }
        else
        {
            shift = "keyShift1";
        }
        if(value >='A' && value <='Z')
        {
            keyId = 'key'+value;
            
        }
    }
    if(value>='a' && value <='z')
    {
        value = value.toUpperCase();
        keyId = 'key'+value;
    }
    else if(value >='0' && value <='9')
    {
        keyId = 'key'+value;
    }
    else
    {
        switch(value)
        {
            case '!' :{
                keyId  = 'key1';
                break;
            }case '@' :{
                keyId  = 'key2';
                break;
            }case '#' :{
                keyId  = 'key3';
                break;
            }case '$' :{
                keyId  = 'key4';
                break;
            }case '%' :{
                keyId  = 'key5';
                break;
            }case '^' :{
                keyId  = 'key6';
                break;
            }case '&' :{
                keyId  = 'key7';
                break;
            }case '*' :{
                keyId  = 'key8';
                break;
            }case '(' :{
                keyId  = 'key9';
                break;
            }case ')' :{
                keyId  = 'key0';
                break;
            }
            case ('`' ) :{
                keyId  = 'keyS1';
                break;
            }case ('_') :{
                keyId  = 'keyS2';
                break;
            }case ('+') :{
                keyId  = 'keyS3';
                break;
            }case ('|') :{
                keyId  = 'keyS4';
                break;
            }case ('{') :{
                keyId  = 'keyS5';
                break;
            }case ('}') :{
                keyId  = 'keyS6';
                break;
            }case (':') :{
                keyId  = 'keyS7';
                break;
            }case ('\'') :{
                keyId  = 'keyS8';
                break;
            }case ('<') :{
                keyId  = 'keyS9';
                break;
            }case ('>') :{
                keyId  = 'keyS10';
                break;
            }case ('/') :{
                keyId  = 'keyS11';
                break;
            }case ('~') :{
                keyId  = 'keyS1';
                break;
            }case ('-') :{
                keyId  = 'keyS2';
                break;
            }case ('=') :{
                keyId  = 'keyS3';
                break;
            }case ('\\') :{
                keyId  = 'keyS4';
                break;
            }case ('[') :{
                keyId  = 'keyS5';
                break;
            }case (']') :{
                keyId  = 'keyS6';
                break;
            }case (';') :{
                keyId  = 'keyS7';
                break;
            }case ('"') :{
                keyId  = 'keyS8';
                break;
            }case (',') :{
                keyId  = 'keyS9';
                break;
            }case ('.') :{
                keyId  = 'keyS10';
                break;
            }case ('?') :{
                keyId  = 'keyS10';
                break;
            }
            case ' ':
            {
                keyId = 'keySpace';
            }
        }
    }
    document.getElementById(previousShiftKey).style.background = "rgba(0,0,0,0.5)";
    document.getElementById(previousKeyboadKey).style.background = "rgba(0,0,0,0.5)";
        
    if(shift != 'None')
    {
        document.getElementById(shift).style.background = "gray";
        previousShiftKey = shift ;
    }
    previousKeyboadKey = keyId;
    document.getElementById(keyId).style.background = "gray";
}
function createCookie(cookieName,cookieValue,Minute)
{
      var date = new Date();
      date.setTime(date.getTime()+(Minute*60*1000));
      document.cookie = cookieName + "=" + cookieValue + "; expires=" + date.toGMTString();
}
/*Keyboard Event End's hears (I hope you survive After reading this S**t. Have you got something I know it's UseLess. ;) )*/ 











