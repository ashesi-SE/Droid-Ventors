<?php
include("gen.php");
    $cmd=get_datan("cmd");//get datan makes sure that the browser does not show any responses
	//echo "are u called";
switch($cmd){
		case 1:
                //gets all the child welfare details including the fullname
                updateConductor();
                break;
                case 2:
                //gets all the child welfare details including the fullname
                updateTime();
                break;
                  case 3:
                //gets all the child welfare details including the fullname
                viewBooking();
                break;
            default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";
	}
        
		
		/* this method is passed an id and based on the id calls the
			Update_conductor class and changes the given id to be the new conductor
		*/
        function updateConductor(){
            $id= get_datan('id');
		
		
		if(!$id){
		//display message
			echo'{"result":0,"message":"not working"}';
		return;
		}
		include ("ash_transit.php");
			$g=new ash_transit();
                        
		if(!$g->update_conductor($id))
		{
		echo'{"result":0,"message":"unable to update"}';
		return;
		}
		echo'{"result":1,"message":"Update was Successful"}';
        }
        
        
          /** php fucntion automatically updates the pick up points**/
        function updateTime(){
             $id= get_datan('id');
             $tt= get_data('tripname');
             echo $id;
             echo $tt;
             if(!$id){
		//display message
			echo'{"result":0,"message":"not working"}';
		return;
		}
                include ("myGroup_function.php");
			$g=new bus();
                        
		if(!$g->myTime($tt,$id))
		{
		echo'{"result":0,"message":"unable to update"}';
		return;
		}
            echo'{"result":1,"message":"One item has sucessfully been updated successfully"}';
        }
        
          /** php fucntion that displays a list of all those who have booked**/
        function viewBooking(){
           
            //creates an object of the growing class
		include("myGroup_function.php");
		//$vs=get_data("vs");
                
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
?>