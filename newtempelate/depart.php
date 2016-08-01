<?php
error_reporting(1);

$date=$_POST['date'];
$reg=$_POST['ac-reg'];
$flightnum=$_POST['flight-num'];
$typeofac=$_POST['ac-type'];
$std=$_POST['std'];
$atd=$_POST['atd'];
$isearly=$_POST['isearly'];
$isdelay=$_POST['isdelay'];
$isdelayras=$_POST['isdelayras'];
$ontime=$_POST['ontime'];
$grnd=$_POST['grnd'];
$grndrem=$_POST['grnd-remarks'];
$paxbus=$_POST['pax-bus'];
$paxeco=$_POST['pax-eco'];
$infant=$_POST['infant'];
$wheelchair=$_POST['wheelchair'];
$wheelchairremarks=$_POST['wheelchair-remarks'];
$um=$_POST['um'];
$yp=$_POST['yp'];
$depu=$_POST['depu'];
$inaad=$_POST['inaad'];
$cargo=$_POST['cargo'];
$mail=$_POST['mail'];
$hirein=$_POST['hire-in'];
$remarks=$_POST['remarks'];
	function reformatDateTime($date, $from_format = 'Y/m/d H:i', $to_format = 'Y-m-d H:i:s') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
	function reformatDate($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
$stdnew=reformatDateTime($std);
$atdnew=reformatDateTime($atd);
$datenew= reformatDate($date);
//$department=$_POST['department'];
//$role=$_POST['role'];
//$station=$_POST['station'];
//$contact=$_POST['contact'];
//$hash = password_hash($password, PASSWORD_DEFAULT);
  mysql_connect("localhost", "root", "") or die(mysql_error());
     mysql_select_db("rfop")or die(mysql_error());
     $sql="INSERT INTO flight_performance(dep_flight_date,aircraft_reg,dep_schedule_time,dep_actual_time,dep_passengers_business,dep_passengers_economy,dep_infants,dep_wheelchairs,dep_wheelchair_remarks,dep_cargo,dep_po_mail,dep_remarks,dep_hirein,dep_ground_time,dep_ground_time_remarks,dep_um,dep_yp,dep_depu,dep_inaad )VALUES('$datenew','$reg','$stdnew','$atdnew','$paxbus','$paxeco','$infant','$wheelchair','$wheelchairremarks','$cargo','$mail','$remarks','$hirein','$grnd','$grndrem','$um','$yp','$depu','$inaad')";
              // 	mysql_query($sql);
				echo $isearly;	
echo $isdelay;				
               	?>