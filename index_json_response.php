<?php

	include_once("gen.php");
	$cmd=get_datan("cmd");
	
	switch($cmd){

		//Command for checking the username and password from the user
		case 1:
			check_user();
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
			echo mysql_error();
			echo "{";
			echo jsonn("result", 0). ",";
			echo jsons("message", "invalid user");
			echo "}";
			return;
		}

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
?>