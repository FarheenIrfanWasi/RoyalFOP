
<!DOCTYPE HTML>
<html>
	<head>
		<title>AdminPanel</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600|Source+Code+Pro" rel="stylesheet" />
		<!--[if lte IE 8]><script src="html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>		
		<link rel="stylesheet" type="text/css" href="datetimepicker/jquery.datetimepicker.css"/>
		<script src="skel.min.js">
		{
			prefix: 'css/style',
			preloadStyleSheets: true,
			resetCSS: true,
			boxModel: 'border',
			grid: { gutters: 30 },
			breakpoints: {
				wide: { range: '1200-', containers: 1140, grid: { gutters: 50 } },
				narrow: { range: '481-1199', containers: 960 },
				mobile: { range: '-480', containers: 'fluid', lockViewport: true, grid: { collapse: true } }
			}
		}
		</script>
		<script>
			$(function() {

				// Note: make sure you call dropotron on the top level <ul>
				$('#main-nav > ul').dropotron({ 
					offsetY: -10 // Nudge up submenus by 10px to account for padding
				});

			});
		</script>
		<script>
			// DOM ready
			$(function() {
    
			// Create the dropdown base
			$("<select />").appendTo("nav");
   
			// Create default option "Go to..."
			$("<option />", {
				"selected": "selected",
				"value"   : "",
				"text"    : "Menu"
			}).appendTo("nav select");
   
			// Populate dropdown with menu items
			$("nav a").each(function() {
			var el = $(this);
			$("<option />", {
				"value"   : el.attr("href"),
				"text"    : el.text()
			}).appendTo("nav select");
			});
   
			// To make dropdown actually work
			// To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
			$("nav select").change(function() {
				window.location = $(this).find("option:selected").val();
			});
  
			});
		</script>	
		<style>
table {
    width:100%;
}
table, th, td {
    border: 1px solid grey;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}

</style>
	</head>
	<body>
		<div id="header_container">		
		    <div class="container">
			<!-- Header -->
				<div id="header" class="row">
					<div class="4u">
						<!--	<div class="transparent"><span>
						<h1><a href="index.html">RFOP<span class="header_colour">_Admin</span></a></h1>
							<h2>Excellence in Handeling!</h2>  </div>-->
							<img src="images/ras-badge.png">
					  
					</div>
					<b id="logout" style="float:right;font-size:20px;"><a style= "color: white;" href="../logout.php">Log Out</a></b>
					<nav id="main-nav" class="8u">
						<ul>
							<li><a class="active" href="admin.html" style="font-weight:bold;">Home</a></li>
							<li><a href="update.html" style="font-weight:bold">Update Data</a></li>
							<li><a href="reportprint.php" style="font-weight:bold">Dynamic Report</a></li>
							<li><a href="" style="font-weight:bold">Daily Reports</a></li>
							<li><a href="searchpage.php" style="font-weight:bold" > Edit Data</a></li>										
							<li><a href="registration.html" style="font-weight:bold" >Add User</a></li>	
							<li><a href="searchuser.php" style="font-weight:bold" >Edit User</a></li>
							<li><a href="index.html" style="font-weight:bold">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>	
        </div>		

		<div id="site_content">
			<div class="container">			
			
				<!-- Features -->			
				<div class="row">									
					<section class="8u">				
<?php
include('connect.php');
error_reporting(1);
$epr='search';
$msg='';
if(isset($_GET['epr']))
	$epr=$_GET['epr'];
if($epr==save)
{
	$username=$_POST['username'];
    $email_id=$_POST['email_id'];
	$designation=$_POST['designation'];
    $dept=$_POST['dept'];
	$contact=$_POST['contact'];
	$user_role=$_POST['user_role'];
	$station=$_POST['station'];
	
	
    $a_sql=mysql_query("INSERT INTO user(username,email_id,designation,dept,contact,user_role,station) VALUES('$username','$email_id','$designation','$dept','$contact','$user_role','$station')");
	if($a_sql)
		header("location:searchuser.php");
	else
		$msg='Error : '.mysql_error();
}

if($epr=='delete'){
	$id=$_GET['id'];
	$delete=mysql_query("DELETE FROM user WHERE username='$id'");
	if($delete)
		header("location:searchuser.php");
	else
		$msg='Error : '.mysql_error();
	
}
if($epr=='saveup'){
	$username=$_POST['username'];
    $email_id=$_POST['email_id'];
	$designation=$_POST['designation'];
    $dept=$_POST['dept'];
	$contact=$_POST['contact'];
	$user_role=$_POST['user_role'];
	$station=$_POST['station'];
	$a_sql=mysql_query("UPDATE user SET username='$username',email_id='$email_id',designation='$designation',dept='$dept',contact='$contact',user_role='$user_role',station='$station' WHERE username='$username'");
	if($a_sql)
		header("location:searchuser.php");
	else
		$msg='Error : '.mysql_error();
}

?>
<?php
if($epr=='update'){
	$id=$_GET['id'];
	$row=mysql_query("SELECT * FROM user WHERE username='$id'");
	$st_row=mysql_fetch_array($row);
	?>
 <form method="post" action='searchuser.php?epr=saveup'>
 <table align='center'>
          <td>username</td>
<td> <input type="text" name="username" value="<?php echo $st_row['username'] ?>" /></td>
		   </tr>
		   <tr>
          <td>email_id</td>
           <td> <input type="email" name="email_id" value="<?php echo $st_row['email_id'] ?>" /></td>
		   </tr>
		  <tr>
          <td>designation</td>
           <td> <input type="text" name="designation" value="<?php echo $st_row['designation'] ?>" /></td>
		   </tr>
		    <tr>
			 <tr>
          <td>dept</td>
           <td> <input type="text" name="dept" value="<?php echo $st_row['dept'] ?>" /></td>
		   </tr>
		    <tr>
          <td>contact</td>
           <td> <input type="text" name="contact" value="<?php echo $st_row['contact'] ?>" /></td>
		   </tr>
		      <tr>
          <td>user_role</td>
           <td> <input type="text" name="dept" value="<?php echo $st_row['dept'] ?>" /></td>
		   </tr>
		       <tr>
          <td>station</td>
           <td> <input type="text" name="station" value="<?php echo $st_row['station'] ?>" /></td>
		   </tr>
		       
          <td></td>
           <td> <input type="submit" name="insert" /></td>
		   </tr>
		   
		   
		   
           
            </table>
        </form>
<?php } elseif($epr=='search'){ ?>
 <form method="post" action='searchuser.php?epr=search'>
 <table align='center'>
  <tr>
<td>username: <input type="text" name="username">email_id:<input type="email" name="email_id">
 <input type="submit" name="insert" /></td>
		   </tr>
		   </form>
<table align ="center" border="1" cellspacing="0" cellpadding="0" width="700" >
<thead>

<th>username</th>
<th>email_id</th>
<th>designation</th>
<th>dept</th>
<th>contact</th>
<th>user_role</th>
<th>station</th>
<th>action</th>
</thead>
<?php
$username=$_POST['username'];
$email_id=$_POST['email_id'];

$sql=mysql_query("SELECT * FROM user WHERE username ='$username'");
while ($row=mysql_fetch_array($sql)){
	echo "<tr>
	
	        <td>".$row['username']."</td>
			<td>".$row['email_id']."</td>
			<td>".$row['designation']."</td>
			<td>".$row['dept']."</td>
			<td>".$row['contact']."</td>
			<td>".$row['user_role']."</td>
			<td>".$row['station']."</td>
			<td align='center'>
			        <a href='searchuser.php?epr=delete&id=".$row['username']."'>DELETE</a>
			        <a href='searchuser.php?epr=update&id=".$row['username']."'>UPDATE</a>
			
			</td>
			</tr>";
				
}
?>
</table>
<?php echo $msg;?>
<?php } else { ?>
 <form method="post" action='searchuser.php?epr=save'>
 <table align='center'>

 <tr>
          <td>username</td>
           <td> <input type="text" name="username" /></td>
		   </tr>
		   <tr>
		 <td>email_id</td>
           <td> <input type="email" name="email_id"  /></td>
		   </tr>
		  <tr>
          <td>designation</td>
           <td> <input type="text" name="designation"  /></td>
		   </tr>
		    <tr>
			 <tr>
          <td>dept</td>
           <td> <input type="text" name="dept"  /></td>
		   </tr>
		    <tr>
          <td>contact</td>
           <td> <input type="text" name="contact" /></td>
		   </tr>
		      <tr>
          <td>user_role</td>
           <td> <input type="text" name="user_role" /></td>
		   </tr>
		       <tr>
          <td>station</td>
           <td> <input type="text" name="station"  /></td>
		   </tr>
		       
		   
		   
		   
           
            </table>
        </form>
<?php } ?>					
					</section>
	
							<section class="12u">
								<h3>More Useful Links</h3>
								<ul>
									<li><a href="#">First Link</a></li>
									<li><a href="#">Another Link</a></li>
									<li><a href="#">And Another</a></li>
									<li><a href="#">Last One</a></li>
								</ul>
							</section>
						</div>
					</section>			

				</div>
			</div>
        </div>		
		
			<div class="container">			
			<!-- Footer -->
				<footer>
					<p><img src="images/twitter.png" alt="twitter" />&nbsp;<img src="images/facebook.png" alt="facebook" />&nbsp;<img src="images/rss.png" alt="rss" /></p>
					<p><a href="index.html">Home</a> | <a href="index.html">Examples</a> | <a href="index.html">A Page</a> | <a href="index.html">Another Page</a> | <a href="index.html">Contact Us</a></p>
			
				</footer>		
			</div>		
			
	</body>
 <script src="datetimepicker/build/jquery.datetimepicker.full.js"></script>
<script>
$('.date').datetimepicker({
	//yearOffset:222,
	lang:'ch',
	timepicker:false,
	mask: true,
	format:'Y-m-d',
	//formatDate:'Y/m/d',
	//minDate:'-1970/01/02', // yesterday is minimum date
	//maxDate:'+1970/01/02' // and tommorow is maximum date calendar
});

</script>
</html>
