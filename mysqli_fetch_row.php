<H3>
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