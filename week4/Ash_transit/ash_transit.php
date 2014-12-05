<?php
	include_once("adb.php");
	
	class ash_transit extends adb{
		function ash_transit(){
			adb::adb();
		}
	
		
		/**
		*queries database and returns tripdetails
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
		*queries database and returns morning trip durations from one location to the other
		*/
		function get_morning_transit_times(){
			//write the SQL query and call $this->query()
			$query = "select * from expecteddurationmorning";
			return $this->query($query);
		}
		
		/**
		*queries database and returns afternoon trip durations from one location to the other
		*/
		function get_afternoon_transit_times(){
			//write the SQL query and call $this->query()
			$query = "select * from expecteddurationafternoon";
			return $this->query($query);
		}
		
		/**
		*queries database and returns user details
		*/
		function get_user_details($uAshId,$uPassword){
			//write the SQL query and call $this->query()
			$query = "select * from users where ash_id=$uAshId and password=$uPassword";
			return $this->query($query);
		}
		
		/**
		*	Query to insert a new reservation
		*/
		function add_reservation($pn,$ashid,$pnum,$tripname,$destina,$date){
			//write the SQL query and call $this->query()
			$query = "INSERT INTO bookingdetails (name,ash_id,phone,t_name,destination,t_date) VALUES ('$pn','$ashid','$pnum','$tripname','$destina','$date')";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		
	}
	
	//$obj=new ash_transit();
	//print_r ($obj->get_morning_transit_times());
?>