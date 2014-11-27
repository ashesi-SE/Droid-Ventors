<?php
include_once("adb.php");
	
	class ash_transit extends adb{
	
		function ash_transit(){
		adb::adb();
		}

		/** php fucntion that updates the role of a user
			it takes an ID parameter, and updates user based on id**/
		function update_conductor($id){
			$conductor="Conductor";
			$passenger="Passenger";
			$query =" update users set role ='$passenger' where role='$conductor'";
			
			if(!$this->query($query))
			{
				return false;
			}
			$query =" update users set role ='$conductor' where ash_id=$id";
				if(!$this->query($query))
			{
				return false;
			}
				return $this->query($query);
			}
  }
?>