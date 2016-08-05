	<?php
error_reporting(1);
$date=$_POST['date'];
$reg=$_POST['ac-reg'];
$flightnum=$_POST['flight-num'];
$typeofac=$_POST['ac-type'];
$sta=$_POST['sta'];
$ata=$_POST['ata'];
$isearly=$_POST['isearly'];
$isdelay=$_POST['isdelay'];
$ontime=$_POST['ontime'];
$grnd=$_POST['grnd'];
$grndrem=$_POST['grnd-remarks'];
$paxbus=$_POST['pax-bus'];
$paxeco=$_POST['pax-eco'];
$infant=$_POST['infant'];
$wheelchair=$_POST['wheelchair'];
$wheelchairremarks=$_POST['wheelchair-remarks'];
$cargo=$_POST['cargo'];
$mail=$_POST['mail'];

$remarks=$_POST['remarks'];
	function reformatDateTime($date, $from_format = 'Y/m/d H:i', $to_format = 'Y-m-d H:i:s') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
	function reformatDate($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
$stdnew=reformatDateTime($sta);
$atdnew=reformatDateTime($ata);
$datenew= reformatDate($date);
//$department=$_POST['department'];
//$role=$_POST['role'];
//$station=$_POST['station'];
//$contact=$_POST['contact'];
//$hash = password_hash($password, PASSWORD_DEFAULT);
  mysql_connect("localhost", "root", "") or die(mysql_error());
     mysql_select_db("rfop")or die(mysql_error());
     $sql="INSERT INTO flight_performance(arr_flight_date,aircraft_reg,arr_schedule_time,arr_actual_time,arr_passengers_business,arr_passengers_economy,arr_infants,arr_wheelchairs,arr_wheelchair_remarks,arr_cargo,arr_po_mail,arr_remarks,arr_ground,arr_ground_time_remarks )VALUES('$datenew','$reg','$stanew','$atanew','$paxbus','$paxeco','$infant','$wheelchair','$wheelchairremarks','$cargo','$remarks','$grnd','$grndrem)";
               	mysql_query($sql);
				echo "updated";		
               	?>