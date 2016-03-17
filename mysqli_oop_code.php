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