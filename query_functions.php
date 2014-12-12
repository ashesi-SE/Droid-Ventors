<?php
	include_once("adb.php");
	
	class query_functions extends adb{
		function query_functions(){
			adb::adb();
		}
		/**
		*@return if successful true else false
		*/

		//Function to call the SQL query from the database
		function check_user($name1, $password1){
		
			$query="select * from users where name='$name1' and password='$password1'";

			 if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}

		function getCurReport(){
			$query="select * from tripdetails where date=CURDATE()";
			return $this->query($query);
		}

		function getReport(){
			$query="select * from tripdetails";
			return $this->query($query);
		}

		function getReservations(){
			$query="select * from bookingdetails";
			return $this->query($query);
		}

		function update_conductor($id){
			$conductor="conductor";
			$passenger="passenger";
				
			$query = "update users set role ='$passenger' where role='$conductor'";
				
				
				if(!$this->query($query))
				{
					return false;
				}
				$query = "update users set role ='$conductor' where ash_id=$id";
			        if(!$this->query($query))
				{
					return false;
				}
					return $this->query($query);
				
				
		}
	}
		
?>