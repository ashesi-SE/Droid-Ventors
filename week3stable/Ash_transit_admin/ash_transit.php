<?php
	include_once("adb.php");
	
	class ash_transit extends adb{
		function ash_transit(){
			adb::adb();
		}
	
		
		/**
		*get_details of trip
		*/
		function get_trip_details($n){
			//write the SQL query and call $this->query()
			$query = "select * from tripdetails where tid=$n";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		
		/**
		*updates trip details given parameters including, trip id,
		trip date, trip name, departure time, current location, current time, next location, next arrival time
		*/
		function update_trip($id,$tdate,$tname,$dtime,$cstop,$ctime,$nstop,$ntime){
			$query="update tripdetails set name='$tname',date='$tdate',departureTime='$dtime',currentTransitLocation='$cstop',lastBusStopTime='$ctime',nextBusStopTime='$ntime',nextTransitLocation='$nstop' where tid='$id'";
			return $this->query($query);
		}
			
	}
	
	//$obj=new ash_transit();
	//print_r ($obj->get_trip_details(1));
?>