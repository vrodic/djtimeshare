<?php
require ("connect.php");


if (isset($id)) {
// retrieve file
 header("Content-Type: multipart/mixed ");
$sid = mysql_real_escape_string($id);
 $query = "SELECT name FROM files WHERE id='$sid';";
$res = mysql_query($query);
$name = mysql_result($res,0,0);
header('Content-type: application/force-download');
   header('Content-Transfer-Encoding: Binary');
   header('Content-length: '.filesize("f/$sid"));
 header("Content-Disposition: attachment; filename=\"$name\"");
        readfile("f/$sid");
        exit ();
       
}


?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<META http-equiv=Content-Type content="text/html; charset=windows-1250">
<title>DJTIMEshare</title>
</head>
<?php
 require ("header.php");

?>
<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">



<DIV ALIGN="CENTER">
<form enctype="multipart/form-data" action="upload.php" method="POST">
<input type="hidden" name="MAX_FILE_SIZE" value="100000000000" />
<input name="uploadedfile" type="file" size="64" />
<br />
<input type="submit" value="Upload!" />
</form>
</DIV>




</body>
</html>
