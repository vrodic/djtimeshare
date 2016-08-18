<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1250">
<title>DJTIMEshare</title>
<link rel="stylesheet" type="text/css" href="pussycatblue.css" media="all">
</head>

<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">


<?php
require ("connect.php");
require ("header.php");

$target_path = "f/";
$fn = mysql_real_escape_string(basename( $_FILES['uploadedfile']['name']));
//echo "fn: $fn<br>";
$query = "INSERT INTO files (name) VALUES('$fn')";
//echo "$query<br>";
$res = mysql_query($query);
$id = mysql_insert_id ();
$target_path = $target_path . $id; 
//echo "<br>"+$_FILES['uploadedfile']['tmp_name'] + "<br>";
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
    echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
        " has been uploaded";

   echo "<br><br><a href=\"index.php?id=$id\"> use this link in your web pages</a> <br>";
        } else{
            echo "There was an error uploading the file, please try again!";
            }
?>
<table width="90%" cellspacing="1" cellpadding="3" border="0" align="center"> <tr>	<td class="code"><?echo "http://djtimeshare.hopto.org/share/index.php?id=$id";?></td>  </tr></table>

</body>
</html>