<H3>
Mysql - code</H3>
<?php

mysql_connect ("localhost","root","")
or die("Connection Failed".mysql_error());

mysql_select_db("users")
or die ("Database Failed".mysql_error());

$s= "select * from users";
$result=mysql_query($s);

$row=mysql_fetch_assoc($result);
echo $row["username"]."<br>";
echo $row["first_name"]."<br>";
echo $row["last_name"]."<br>";
echo $row["email"]."<br>";
echo $row["user_id"]."<br>";
echo $row["password"]."<br>";

?>