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