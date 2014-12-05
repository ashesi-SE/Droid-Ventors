<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//new complaint
			add_complaint();
			break;
		case 2:
			//get complaint
			get_complaints_per_category();
			break;
		case 3:
			//get persons per location in each category
			get_location();
			break;
		case 4:
			//get issues for each location
			get_issues();
			break;
			
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";	
	}
	
	//add a new complaint
	function add_complaint(){
		$n=get_data('na');
		$c=get_data('ca');
		$i=get_data('is');
		$l=get_data('lo');
	
		include_once("crs.php");
		$obj=new crs();
		$add=$obj->complaint($n,$c,$i,$l);
		if($add){
		echo "{";
		echo jsonn("result",1). ",";
		echo jsons("message","complaint successfully registered");
		echo "}";
		}
		else{
		echo "{";
		echo jsonn("result",0). ",";
		echo jsons("message","Complaint cannot be sent");
		echo "}";
		echo mysql_error();
		}
		}
		
		// get complaints by category
	function get_complaints_per_category(){
		$n=get_data('na');
		include_once("crs.php");
		$obj=new crs();
		$obj->get_total_report($n);
		$g=$obj->fetch();
		echo "{";
			echo jsonn("result",1) .",";
			echo '"count":';
			print_r(json_encode($g));
			echo "}";
		
		}
		
	//get persons per location in each category
	function get_location(){
		$n=get_data('na');
		include_once("crs.php");
		$obj=new crs();
		$obj->get_persons_per_location($n);
		$g=$obj->fetch();
		echo "{";
			echo jsonn("result",1) .",";
			echo '"location":';
			$s=Array();
			do{
			array_push($s, $g);
			$g=$obj->fetch();
			}while($g);
			print_r(json_encode($s));
			echo "}";
	}
	
	//get issues in each category
	function get_issues(){
		$n=get_data('na');
		include_once("crs.php");
		$obj=new crs();
		$obj->get_issues_per_category($n);
		$g=$obj->fetch();
		echo "{";
			echo jsonn("result",1) .",";
			echo '"issues":';
			$s=Array();
			do{
			array_push($s, $g);
			$g=$obj->fetch();
			}while($g);
			print_r(json_encode($s));
			echo "}";
	}
?>