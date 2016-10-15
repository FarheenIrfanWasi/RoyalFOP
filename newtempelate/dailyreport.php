<!DOCTYPE HTML>
<html>
	<head>
	<title>DAILY REPORT</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300italic,600|Source+Code+Pro" rel="stylesheet" />
		<!--[if lte IE 8]><script src="html5shiv.js" type="text/javascript"></script><![endif]-->
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>		
		<link rel="stylesheet" type="text/css" href="datetimepicker/jquery.datetimepicker.css"/>
	<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
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
		<style>
		.table
		{
			border-collapse: collapse;
	    }
.table1 td {
    background-color: #301878; 
	color:white;
	font-weight:bold;
}
.table th {
font-weight:bold;
	 background-color:#c0a860;
}
.table td{
	background-color:white;
	color:#301878; 
	font-weight:bold;
	
}

 input[type=submit] {
    background-color: #c0a860;
    color: white;
    padding: 5px 30px;
    margin: 2px 2px;
    cursor: pointer;
	font-weight:bold;
}
 input[type=submit]:hover {
	 color:  #301878; 
 }
 #label{
margin-right:20px;
color : white;
font-weight:bold;
font-size:20px; 
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
							<li><a href="index.html" style="font-weight:bold;" ></a></li>
							<li><a href="index.html" style="font-weight:bold" > A Page</a></li>						
							<li>
								<a href="update.html" style="font-weight:bold">Update Data</a>			
							</li>
							<li><a href="registration.html" style="font-weight:bold" >Add User</a></li>	
							<li><a href="index.html" style="font-weight:bold">Contact</a></li>
						</ul>
					</nav>
				</div>
			</div>	
        </div>		

		<div id="site_content">
			<div class="container">			
			
				<!-- Features -->	
<section class="4u" style ="float:right;width:45px; margin-top:15px;">
						
							<section class="12u">
						<button onclick="printContent('row')"><img src="images/print.jpg" height="45px" width ="45px"></button>	
							</section>
</section>							
				<div class="row" >									
					<section class="8u">	
<?php
include('connect.php');
error_reporting(1);
$airline='';
$arrdate='';
if(isset($_GET['airline']))
	$airline=$_GET['airline'];
if(isset($_GET['arrdate']))
	$arrdate=$_GET['arrdate'];
echo "<div style='margin:20px; margin-left:300px;'> <center><h1> DAILY REPORT </h1></center>";	 
if($airline=="ETIHAD AIRWAYS"){
echo "<center><img src='images/etihadairways.jpg' height='150px' width ='300px'><center></div>";}
?>
<div style="margin:20px; margin-left:300px;">

<form method="GET" action="dailyreport.php?">
<center> <table align='center' class="table1" width="90%">
 <tr> <td><input type="hidden" name="airline" value="<?php echo $airline ?>">
<label id="label">DATE</label><input type="text" class="date" id="date" style="width:90px;" name="arrdate">
<input type="submit" value="SHOW FLIGHTS" /> </td> </tr></table> </center>
</div>
<?php
if($airline!="" && $arrdate!=""){
 echo "   <div id='row'>
<table align ='center' class ='table' border='1' cellspacing='0' cellpadding='0' width='150%' id='table' style='border-spacing:0px 5px; border-collapse: separate;'>
<thead>
<th>Flight#</th>
<th>A/C Reg#</th>
<th>A/C type</th>
<th>STA</th>
<th>ATA</th>
<th>STD</th>
<th>ATD</th>
<th>Status</th>
<th>GTG</th>
<th>GTS</th>
</thead>";
$query = "SELECT * FROM flight_performance WHERE airline_name ='$airline' and arr_flight_date='$arrdate'";
$myquery=mysql_query($query);
$totalgroundtimesaved = 0;
$totalgroundtimegiven=0;
$totalflights = 0;
$totalflightsearlyontime = 0;
$totalflightsdelay = 0;
$totalflightsdelayRAS = 0;
$totalflights=0;
while ($row=mysql_fetch_array($myquery)){
	echo "<tr>
	<td><a href='table.html?'>".$row['arr_flight_no']."</>
	<td>".$row['aircraft_reg']."</td>
	<td>".$row['aircraft_type']."</td>
			<td>".$row['arr_schedule_time']."</td>
			<td>".$row['arr_actual_time']."</td>
			<td>".$row['dep_schedule_time']."</td>
			<td>".$row['dep_actual_time']."</td>
			<td>".$row['dep_status']."</td>
			<td>".$row['ground_time_given']."</td>
			<td>".$row['ground_time_saved']."</td></a>
			</tr> ";
if($row['dep_status'] == "EARLY" || $row['dep_status']=="On Time" ){
				$totalflightsearlyontime++;
			}
			if($row['dep_status'] == "DELAY" ){
				$totalflightsdelay++;
			}
			if($row['dep_status'] == "Delay RAS" ){
				$totalflightsdelayRAS++;
			}
			$totalgroundtimegiven +=  $row['ground_time_given'];
			$totalgroundtimesaved +=  $row['ground_time_saved'];
			$totalflights++;
}
$OTP =0;
$GTSper=0;
$GTSper=0;
$GTSper=($totalgroundtimesaved/$totalgroundtimegiven)*100;
$OTP =(($totalflights-$totalflightsdelayRAS)/$totalflights)*100;
echo "</table><table class ='table' style='border-spacing:3px 0px; border-collapse: separate;' width='80%'> ";
echo "<th colspan='4'> RESULT </th>";
echo "<tr><td >Total flights taken </td><td style='color:black;'>" .$totalflights."</td>";
echo "<td>Total GTG</td><td style='color:black;'> " . $totalgroundtimegiven."</td></tr>";
echo "<tr><td>Total flights Early/On Time</td><td style='color:black;'> " .$totalflightsearlyontime."</td>";
echo "<td>Total GTS </td><td style='color:black;'>".$totalgroundtimesaved."</td></tr>";
echo "<tr><td>Total flights Delay</td><td style='color:black;'> " .$totalflightsdelay."</td>";
echo "<td >OTP</td><td style='color:black;'> " .round($OTP)." %</td></tr>";
echo "<tr><td>Total flights Delay RAS </td><td style='color:black;'> " .$totalflightsdelayRAS."</td>";
echo "<td>GTS percentage</td><td style='color:black;'> ".round($GTSper )."%</td></tr>";
echo "</table></div>";}?>
</section>
			
					
						
					</section>
						</div>			
				</div>
			</div>	
				
			<div class="container">			
			<!-- Footer -->
				
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
	value: new Date()
	//formatDate:'Y/m/d',
	//minDate:'-1970/01/02', // yesterday is minimum date
	//maxDate:'+1970/01/02' // and tommorow is maximum date calendar'
})

</script>
</html>
