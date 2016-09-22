<?php
error_reporting(1);
include('login1.php'); // Includes Login Script

if(isset($_SESSION['login_userrole']) && $_SESSION['login_userrole']== 'ADMIN' ){
header("Location: newtempelate/admin.html");
}
if(isset($_SESSION['login_userrole']) && $_SESSION['login_userrole']== 'VIEWER' ){
header("Location: indexhome.html");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<center>
<img src="images\ras-badge.png">
<h1 style=""> ROYAL AIRPORT SERVICES </h1>
<h3> EXCELLENCE IN HANDLING </h3>
</center>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
<div id="form">
<form action="" method="POST">
<p>
	<label style="font-weight:bold;margin-right:10px;">Username</label>

  <input type="text" id="user"  placeholder="username" name="username">
</p>
<p>
	<label style="font-weight:bold;margin-right:11px;">Password</label>

  <input type="password" id="pass" placeholder="**********" name="password">
</p>
<p>
<input type="submit" name="submit" id="btn" value="Login" style="width:100px;height:35px; margin-left:100px;" >
	</p>
	<span><?php echo $error; ?></span>
</form>
	</div>
</body>
</html>