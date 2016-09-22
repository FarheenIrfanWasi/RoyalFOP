
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

</script>
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
	$fop_id=$_POST['fop_id'];
    $airline_name=$_POST['airline_name'];
	$aircraft_reg=$_POST['aircraft_reg'];
    $arr_flight_no=$_POST['arr_flight_no'];
	$arr_flight_date=$_POST['arr_flight_date'];
	$arr_schedule_time=$_POST['arr_schedule_time'];
	$arr_actual_time=$_POST['arr_actual_time'];
	$dep_schedule_time=$_POST['dep_schedule_time'];
	$dep_actual_time=$_POST['dep_actual_time'];
	
    $a_sql=mysql_query("INSERT INTO flight_performance(fop_id,airline_name,aircraft_reg,arr_flight_no,arr_flight_date,arr_schedule_time,arr_actual_time,dep_schedule_time,dep_actual_time) VALUES('$fop_id','$airline_name','$aircraft_reg','$arr_flight_no','$arr_flight_date','$arr_schedule_time','$arr_actual_time','$dep_schedule_time','$dep_actual_time')");
	if($a_sql)
		header("location:searchpage.php");
	else
		$msg='Error : '.mysql_error();
}

if($epr=='delete'){
	$id=$_GET['id'];
	$delete=mysql_query("DELETE FROM flight_performance WHERE fop_id='$id'");
	if($delete)
		header("location:searchpage.php");
	else
		$msg='Error : '.mysql_error();
	
}
if($epr=='saveup'){
		$id=$_GET['id'];
    $airline_name=$_POST['airline_name'];
	$aircraft_reg=$_POST['aircraft_reg'];
    $arr_flight_no=$_POST['arr_flight_no'];
	$arr_flight_date=$_POST['arr_flight_date'];
	$arr_schedule_time=$_POST['arr_schedule_time'];
	$arr_actual_time=$_POST['arr_actual_time'];
	$dep_schedule_time=$_POST['dep_schedule_time'];
	$dep_actual_time=$_POST['dep_actual_time'];
	$a_sql=mysql_query("UPDATE flight_performance SET airline_name='$airline_name',aircraft_reg='$aircraft_reg',arr_flight_no='$arr_flight_no',arr_flight_date='$arr_flight_date',arr_schedule_time='$arr_schedule_time',arr_actual_time='$arr_actual_time',dep_schedule_time='$dep_schedule_time',dep_actual_time='$dep_actual_time' WHERE fop_id='$id'");
	if($a_sql)
		header("location:searchpage.php");
	else
		$msg='Error : '.mysql_error();
}

?>
<?php
if($epr=='update'){
	$id=$_GET['id'];
	$row=mysql_query("SELECT * FROM flight_performance WHERE fop_id='$id'");
	$st_row=mysql_fetch_array($row);
	?>
 <form method="post" action='searchpage.php?epr=saveup'>
 <table align='center'>
          <td>airline_name</td>
           <td> <input type="text" name="airline_name" value="<?php echo $st_row['airline_name'] ?>" /></td>
		   </tr>
		  <tr>
          <td>aircraft_reg</td>
           <td> <input type="number" name="aircraft_reg" value="<?php echo $st_row['aircraft_reg'] ?>" /></td>
		   </tr>
		    <tr>
			 <tr>
          <td>arr_flight_no</td>
           <td> <input type="text" name="arr_flight_no" value="<?php echo $st_row['arr_flight_no'] ?>" /></td>
		   </tr>
		    <tr>
          <td>arr_flight_date</td>
           <td> <input type="text" name="arr_flight_date" value="<?php echo $st_row['arr_flight_date'] ?>" /></td>
		   </tr>
		      <tr>
          <td>arr_schedule_time</td>
           <td> <input type="text" name="arr_schedule_time" value="<?php echo $st_row['arr_schedule_time'] ?>" /></td>
		   </tr>
		       <tr>
          <td>arr_actual_time</td>
           <td> <input type="text" name="arr_actual_time" value="<?php echo $st_row['arr_actual_time'] ?>" /></td>
		   </tr>
		        <tr>
          <td>dep_schedule_time</td>
           <td> <input type="text" name="dep_schedule_time" value="<?php echo $st_row['dep_schedule_time'] ?>" /></td>
		   </tr>
		         <tr>
          <td>dep_actual_time</td>
           <td> <input type="text" name="dep_actual_time" value="<?php echo $st_row['dep_actual_time'] ?>" /></td>
		   </tr>

          <td></td>
           <td> <input type="submit" name="insert" /></td>
		   </tr>
		   
		   
		   
           
            </table>
        </form>
<?php } elseif($epr=='search'){ ?>
 <form method="post" action='searchpage.php?epr=search'>
 <table align='center'>
  <tr>
<td>Arrival Date:</td><td> <input class="date" type="text" name="search_arr_date"></td>
<td>Filght Number:</td> <td> <input type="text" name="search_flight_num" required></td>
 <td> <input type="submit" name="insert" /></td>
		   </tr>
		   </form>
<table align ="center" border="1" cellspacing="0" cellpadding="0" width="700">
<thead>
<th>airline_name</th>
<th>aircraft_reg</th>
<th>arr_flight_no</th>
<th>arr_flight_date</th>
<th>arr_schedule_time</th>
<th>arr_actual_time</th>
<th>dep_schedule_time</th>
<th>dep_actual_time</th>

</thead>
<?php
$searchdate=$_POST['search_arr_date'];
$searchflight=$_POST['search_flight_num'];

$sql=mysql_query("SELECT * FROM flight_performance WHERE arr_flight_date LIKE '$searchdate%' AND arr_flight_no = $searchflight");
while ($row=mysql_fetch_array($sql)){
	echo "<tr>
			<td>".$row['airline_name']."</td>
			<td>".$row['aircraft_reg']."</td>
			<td>".$row['arr_flight_no']."</td>
			<td>".$row['arr_flight_date']."</td>
			<td>".$row['arr_schedule_time']."</td>
			<td>".$row['arr_actual_time']."</td>
			<td>".$row['dep_schedule_time']."</td>
			<td>".$row['dep_actual_time']."</td>
			<td align='center'>
			        <a href='searchpage.php?epr=delete&id=".$row['fop_id']."'>DELETE</a>
			        <a href='searchpage.php?epr=update&id=".$row['fop_id']."'>UPDATE</a>
			
			</td>
			</tr>";
				
}
?>
</table>
<?php echo $msg;?>
<?php } else { ?>
 <form method="post" action='searchpage.php?epr=save'>
 <table align='center'>

 <tr>
          <td>fop_id</td>
           <td> <input type="number" name="fop_id" /></td>
		   </tr>
		   <tr>
		 <td>airline_name</td>
           <td> <input type="text" name="airline_name"  /></td>
		   </tr>
		  <tr>
          <td>aircraft_reg</td>
           <td> <input type="number" name="aircraft_reg"  /></td>
		   </tr>
		    <tr>
			 <tr>
          <td>arr_flight_no</td>
           <td> <input type="text" name="arr_flight_no"  /></td>
		   </tr>
		    <tr>
          <td>arr_flight_date</td>
           <td> <input type="text" name="arr_flight_date" /></td>
		   </tr>
		      <tr>
          <td>arr_schedule_time</td>
           <td> <input type="text" name="arr_schedule_time" /></td>
		   </tr>
		       <tr>
          <td>arr_actual_time</td>
           <td> <input type="text" name="arr_actual_time"  /></td>
		   </tr>
		        <tr>
          <td>dep_schedule_time</td>
           <td> <input type="text" name="dep_schedule_time"  /></td>
		   </tr>
		         <tr>
          <td>dep_actual_time</td>
           <td> <input type="text" name="dep_actual_time"  /></td>
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
