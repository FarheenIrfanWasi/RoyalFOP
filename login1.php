<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
// Selecting Database
$db = mysql_select_db("rfop", $connection);
// SQL query to fetch information of registerd users and finds user match.
$query = mysql_query("select * from user where username='$username'", $connection);
$rows = mysql_num_rows($query);
$row = mysql_fetch_array($query);
if ($rows == 1) {
	$hash=$row['password'];
if (password_verify($password,$hash)) {
	if($username == 'admin' ){
$_SESSION['login_user']=$username; // Initializing Session
header("Location: newtempelate/admin.html"); // Redirecting To Other Page
}
else if($username == 'operator3'){
$_SESSION['login_user']=$username; // Initializing Session
header("Location: indexhome.html");
}
}
 else {
$error = "Username or Password is invalid";
}}
mysql_close($connection); // Closing Connection
}
}
?>