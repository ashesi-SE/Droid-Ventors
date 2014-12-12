<?php
	include_once("adb.php");
	
	class tripdetails extends adb{
		function tripdetails(){
			adb::adb();
		}
		/**
		*
		*@return if successful true else false
		*/
		
		
		
		function addtrips($tripname,$busCapacity,$adminsCapacity,$availableSeats,$numPeopleReserved) {
			// the SQL query to insert trip details
			
			$query="insert into tripdetails set setDepartureTime=current_time(),t_date=curDate(),t_name='$tripname',busCapcity='$busCapacity',adminCapacity='$adminsCapacity',
      avaliableSeats='$availableSeats',numPeopleReserved='$numPeopleReserved'";
     
			return $this->query($query);
		}


		function editTrips($availableSeats,$previous) {
			// the SQL query to insert trip details
			
			$query="UPDATE tripdetails
SET avaliableSeats='$availableSeats'
WHERE t_date=curDate() and avaliableSeats='$previous'";
     
			return $this->query($query);
		}
	}
		?>