var a = new Array();
var charInLines = [0,0,0,0,0];
var i = 0 , j=0 , CharCount = 0;
var CurrentTypeingLine = 0;
var LineChangeDecider = false;
var ChangableLine = 0;
var CharCounter = 0;
var ArrayIndex = 0;
var TotalWordWritten = 0;
var TotalNoOfLines = 2;
var CurrentLineCompare = 0;
var isWordCorrect = true;
var TotalCorrectWord = 0;
var letterSize ;
var letterMargin;
var TimeInSec = 59; // ByDefault
var TimeInMin = 0; // ByDefault
var StartTyping = false;
var TimeOver = false;
var countSeconds = 0;
var ChqFingerHelp = false;
var previousKeyboadKey = 'keySpace';
var previousShiftKey = 'keyShift1' ;
var updateValue = setInterval(update,1000);
var totalLetterUsed;
var selectCourse;
var speed , accuracy,gross_Speed;
window.onload = function() {
    $.ajax({
            url: "ChqSignIn.php", success: function(result){
                if(result != "SignInFail")
                {
                    document.getElementById("SignIN").style.display = "none";
                    var DisplayName = document.getElementById("UserName");
                    DisplayName.innerHTML ="<div>"+result+"<img src='assets/image/logout.png' id='signout' onclick='Signout()'></div>";;
                    DisplayName.style.display = "block";
                        
                }
                else
                {
                    console.log(result);
                }
            }
         });
    letterSize = getComputedStyle(document.getElementById("LetterNo0"));
    letterSize = parseInt(letterSize.width);
    letterMargin = parseInt(getComputedStyle(document.getElementById("LetterNo0")).margin);
    letterSize = letterSize+letterMargin;
    StringToType();
    Reset();
}
function RedirectToProgress()
{
    
    location.href="progress.php"

}
function StringToType()
{
    var image = "course1.png";
    if(localStorage.getItem('Lesson'))
    {
        selectCourse = parseInt(localStorage.getItem('Lesson'));
    }
    else
    {
        selectCourse = 1;
    }
    switch(selectCourse)
    {
        case 1 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';'];
            break;
        }
        case 2 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';'];
            break;
        }case 3 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';','i','e'];
            image = "course3.png";
            break;
            
        }
        case 4 : {            
            totalLetterUsed = ['a','s','d','f','j','k','l',';','i','e','r','u'];
            image = "course4.png";
            break;
        }case 5 : {         
            totalLetterUsed = ['a','s','d','f','j','k','l',';','i','e','r','u','t','o'];
            image = "course5.png";
            break;
        }
        case 6 : {
            
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O'];
            image = "course6.png";
            break;
        }case 7 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\''];
            image = "course7.png";
            break;
        }
        case 8 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\''];
            image = "course7.png";
            break;
        }case 9 : {
            
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\'','v','V','N','n','?','/'];
            image = "course9.png";
            break;
        }
        case 10 : {
            
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\'','v','V','N','n','?','/','W','w','M','m'];
            image = "course10.png";
            break;
        }case 11 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\'','v','V','N','n','?','/','W','w','M','m','Q','q','P','p'];
            image = "course11.png";
            break;
        }
        case 12 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\'','v','V','N','n','?','/','W','w','M','m','Q','q','P','p','B','b','Y','y'];
            
            image = "course12.png";
            break;
        }
        
        case 13 : {
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\'','v','V','N','n','?','/','W','w','M','m','Q','q','P','p','B','b','Y','y','Z','X','z','x'];
            image = "course13.png";
            break;
        }
        case 14 : {            
            totalLetterUsed = ['a','s','d','f','j','k','l',';','A','S','D','F','J','K','L',':','i','e','I','E','r','u','R','U','t','o','T','O','g','G','H','h','"','\'','v','V','N','n','?','/','W','w','M','m','Q','q','c','C','<','>',',','.','P','p','B','b','Y','y','Z','X','z','x'];
            image = "course14.png";
            break;
        }
        case 15 : {
            totalLetterUsed = ['3','4', '5','6','7','8','#','$', '%','^','&','*']
            
            image = "course15.png";
            break;
        }
        case 16 : {
            totalLetterUsed = ['1','2', '9','0','3','4', '5','6','7','8','#','$', '%','^','&','*','!','@', '(',')']
            
            image = "course16.png";
            break;
        }   
        
        case 17 : {
            
            totalLetterUsed = ['?','/',';',':'];
            
            image = "course17.png";
            break;
        }case 18 : {
            
            totalLetterUsed = ['?','/',';',':','"','\'','+','='];
            
            image = "course18.png";
            break;
        }
        case 19 : {
            
            totalLetterUsed = ['?','/',';',':','(', ')', '[', ']', '{', '}', '@', '$', '%','&'];
            
            image = "course19.png";
            break;
        }
        case 20 : {
            totalLetterUsed = ['?','/',';',':','(', ')', '[', ']', '{', '}', '@', '$', '%','&','\\', '|','!', '#', '^', '*', '.', ','];
            image = "course20.png";
            break;
        }
        case 21 : {            
            totalLetterUsed = ['1','2','3','4','5','6','7','8','9','0'];
            
            image = "course20.png";
            break;
        }
        case 22 : {
            totalLetterUsed = ['/','*','-','+','.'];

            image = "course22.png";
            break;
        }
        case 23 : {
            
            totalLetterUsed = ['1','2','3','4','5','6','7','8','9','0','/','*','-','+','.'];
            image = "course23.png";
            break;
        }
    }
     document.getElementById("ImageKey").src = "assets/image/KeyboardImage/"+image+"";
   
}
function setTextData()
{
    var element = document.getElementById("lineNo1");   
    var lineCounterControler = 1, lineCounter = 1;
    var elementStyle = getComputedStyle(element);
    var elementWidth = parseInt(elementStyle.width);
    var elementHeight = parseInt(elementStyle.height);
    var totalLetterInOneLine = parseInt((elementWidth/(letterSize)));
    var loop_Counter = 0;
    CharCount = 0;
    j=0;
    document.getElementById("LetterNo0").remove();
    for(i=0;(lineCounter!=(TotalNoOfLines+1)); i++)
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
    var LetterNo = j-1;
    var totalLetterInOneLine = parseInt((elementWidth/(letterSize)));
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
        if(CurrentTypeingLine ==TotalWordWritten)
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
            stopAll();
            return;
        }
        document.getElementById("LetterNo"+ArrayIndex).style.background= "rgba(50,25,200,0.3)";
        document.getElementById("LetterNo"+ArrayIndex).style.color = "black";
        
    }
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
        if(CurrentTypeingLine ==TotalWordWritten)
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
            stopAll();
            return;
        }
        document.getElementById("LetterNo"+ArrayIndex).style.background= "rgba(50,25,200,0.3)";
        document.getElementById("LetterNo"+ArrayIndex).style.color = "black";
        
    }
}
function AudioFirst()
{
    var audio = new Audio('assets/sound/Button.mp3');
    audio.play();
    Reset();
}
function Reset()
{
    ResetVariables(); 
    document.getElementById("testResult").style.display = "none";
    var element = document.getElementById("lineNo1");        
    element.innerHTML = "<span id='LetterNo0' class='LetterToType'>T</span>";
    for(var Index=2;Index<=TotalNoOfLines;Index++)
    {
        element = document.getElementById("lineNo"+Index+"");
        element.innerHTML ="";
    }  
    
    TimeInSec = 00;
    
    TimeInMin = 03;
    document.getElementById("RemainTime").innerHTML = ""+TimeInMin+":"+TimeInSec+"";
    document.getElementById("CurrentSpeed").innerHTML = "0 wpm";
    document.getElementById("Accuracy").innerHTML = "100%";
    var Length = totalLetterUsed.length-1;
    for(i =0; i<60; i++)
    {
        if(i < 30)
        {
            var worldlength = 2;
        }
        else
        {
            var worldlength = 3;
        }
        let index = parseInt(Math.random()*Length);
        for(j =0; j<worldlength; j++)
        {
            
            a.push(totalLetterUsed[index]);
        }
        a.push(' ');
    }
    for(i =0; i<40; i++)
    {
        
        var worldlength = 3;
        for(j =0; j<worldlength; j++)
        {
            let index = parseInt(Math.random()*Length);
            a.push(totalLetterUsed[index]);
        }
        a.push(' ');
    }
    setTextData();
    
}
function ResetVariables()
{
    a = new Array();
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
    /*document.getElementById(previousKeyboadKey).style.background = "rgba(0,0,0,0.5);";
    document.getElementById(previousShiftKey).style.background = "rgba(0,0,0,0.5);";*/
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
            stopAll();
            return;
        }
    }
}
function stopAll()
{
    StartTyping = false;
    TimeOver = true;
    document.getElementById("testResult").style.display = "block";
    if(speed >= 12 && accuracy >= 90)
    {
        document.getElementById("Result").innerHTML ="Pass";        
    }
    else
    {
        document.getElementById("Result").innerHTML = "Fail"
    }
    document.getElementById("speed").innerHTML =speed+" wpm";
    if(speed < 12)
    {
        document.getElementById("speed").textShadow = "0px 0px 5px Red";

    }
    document.getElementById("accuracy").innerHTML =accuracy+"%";
    if(accuracy < 12)
    {
        document.getElementById("accuracy").textShadow = "0px 0px 5px Red";
    }
    document.getElementById("SaveTime").innerHTML = ((TimeInMin*60)+TimeInSec+1)+ " Seconds";
    document.getElementById("TotalWords").innerHTML = TotalWordWritten+" Words";
    document.getElementById("CorrectWords").innerHTML = TotalCorrectWord+" Words";
    document.getElementById("InCorrectWords").innerHTML =(TotalWordWritten - TotalCorrectWord)+" Words";
    document.getElementById("RoughSpeed").innerHTML =parseInt(TotalWordWritten/((countSeconds/60)))+" wpm";
    document.getElementById("NetSpeed").innerHTML =speed+" wpm";
    countSeconds = 0;
    createCookie("course",selectCourse,10);
    createCookie("speed",speed,10);
    createCookie("accuracy",accuracy,10);
    $.ajax({
        url : "assets/php/SetCourseData.php",
        success : function(result)
        {
            console.log(result);
            alert(result);
        }
    }); 
}
window.addEventListener('keydown', function(e) {
  if(e.keyCode == 32 ) {
    e.preventDefault();
  }
})

window.addEventListener('keydown', function(e) {
  if(e.keyCode == 32 ) {
    e.preventDefault();
  }
})


/*Keyboard Event Start's hears (Warning: Decoding is dengerous for your helth please Do with your own risk)*/

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
/*For Key Instruction*/
function changeScreen()
{
    var element = document.getElementById("infotab");
    var left = 10;   
    var audio = new Audio('assets/sound/Button.mp3');
    audio.play();
    let timer = setInterval(function() {
      if (left == 100) clearInterval(timer);
      else
        {
            element.style.left = "-"+ left +"%";
            left+=2;
        }
    }, 20);
    document.getElementById("next").style.display = "none";
}
function CloseInstruction()
{
    var audio = new Audio('assets/sound/Button.mp3');
    audio.play();
    document.getElementById('Course_Introduction').style.display = 'none';
}
/*For Key Instruction*/
