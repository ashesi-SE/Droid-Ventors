<?php

	include_once("gen.php");
	$cmd=get_datan("cmd");
	
	switch($cmd){

		//Command for checking the username and password from the user
		case 1:
			check_user();
			break;
		case 2:
			getCurReport();
			break;
		case 3:
			getReport();
			break;
		case 4:
			getReservations();
			break;
		case 5:
			updateConductor();
			break;
		case 6:
			addToUsers();
			break;
		case 7:
			getUsers();
			break;

		default:
			echo jsonn("result", 0). ",";
			echo jsons("message","unknown command");
			echo "}";
	}

	//Json check_user function
	function check_user() {
		include ("query_functions.php");
		$name1 = get_data("name");
		$password1 = get_data("password");
		$role = get_data("role");
		$ba = new query_functions();
		$row = $ba -> check_user($name1, $password1);

		if (!$row) {
			// echo mysql_error();
			// echo "{";
			// echo jsonn("result", 0). ",";
			// echo jsons("message", "invalid user");
			// echo "}";
			echo 0;
		}
		else {
			echo "{";
			echo jsonn("result", 1) . ",";
			echo '"users":{';
			echo jsonn("id", $row['id']). ",";
			echo jsons("name1", $row['name']). ",";
			echo jsons("password1", $row['password']). ",";
			echo jsons("role1", $row['role']);
			echo "}";
			echo "}";
		}

			
			
	}

	function getUsers() {
		include ("query_functions.php");
		$ubd = new query_functions();
		$ubd -> getUsers();

		$row = $ubd ->fetch();
		if (!$row) {
			echo "{";
			echo jsonn("result", 0). ",";
			echo jsons("message", "no users found");
			echo "}";
			return;
		}

		echo "{";
		echo '"myashtrans":';
		$det=Array();
		do
		{
			array_push($det, $row);
			$row=$ubd->fetch();
		}
		while($row);
		print_r(json_encode($det));
		echo "}";
	}

	function addToUsers() {
		include ("query_functions.php");
		$ubd = new query_functions();
		$un = get_data("un");
		$ps = get_data("ps");
		$ph = get_data("ph");
		$aid = get_datan("aid");

		if (!$ubd -> addToUsers($un, $ps, $ph, $aid)) {
			echo mysql_error();
			// echo '{"result":0, "message":"error registering delegate"}';
			echo 0;
		}

		else {
			echo 1;
		}
	}

	function getCurReport() {
		include ("query_functions.php");
		$kmd = new query_functions();
		$kmd -> getCurReport();

		$row = $kmd ->fetch();
		if (!$row) {
			echo "{";
			echo jsonn("result", 0). ",";
			echo jsons("message", "report not found");
			echo "}";
			return;
		}

		echo "{";
		echo '"myashtrans":';
		$det=Array();
		do
		{
			array_push($det, $row);
			$row=$kmd->fetch();
		}
		while($row);
		print_r(json_encode($det));
		echo "}";

	}

	function getReport() {
		include ("query_functions.php");
		$kmd = new query_functions();
		$kmd -> getReport();

		$row = $kmd ->fetch();
		if (!$row) {
			echo "{";
			echo jsonn("result", 0). ",";
			echo jsons("message", "reports not found");
			echo "}";
			return;
		}

		echo "{";
		echo '"myashtrans":';
		$det=Array();
		do
		{
			array_push($det, $row);
			$row=$kmd->fetch();
		}
		while($row);
		print_r(json_encode($det));
		echo "}";

	}

	function getReservations() {
		include ("query_functions.php");
		$kmd = new query_functions();
		$kmd -> getReservations();

		$row = $kmd ->fetch();
		if (!$row) {
			echo "{";
			echo jsonn("result", 0). ",";
			echo jsons("message", "reservations not found");
			echo "}";
			return;
		}

		echo "{";
		echo '"myashtrans":';
		$det=Array();
		do
		{
			array_push($det, $row);
			$row=$kmd->fetch();
		}
		while($row);
		print_r(json_encode($det));
		echo "}";

	}

	function updateConductor(){
		include ("query_functions.php");
		$kmd = new query_functions();
        $id= get_datan('id');
		
		
		if(!$id){
		//display message
			// echo'{"result":0,"message":"not working"}';
			echo 0;
		return;
		}
                        
		if(!$kmd->update_conductor($id))
		{
		// echo'{"result":0,"message":"unable to update"}';
		echo 0;
		// return;
		}
		// echo'{"result":1,"message":"One item has sucessfully been updated successfully"}';
		echo 1;
        }

?>