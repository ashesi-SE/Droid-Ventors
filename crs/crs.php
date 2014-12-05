<?php
	include_once("adb.php");
	
	class crs extends adb{
		function crs(){
			adb::adb();
		}
	
		
		/**
		*Add new report 
		*/
		function complaint($n,$c,$i,$l){
			//write the SQL query and call $this->query()
			$query = "INSERT INTO complaints (reporter_name,category,issue,location) VALUES ('$n','$c','$i','$l')";
			return $this->query($query);
		}
		
		/**
		*   returns total number of reports per category
		*/
		function get_total_report($category_name){
			//write the SQL query and call $this->query()
			$query = "select count(*) as total from complaints where category='$category_name'";
			return $this->query($query);
		}
		
		/**
		*   returns total persons per location in  each category
		*/
		function get_persons_per_location($category_name){
			//write the SQL query and call $this->query()
			$query = "select distinct location, count( location) as persons from complaints where category='$category_name' group by location";
			return $this->query($query);
		}
		
		/**
		*   returns issues from each category
		*/
		function get_issues_per_category($category_name){
			//write the SQL query and call $this->query()
			$query = "select reporter_name,issue from complaints where category='$category_name' order by cid desc limit 20";
			return $this->query($query);
		}
			
	}
?>