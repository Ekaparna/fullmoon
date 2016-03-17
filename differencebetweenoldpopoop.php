<?php

//Old method

mysql_connect ("localhost","root","")
or die("Connection Failed".mysql_error());

mysql_select_db("users")
or die ("Database Failed".mysql_error());
/*
//To create a table
$s="create table mysqlTest (id int(3),name varchar(30))";
if(!mysql_query($s))
	echo mysql_error();
else
	echo "Created"; */
?>
<hr>
<?php
//POP
$Cser= mysqli_connect("localhost","root","","users")
or die("Connection Failed".mysqli_error());
/*
$s="create table mysqliTest (id int(3),name varchar(30))";
if(!mysqli_query($Cser,$s))
	echo mysqli_error();
else
	echo "Created";
*/
?>
<hr>
<?php
//OOP
$Cser= new mysqli("localhost","root","","users")
or die("Connection Failed". $Cser->connect_error);
$s="create table mysqliTestoop (id int(3),name varchar(30))";
/*
if(!$Cser->query($s))
	echo $Cser->error;
else
	echo "Created";
*/
?>
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
<H3>
Mysql - code</H3>
<?php

mysql_connect ("localhost","root","")
or die("Connection Failed".mysql_error());

mysql_select_db("users")
or die ("Database Failed".mysql_error());

$s= "select * from users";
$result=mysql_query($s);
$count=mysql_num_rows($result);
echo $count."Records";
?><H3>
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
<H3>
Mysql OOP- code</H3>
<?php

$Cser= new mysqli("localhost","root","","users")
or die("Connection Failed". $Cser->connect_error);

$s= "select * from users";
$result= $Cser->query($s);
$count=$result->num_rows;

echo $count."Records";
?>
<H3><H3>
Mysql OOP- code</H3>
<?php

$Cser= new mysqli("localhost","root","","users")
or die("Connection Failed". $Cser->connect_error);

$s= "select * from users";
$result= $Cser->query($s);
echo "Mysqli OOP method<hr/>";
$row=$result->fetch_row();

echo "User Id:" .$row[0]."<br>";
echo "UserName:" .$row[1]."<br>";
echo "Password:" .$row[2]."<br>"; 
?>
Mysql OOP- code</H3>
<?php

$Cser= new mysqli("localhost","root","","users")
or die("Connection Failed". $Cser->connect_error);

$s= "select * from users";
$result= $Cser->query($s);
$row=$result->fetch_assoc();
echo $row["username"]."<br>";
echo $row["first_name"]."<br>";
echo $row["last_name"]."<br>";
echo $row["email"]."<br>";
echo $row["user_id"]."<br>";
echo $row["password"]."<br>";
?>
<H3>
Mysql POP- code</H3>
<?php


$Cser= mysqli_connect("localhost","root","","users")
or die("Connection Failed".mysqli_error());

$s= "select * from users";
$result=mysqli_query($Cser,$s);
$count=mysqli_num_rows($result);
echo $count."Records";
?>
<H3>
Mysql POP- code</H3>
<?php


$Cser= mysqli_connect("localhost","root","","users")
or die("Connection Failed".mysqli_error());

$s= "select * from users";
$result=mysqli_query($Cser,$s);
$row=mysqli_fetch_assoc($result);
echo $row["username"]."<br>";
echo $row["first_name"]."<br>";
echo $row["last_name"]."<br>";
echo $row["email"]."<br>";
echo $row["user_id"]."<br>";
echo $row["password"]."<br>";
?>
<H3>
Mysql POP- code</H3>
<H3>
Mysql POP- code</H3>
<?php


$Cser= mysqli_connect("localhost","root","","users")
or die("Connection Failed".mysqli_error());

$s= "select * from users";
$result=mysqli_query($Cser,$s);
$row=mysqli_fetch_row($result);
echo "User Id:" .$row[0]."<br>";
echo "UserName:" .$row[1]."<br>";
echo "Password:" .$row[2]."<br>";
?>