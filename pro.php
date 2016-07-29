<?php
error_reporting(1);
$name=$_POST['name'];
$password=$_POST['password'];
$email=$_POST['email'];
$designation=$_POST['designation'];
$department=$_POST['department'];
$role=$_POST['role'];
$station=$_POST['station'];
$contact=$_POST['contact'];
$hash = password_hash($password, PASSWORD_DEFAULT);
  mysql_connect("localhost", "root", "") or die(mysql_error());
     mysql_select_db("rfop")or die(mysql_error());
     $sql="INSERT INTO user(username,password,email_id,designation,dept,contact,user_role,station)VALUES('$name','$hash','$email','$designation','$department','$contact','$role','$station')";
               	mysql_query($sql);
				echo "user created!";
               	?>


