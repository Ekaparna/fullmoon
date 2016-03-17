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