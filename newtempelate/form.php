	<?php
error_reporting(1);
$airline=$_POST['airline'];
$adate=$_POST['adate'];
$aacreg=$_POST['a-ac-reg'];
$flightnum=$_POST['a-flight-num'];
$aactype=$_POST['a-ac-type'];
$asta=$_POST['asta'];
$aata=$_POST['aata'];
$aflightstatus=$_POST['aflightstatus'];
$astatusrem=$_POST['astatus-remarks'];
//$agrnd=$_POST['agrnd'];
//$agrndrem=$_POST['agrnd-remarks'];
$apaxbus=$_POST['apax-bus'];
$apaxeco=$_POST['apax-eco'];
$ainfant=$_POST['ainfant'];
$awheelchair=$_POST['awheelchair'];
$awheelchairrem=$_POST['awheelchair-remarks'];
$acargo=$_POST['acargo'];
$amail=$_POST['amail'];
$aremarks=$_POST['aremarks'];




$dstd=$_POST['dstd'];
$datd=$_POST['datd'];
$dflightstatus=$_POST['dflightstatus'];
$dpaxbus=$_POST['dpax-bus'];
$dpaxeco=$_POST['dpax-eco'];
$dinfant=$_POST['dinfant'];
$dwheelchair=$_POST['dwheelchair'];
$dwheelchairremarks=$_POST['dwheelchair-remarks'];
$dcargo=$_POST['dcargo'];
$dmail=$_POST['dmail'];
$dhirein=$_POST['dhire-in'];
$dremarks=$_POST['dremarks'];
//$dgrnd=$_POST['dgrnd'];
//$dgrndrem=$_POST['dgrnd-remarks'];
$dum=$_POST['dum'];
$dyp=$_POST['dyp'];
$ddepu=$_POST['ddepu'];
$dinaad=$_POST['dinaad'];



$first=$_POST['fp'];
$last=$_POST['lp'];
$property=$_POST['property'];
$bremarks=$_POST['bremarks'];
$fim=$_POST['fim'];
$miss=$_POST['miss'];
$ahl=$_POST['ahl'];
$ohd=$_POST['ohd'];
$rxt=$_POST['rxt'];
$bum=$_POST['bum'];
$byp=$_POST['byp'];
$bdepu=$_POST['bdepu'];
$deputext=$_POST['depu_remarks'];
$oc=$_POST['oc'];
$binaad=$_POST['binaad'];
$inaadtext=$_POST['inaad_remarks'];
	function reformatDate($date, $from_format = 'd/m/Y', $to_format = 'Y-m-d') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
	}
$adatenew= reformatDate($adate);
function reformTime($date, $from_format = 'H:i', $to_format = 'H:i:s') {
    $date_aux = date_create_from_format($from_format, $date);
    return date_format($date_aux,$to_format);
}
$dstdnew=reformTime($dstd);
$datdnew=reformTime($datd);
$first_p=reformTime($first);
$last_p=reformTime($last);
$newasta=reformTime($asta);
$newaata=reformTime($aata);
  mysql_connect("localhost", "root", "") or die(mysql_error());
     mysql_select_db("rfop")or die(mysql_error());
     $sql="INSERT INTO flight_performance(airline_name,arr_flight_date,aircraft_reg,arr_flight_no,flight_type,arr_schedule_time,arr_actual_time,arr_status,arr_status_remarks,arr_passengers_business,arr_passengers_economy,arr_infants,arr_wheelchairs,arr_wheelchair_remarks,arr_cargo,arr_po_mail,arr_remarks,dep_schedule_time,dep_actual_time,dep_status,dep_passengers_business,dep_passengers_economy,dep_infants,dep_wheelchairs,dep_wheelchair_remarks,dep_cargo,dep_po_mail,dep_remarks,dep_hirein,dep_um,dep_yp,dep_depu,dep_inaad,first_piece,last_piece,found_property,found_property_remarks,FIM,missing,ahl,ohd,rxt,um,yp,depu,depu_remarks,oc,inad,inad_remarks)VALUES('$airline','$adatenew','$aacreg','$flightnum','$aactype','$newasta','$newaata','$aflightstatus','$astatusrem','$apaxbus','$apaxeco','$ainfant','$awheelchair','$awheelchairrem','$acargo','$amail','$aremarks','$dstdnew','$datdnew','$dflightstatus','$dpaxbus','$dpaxeco','$dinfant','$dwheelchair','$dwheelchairremarks','$dcargo','$dmail','$dremarks','$dhirein','$dum','$dyp','$ddepu','$dinaad','$first_p','$last_p','$property','$bremarks','$fim','$miss','$ahl','$ohd','$rxt','$bum','$byp','$bdepu','$deputext','$oc','$binaad','$inaadtext')";
               mysql_query($sql);
				echo 'updated';
			
               	?>