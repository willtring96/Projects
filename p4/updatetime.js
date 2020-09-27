function use_ajax()
{
    var httpxml;
    try
    {
        httpxml = new XMLHttpRequest();
    }
    catch (e)
    {
        alert("There was an error trying to display the clock.");
        return false;
    }
    
    function clock_state() 
    {
        if (httpxml.readyState == 4)
        {
            document.getElementById("time").innerHTML = httpxml.responseText;
        }
    }
    var display_time = "displaytime.php";
    httpxml.onreadystatechange = clock_state;
    httpxml.open("GET", display_time, true);
    httpxml.send(null);
    tt = timer_function();
}

function timer_function()
{
    var interval = 1000;
    mytime=setTimeout('use_ajax();', interval)
}