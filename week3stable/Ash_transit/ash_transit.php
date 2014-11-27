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
			
	}
	
	//$obj=new ash_transit();
	//print_r ($obj->get_trip_details(1));
?>