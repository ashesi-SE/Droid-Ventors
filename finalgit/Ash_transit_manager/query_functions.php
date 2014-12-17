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
		
			$query="select * from busers where name='$name1' and password='$password1'";

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

		function getUsers(){
			$query="select * from busers where role = 'passenger' or role = 'conductor'";
			return $this->query($query);
		}

		function addToUsers($uname, $password, $phone, $ashid){
			$query="insert into busers set name='$uname', password='$password', phone_no='$phone', role='passenger', ash_id='$ashid'";
			return $this->query($query);
		}

		function update_conductor($id){
			$conductor="conductor";
			$passenger="passenger";
				
			$query = "update busers set role ='$passenger' where role='$conductor'";
				
				
				if(!$this->query($query))
				{
					return false;
				}
			// $resultA = $this->query($query1);
			// $resultB = $this->query($query2);

			// $resultC = $resultA. "and" .$resultB;

			$query = "update busers set role ='$conductor' where id=$id";
			        if(!$this->query($query))
				{
					return false;
				}
					return $this->query($query);
				
				
		}
	}
		
?>