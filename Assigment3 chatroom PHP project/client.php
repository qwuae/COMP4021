<?php

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    return;
}

// get the name from cookie
$name = $_COOKIE["name"];

print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Message Page</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type="text/javascript">
        //<![CDATA[
        function load() {
            var name = "<?php print $name; ?>";
            var msg_win=window.parent.frames["message"];
            var username_field=msg_win.document.getElementById("username");
            //.value??
            if(msg_win==null||username_field==null){
                setTimeout("load()",200);
                return;
                }
            username_field.value=name;
            document.getElementById("color").value=window.parent.frames["message"].document.getElementById("color").getAttribute("value");
        setTimeout("document.getElementById('msg').focus()",100);
        }
         function select(color){
            document.getElementById("color").value=color;
            window.parent.frames["message"].document.getElementById("color").setAttribute("value",color);
        }
        //]]>
        </script>
    </head>

    <body style="text-align: left" onload="load()">
        <form action="add_message.php" method="post">
            <table border="0" cellspacing="5" cellpadding="0">
                <tr>
                    <td colspan="2">What is your message?</td>
                    
                </tr>
                <tr>
                    <td colspan="2"><input class="text" type="text" name="message" id="msg" style= "width: 780px" /></td>
                </tr>
                <tr>
                    <td ><input class="button" type="submit" value="Send Your Message" style="width: 200px" />
                    </td>
                    <td>
                        choose your color:
                        <button style="background-color: magenta;width:30px;height: 30px" onclick="select('magenta');return false; "/>
                        <button style="background-color: blue;width:30px;height: 30px" onclick="select('blue');return false; "/>
                        <button style="background-color: cyan;width:30px;height: 30px" onclick="select('cyan');return false; "/>
                        <button style="background-color: green;width:30px;height: 30px" onclick="select('green');return false; "/>
                        <button style="background-color: yellow;width:30px;height: 30px" onclick="select('yellow');return false; "/>
                        <button style="background-color: red;width:30px;height: 30px" onclick="select('red');return false; "/>
                        </td>
                </tr>
            </table>
            <input type="hidden" id="color" name="color" />
        </form>
        
        <!--logout button-->
        <form action="logout.php" method="post" onsubmit="alert('Goodbye!');">
        <table border="0" cellspacing="5" cellpadding="0">
        <tr style="border-top:1px solid gray">
            <td>
            <input class="button" type="submit" value="Logout">
            </td>
        </form>

    </body>
</html>
