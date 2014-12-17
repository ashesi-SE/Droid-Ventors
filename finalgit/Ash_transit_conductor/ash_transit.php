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
		function insert_trip($tname,$ttime,$tdate,$buscap,$admincap,$availseat){
			$query="INSERT INTO `tripdetails`(`t_name`, `setDepartureTime`, `t_date`, `busCapcity`, `adminCapacity`, `avaliableSeats`)VALUES ('$tname','$ttime','$tdate','$buscap','$admincap','$availseat')";
			return $this->query($query);
		}
			
	}
	
	//$obj=new ash_transit();
	//print_r ($obj->get_trip_details(1));
?>