<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//method to get trip details
			get_trip_details();
			break;
			
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";	
	}
	
	/** get trip details from the database. takes an id as a parameter
	returns trip details based on trip id. **/
	function get_trip_details(){
		$n=get_datan('n');
		
		include_once("ash_transit.php");
		$obj=new ash_transit();
		$row=$obj->get_trip_details($n);
		if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","trip not found");
			echo mysql_error();
			echo "}";
			return;
		}
		
		echo "{";
			echo jsonn("result",1) .",";
			echo '"trip":{';
			echo jsonn("id",$n).",";
			echo jsons("trip_name",$row['name']).",";
			echo jsons("departure_time",$row['departureTime']).",";
			echo jsons("last_stop",$row['currentTransitLocation']).",";
			echo jsons("next_stop",$row['nextTransitLocation']).",";
			echo jsons("date",$row['date']).",";
			echo jsons("last_bus_stop_time",$row['lastBusStopTime']).",";
			echo jsons("next_bus_stop_time",$row['nextBusStopTime']);
			echo "}";
			echo "}";
		
	}
?>