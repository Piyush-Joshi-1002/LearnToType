setTimeout(update,2000);
function update()
{
    $.ajax({
        url: "updateUserTime.php",
        success : function(result)
        {
            alert(result);
            console.log(result);
        }
    });
    
}