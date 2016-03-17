<?php
$con = mysqli_connect("localhost","root","","users");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQLi: " . mysqli_connect_error();
  }
?>


<!--Connection of database by old method of Mysql-->
<?php
/*

$connect_error = 'sorry ! connection error';
$connect_errordb = 'sorry !database connection error';

mysql_connect('localhost','root','') or die($connect_error);
mysql_select_db('lr') or die($connect_errordb);

*/
?>

<?php
/*
mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('lr');
*/
?>


<!--Connection of database by new method of Mysqli-->
<?php 
/*
<?php
$con = mysqli_connect("localhost","my_user","my_password","my_db");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

?>*/
?>
