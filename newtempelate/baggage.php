<?php
error_reporting(1);
$first=$_POST['fp'];
$last=$_POST['lp'];
$property=$_POST['property'];
$remarks=$_POST['remarks'];
$fim=$_POST['fim'];
$miss=$_POST['miss'];
$ahl=$_POST['ahl'];
$ohd=$_POST['ohd'];
$rxt=$_POST['rxt'];
$um=$_POST['um'];
$yp=$_POST['yp'];
$depu=$_POST['depu'];
$deputext=$_POST['depu_remarks'];
$oc=$_POST['oc'];
$inaad=$_POST['inaad'];
$inaadtext=$_POST['inaad_remarks'];
function reformTime($date, $from_format = 'H:i', $to_format = 'H:i:s') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
$first_p=reformTime($first);
$last_p=reformTime($last);
  mysql_connect("localhost", "root", "") or die(mysql_error());
     mysql_select_db("rfop")or die(mysql_error());
     $sql="INSERT INTO flight_performance(first_piece,last_piece,found_property,found_property_remarks,FIM,missing,ahl,ohd,rxt,um,yp,depu,depu_remarks,oc,inad,inad_remarks)VALUES('$first_p','$last_p','$property','$remarks','$fim','$miss','$ahl','$ohd','$rxt','$um','$yp','$depu','$deputext','$oc','$inaad','$inaadtext')";
               	mysql_query($sql);
				echo "updated";						
               	?>