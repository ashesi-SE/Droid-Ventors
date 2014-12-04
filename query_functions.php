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
	}
		
?>