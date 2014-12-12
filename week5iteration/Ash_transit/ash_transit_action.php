<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//method to get trip details
			get_trip_details();
			break;
		case 2:
			//method to get the morning trip transit details
			get_morning_transit();
			break;
		case 3:
			//method to get the afternoon trip transit details
			get_afternoon_transit();
			break;
		case 4:
			//method to users of the application
			get_user();
			break;
		case 5:
			//method to reserve a seat
			add_booking();
			break;
		case 6:
			update_trip();
			break;
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";	
	}
	
	/** get trip details from the database. takes an id as a parameter
	returns trip details based on trip id. **/
	function get_trip_details(){
		include_once("ash_transit.php");
		$obj=new ash_transit();
		$row=$obj->get_trip_details();
		if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","trip not found");
			echo mysql_error();
			echo "}";
			return;
		}	
		echo "{";
			echo jsonn("result",1) .",";
			echo '"trip":{';
			echo jsons("trip_name",$row['t_name']).",";
			echo jsons("departure_time",$row['setDepartureTime']).",";
			echo jsons("date",$row['t_date']).",";
			echo jsons("bus_capacity",$row['busCapcity']).",";
			echo jsons("admin_capacity",$row['adminCapacity']).",";
			echo jsons("available_seats",$row['avaliableSeats']).",";
			echo jsons("numPeopleReserved",$row['numPeopleReserved']).",";
			echo jsons("current_location",$row['currentlocation']);
			echo "}";
			echo "}";
	}
	
	//get the morning tranist details. 
	function get_morning_transit(){
		include_once("ash_transit.php");
		$obj=new ash_transit();
		$obj->get_morning_transit_times();
		$row=$obj->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "Morning Trip Itenary not found");
		echo "}";
		return;
		}
		echo "{";
			echo jsonn("result",1) .",";
			echo '"morning_transit_details":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$obj->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
	}
	
	// get the afternoon transit details
	function get_afternoon_transit(){
		include_once("ash_transit.php");
		$obj=new ash_transit();
		$obj->get_afternoon_transit_times();
		$row=$obj->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "Afternoon Trip itenary not found");
		echo "}";
		return;
		}
		echo "{";
			echo jsonn("result",1) .",";
			echo '"Afternoon_transit_details":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$obj->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
	
	}
	
	//get a user by passing parameters ashesi id and a unique password
	function get_user(){
		$ashid=get_data('myashid');
		$pword=get_data('mypword');
		include_once("ash_transit.php");
		$obj=new ash_transit();
		$obj->get_user_details($ashid,$pword);
		$row=$obj->fetch();
		if(!$row){
			echo "{";
			echo '"User":{';
			//echo jsonn("result",0). ",";
			echo jsons("message","user not found");
			echo "}";
			echo "}";
			return;
		}	
		echo "{";
			echo jsonn("result",1) .",";
			echo '"User":{';
			//echo jsonn("id",$n).",";
			echo jsons("name",$row['name']).",";
			echo jsonn("Ashesi_Id",$row['ash_id']).",";
			echo jsons("phone_number",$row['phone_no']).",";
			echo jsons("role",$row['role']).",";
			echo jsons("password",$row['password']);
			echo "}";
			echo "}";
	}
	
	//gets the passenger name, ashesi id, phone number, trip name, pick up location and a date. then stores into the reservations table
	function add_booking(){
		$pna=get_data('pname');
		$mai=get_data('myashid');
		$pno=get_data('pnumber');
		$tname=get_data('tName');
		$pu=get_data('pick_up');
		//$s=get_data('seats');
		$md=get_data('mydate');
		
		include_once("ash_transit.php");
		$obj=new ash_transit();
		
		
		
		if(!$obj->add_reservation($pna,$mai,$pno,$tname,$pu,$md)){
		echo "{";
			echo '"booking":{';
			//echo jsonn("result",0). ",";
			echo jsons("message","Reservation was not successful");
			echo mysql_error();
			echo "}";
			echo "}";
			return;
		}
		 $url = "http://api.smsgh.com/v3/messages/send?"
    . "From=Unity"
    . "&To=%2B233249931596"
    . "&Content=Your+reservation+was+successful"
    . "&ClientId=odfbifrp"
    . "&ClientSecret=rktegnml"
    . "&RegisteredDelivery=true";
	 // Fire the request and wait for the response
	 $response = file_get_contents($url) ;
	 var_dump($response);
		
		echo "{";
			echo jsonn("result",1) .",";
			echo '"book":{';
			echo jsons("message","Reservation successful");
			echo "}";
			echo "}";
			

	}
	
	//gets the passenger name, ashesi id, phone number, trip name, pick up location and a date. then stores into the reservations table
	function update_trip(){
		$s=get_datan('seat');
		
		
		include_once("ash_transit.php");
		$obj=new ash_transit();
		
		$row=$obj->update_trip($s);
		
		if($row){
		echo "{";
		echo jsonn("result",1). ",";
		echo jsons("message","update successful");
		echo "}";
		}
		else{
		echo "{";
		echo jsonn("result",0). ",";
		echo jsons("message","Reservation couldn't be completed");
		echo "}";
		echo mysql_error();
		}
	
	}
	
?>