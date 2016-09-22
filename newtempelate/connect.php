<?php  
error_reporting(1);
  $con=  mysql_connect("localhost", "root", "") or die(mysql_error());
    $db=  mysql_select_db("rfop")or die(mysql_error());
 if($db){

 }else
 {
	 echo 'ERROR :'.mysql_error();
 }
 ?>
 