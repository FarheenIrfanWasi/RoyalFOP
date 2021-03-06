<!DOCTYPE HTML>
<html>
	<head>
	<title>Report</title>
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>jQuery barChart Demo Page</title>
		<link type="text/css" rel="stylesheet" href="style.css" />
     <!--   <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
    <script   src="https://code.jquery.com/jquery-1.12.4.js"   integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="   crossorigin="anonymous"></script>
    <script src="bar/script.js"></script>
	</head>
	
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

.label{
	 width: 10%;
	 
    margin: 4px;
    display: inline-block;
	

}

label{
	font-weight:bold;
	margin:7px;
	
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
  #heading1{
	  margin-right:20px;
color : #002db3;
font-weight:bold;
font-size:30px;
 }
  #heading2{
	  margin-right:20px;
	 color: black;
	 font-weight:bold;
	 font-size:15px;
 }
  #heading3{
	  margin-right:20px;
	 color: purple;
	 font-weight:bold;
	 font-size:15px;

 }
  #heading4{
	 color: purple;
	 font-weight:bold;
	 font-size:15px;
	 
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
$epr='';
if(isset($_GET['epr']))
	$epr=$_GET['epr'];
?>

<form method="post" action='monthlyreport.php?epr=search'>
 <table align='center' class="table1" width="150%">
<tr> 
<td><label>Airline Name </label> <select name="airlinename" style="width:150px;padding:2px;"> 
<option value="QATAR AIRWAYS" >QATAR AIRWAYS</option>
  <option value="ETIHAD AIRWAYS">ETIHAD AIRWAYS</option>
  <option value="OMAN AIRLINE">OMAN AIRLINE</option>
  <option value="GULF AIRLINE">GULF AIRLINE</option>
  <option value="GULF AIRLINE">CARGOLUX</option>
  <option value="NON-SCH">NON-SKD</option>
 <option value="ALL">ALL</option>
</select>
<label>Year</label><input type="text" style="width:90px;" name="search_year">
 <input type="submit" name="submit" value="Search" /> </td> <td></td> </tr>
		   </form>
		
		   </table>
<div id="jquery-script-menu">
<div class="jquery-script-center">

</head>
<!--<div class="jquery-script-ads"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<!--<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
<div class="jquery-script-clear"></div>
</div>
</div>-->
    <!--<h1 style="margin:150px auto 30px auto; text-align:center; color:#fff;"></h1>-->

<?php
if($epr=='search'){
$searchairline=$_POST['airlinename'];
$searchyear=$_POST['search_year'];

		 echo "   <div id='row'>
		<div style='border-bottom:1px solid #ccc;'>	<span id='heading1'>Airline : ".$searchairline." </span><br><span id= 'heading2'> Year: ".$searchyear." </span> </div>
<table align ='center' class ='table' border='1' cellspacing='0' cellpadding='0' width='150%' id='table' style='border-spacing:0px 5px; border-collapse: separate;'>
<thead>
<th>Month</th>
<th>Total Flights</th>
<th>Dly Due GHA</th>
<th>OTP</th>
</thead>";			 

$query = "SELECT *,count(arr_flight_no) as flights, MONTHNAME(arr_flight_date) as month,(SELECT Count(*) FROM flight_performance WHERE dep_status = 'DELAY RAS' AND MONTHNAME(arr_flight_date) = month ) as delayras FROM flight_performance WHERE YEAR(arr_flight_date)='$searchyear'  GROUP BY MONTH(arr_flight_date) ";

//echo $query;
$myquery=mysql_query($query);
//echo $sql;
$totalflightsdelayRAS = 0;
$totalflights=0;
$OTP =0;
while ($row=mysql_fetch_array($myquery)){
	echo "<tr>
	<td>".$row['month']."</td>
	<td>".$row['flights']."</td>
	<td>".$row['delayras']."</td>";	
			$totalflights = $row['flights'];
			$totalflightsdelayRAS =  $row['delayras'];
			$OTP =(($totalflights-$totalflightsdelayRAS)/$totalflights)*100;
	echo "<td>".$OTP."</td>	</tr> ";
}
}?>
    <div id="chart">
      <ul id="numbers">
        <li><span>100%</span></li>
        <li><span>90%</span></li>
        <li><span>80%</span></li>
        <li><span>70%</span></li>
        <li><span>60%</span></li>
        <li><span>50%</span></li>
        <li><span>40%</span></li>
        <li><span>30%</span></li>
        <li><span>20%</span></li>
        <li><span>10%</span></li>
        <li><span>0%</span></li>
      </ul>
      <ul id="bars">
        <li><div data-percentage="56" class="bar"></div><span>Option 1</span></li>
        <li><div data-percentage="33" class="bar"></div><span>Option 2</span></li>
        <li><div data-percentage="54" class="bar"></div><span>Option 3</span></li>
        <li><div data-percentage="94" class="bar"></div><span>Option 4</span></li>
        <li><div data-percentage="44" class="bar"></div><span>Option 5</span></li>
        <li><div data-percentage="23" class="bar"></div><span>Option 6</span></li>
      </ul>
    </div>
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
	//formatDate:'Y/m/d',
	//minDate:'-1970/01/02', // yesterday is minimum date
	//maxDate:'+1970/01/02' // and tommorow is maximum date calendar
})

</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>
