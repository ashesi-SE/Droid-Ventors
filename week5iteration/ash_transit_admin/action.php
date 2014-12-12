<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//add a new user
			addtrip();
			break;
			case 2:
			//add a new user
			editTrips();
			break;
			}
	
	
	function addtrip(){
		include_once("tripdetails.php");
			//getting values of variables from command 1
		$tripname=get_data("tripname");
		$busCapacity=get_data("busCapacity");
		$adminsCapacity=get_data("adminsCapacity");
		$availableSeats=get_data("availableSeats");
		$numPeopleReserved=get_data("numPeopleReserved");

		$v=new tripdetails();
		//calls addTrips() function to add to database
		if(!$v->addtrips($tripname,$busCapacity,$adminsCapacity,$availableSeats,$numPeopleReserved)){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","cannot add trip");
			echo "}";
			return;
		}
		
		 echo "{";
			echo jsonn("result",1) .",";
			echo jsons("message","trip added");
			echo "}";
			return;
		}


		function editTrips(){
		include_once("tripdetails.php");
			//getting values of variables from command 1
		
		$availableSeats=get_data("availableSeats");
		$previous=get_data("previous");

		$v=new tripdetails();
		//calls addTrips() function to add to database
		if(!$v->editTrips($availableSeats,$previous)){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","cannot edit seats");
			echo "}";
			return;
		}
		
		 echo "{";
			echo jsonn("result",1) .",";
			echo jsons("message","seats edited");
			echo "}";
			return;
		}