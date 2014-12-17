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
			insert_trip();
			break;
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";	
	}
	
	//returns trip details, query's the database, using an id parameter
	function get_trip_details(){
		$n=get_data('n');
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
	function insert_trip(){
		$name=get_data('name');
		$time=get_data('time');
		$date=get_data('date');
		$bus_c=get_data('bus_c');
		$admin_c=get_data('admin_c');
		$avail_s=get_data('avail_s');
		
		include_once("ash_transit.php");
		$obj=new ash_transit();
		
		if(!$obj->insert_trip($name,$time,$date,$bus_c,$admin_c,$avail_s)){
		echo "{";
			echo '"booking":{';
			//echo jsonn("result",0). ",";
			echo jsons("message","Trip cannot be added");
			echo mysql_error();
			echo "}";
			echo "}";
			return;
		}
		else{
			echo "{";
			echo jsonn("result",1) .",";
			echo '"book":{';
			echo jsons("message","Trip successfully added");
			echo "}";
			echo "}";
		}
	}
?>