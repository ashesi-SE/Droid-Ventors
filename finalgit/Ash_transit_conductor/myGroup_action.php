<?php
/*
 *Author Esi Yeenuwa Yeboah 
 * Software Engineering Project
 */


include("gen.php");
    $cmd=get_datan("cmd");//get datan makes sure that the browser does not show any responses
	//echo "are u called";
switch($cmd){
		case 1:
                //changes the role of the conductor
                updateConductor();
                break;
                case 2:
                //Updates the pick up time of bus stops along the route
                updateTime();
                break;
                  case 3:
                //returns details of people who have boodked for a paticular day
                viewBooking();
                break;
                   case 4:
                //gets all the details of a selected person
                getDetails();
                break;
                 case 5:
                //Updates the current locatin of a user
                updateLocation();
                break;
                case 6:
                //Updates the current locatin of a user
                get_user();
                break;
            default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";
	}
        
        //changes the conductor role
        function updateConductor(){
            $id= get_datan('id');
		
		
		if(!$id){
		//display message
			echo'{"result":0,"message":"not working"}';
		return;
		}
		include ("myGroup_function.php");
			$g=new bus();
                        
		if(!$g->update_conductor($id))
		{
		echo'{"result":0,"message":"unable to update"}';
		return;
		}
		echo'{"result":1,"message":"One item has sucessfully been updated successfully"}';
        }
        
        //Updates the pick up time of bus stops along the route
        function updateTime(){
             $id= get_datan('id');
          
             if(!get_datan('id')){
		//display message
                    echo'{"result":0,"message":"Sorry, an error occured. Please try again"}';
		return;
		}
                include ("myGroup_function.php");
			$g=new bus();
                        
		if(!$g->myTime($id))
		{
		     echo'{"result":0,"message":"unable to update"}';
		return;
		}
                    echo'{"result":1,"message":"Bus location sucessfully updated"}';
        }
        
        //returns details of people who have boodked for a paticular day
        function viewBooking(){
   
            //creates an object of the growing class
		include("myGroup_function.php");
                
                $obj = new bus();
			//calls the querry that shows the details of a child
			$row=$obj->listAll();
	
			if(!$row){
                            
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","Details not found");
			echo "}";
			return;
		}
               
                 $json=array();
                    while($row=$obj->fetch()){
                        $json['bookings'][]=$row;  
                    }
                echo json_encode($json);	
        
        }
         //gets all the details of a selected person
        function getDetails(){
                include("myGroup_function.php");
               $id=get_datan('pid');
               //$myTrip=get_data("trip");
                $obj = new bus();
            		//calls the querry that shows the details of a child
			$row=$obj->moreDetails($id);
	
			if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","Details not found");
			echo "}";
			return;
		}
                
                 $json=array();
                    while($row=$obj->fetch()){
                        $json['bookings'][]=$row;  
                    }
                echo json_encode($json);
        }
        
       //Updates the location of a the bus 
        function updateLocation(){
            $location= get_data('location');
		
		if(!get_data('location')){
		//display message
                    echo'{"result":0,"message":"Sorry, an error occured. Please try again"}';
		return;
		}
		include ("myGroup_function.php");
			$g=new bus();
                        
		if(!$g->update_location($location))
		{
		 
                    echo'{"result":0,"message":"unable to update"}';
		return;
		}
                    echo'{"result":1,"message":"Bus location sucessfully updated"}';
        }
        
        //get a user by passing parameters ashesi id and a unique password
	function get_user(){
		$ashid=get_data('myashid');
		$pword=get_data('mypword');
		include ("myGroup_function.php");
		$obj=new bus();
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
      
	
?>