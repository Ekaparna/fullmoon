<H3>
Mysql - code</H3>
<?php

mysql_connect ("localhost","root","")
or die("Connection Failed".mysql_error());

mysql_select_db("users")
or die ("Database Failed".mysql_error());

$s= "select * from users";
$result=mysql_query($s);

$row=mysql_fetch_row($result);
echo "User Id:" .$row[0]."<br>";
echo "UserName:" .$row[1]."<br>";
echo "Password:" .$row[2]."<br>";


?>