<?php
include("gen.php");
    $cmd=get_datan("cmd");//get datan makes sure that the browser does not show any responses
	//echo "are u called";
switch($cmd){
		case 1:
                //updates a user in the system to a conductor 
                updateConductor();
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
        
	
?>