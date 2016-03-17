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