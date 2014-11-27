<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//return trip details
			get_trip_details();
			break;
		case 2:
			//updates the trip details
			update_trip();
			break;
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";	
	}
	
	//returns trip details, query's the database, using an id parameter
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
	
		//updates trip details, given an id parameter and other parameters that are required to update the trip details
		//which include trip date, trip name, departure time, current location, current time, next location, next arrival time
	function update_trip(){
		$id=get_datan('id');
		$s=get_data('cd');
		$p=get_data('tn');
		$l=get_data('dt');
		$r=get_data('cs');
		$f=get_data('ct');
		$y=get_data('ns');
		$u=get_data('nt');
		if(!$id)
		{
		//return error message
		echo "{";
		echo jsonn("result",0). ",";
		echo jsons("message", "id not correct");
		echo "}";
		return;
		}
		include_once("ash_transit.php");
		$obj=new ash_transit();
		$update=$obj->update_trip($id,$s,$p,$l,$r,$f,$y,$u);
		if($update){
		echo "{";
		echo jsonn("result",1). ",";
		echo jsons("message","Updated");
		echo "}";
		}
		else{
		echo "{";
		echo jsonn("result",0). ",";
		echo jsons("message","id not correct");
		echo "}";
		echo mysql_error();
		}
	}
?>