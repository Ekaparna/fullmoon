<H3>
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