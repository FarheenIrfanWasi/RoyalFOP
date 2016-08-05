<?php
include('login1.php'); // Includes Login Script

if(isset($_SESSION['login_user']) && $_SESSION['login_user']== 'admin' ){
header("Location: newtempelate/admin.html");
}
if(isset($_SESSION['login_user']) && $_SESSION['login_user']== 'operator3' ){
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
	<label>username</label>

  <input type="text" id="user"  placeholder="username" name="username">
</p>
<p>
	<label>password</label>

  <input type="password" id="pass" placeholder="**********" name="password">
</p>
<p>
<input type="submit" name="submit" id="btn" value="Login">
	</p>
	<span><?php echo $error; ?></span>
</form>
	</div>
</body>
</html>