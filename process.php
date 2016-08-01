<?php
error_reporting(1);
//get values pass from form in login.php file
    $username = $_POST['user'];
    $password = $_POST['pass'];
   // $hash = password_hash($password, PASSWORD_DEFAULT);
	
//to prevent my sql injection
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
     // connect to the server
     mysql_connect("localhost", "root", "");
     mysql_select_db("rfop");
     //query
     $result = mysql_query("select * from user where username = '$username'")
               or die("query failed" .mysql_error());
               $row = mysql_fetch_array($result);
			   $hash=$row['password'];
               if ($row['username'] == $username && password_verify($password,$hash)) {
               	echo "login successfull as " .$row['username'];
				header("Location: newtempelate/index.html");
               }else{
               	echo "failed to login";
               }
?>
