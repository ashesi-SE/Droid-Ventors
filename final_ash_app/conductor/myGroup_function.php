<?php
include_once("adb.php");
	
	class bus extends adb{
	
		function bus(){
		adb::adb();
		}

//sets the role of a conductor		
function update_conductor($id){
$conductor="conductor";
$passenger="passenger";
	
	$query =" update busers set role ='$passenger' where role='$conductor'";
	
	
	if(!$this->query($query))
	{
		return false;
	}
	$query =" update busers set role ='$conductor' where ash_id=$id";
        if(!$this->query($query))
	{
		return false;
	}
		return $this->query($query);
	
	
	}
  
  //Updates the time of all bus stops
  function myTime($id){
      $tripname;
      $query="select t_name from tripdetails ORDER BY tid Desc Limit 1";
         if(!$this->query($query))
	{
		return false;
	}
		$this->query($query);
                $tripname=$this->fetch();
                $tripname=$tripname['t_name'];
               
	
	
     
      if($tripname=='CTK-ASH'){
                if($id==9){
                    $query="update expecteddurationmorning set setTime=current_time where eid=9";
                    if(!$this->query($query))
                    { 
                        return false;
                    }
                }
                if($id==8){
                    $query="update expecteddurationmorning set setTime=current_time where eid=8";
                    if(!$this->query($query))
                    { 
                        return false;
                    }
                 }
                 if($id==7){
                        $query="update expecteddurationmorning set setTime=current_time where eid=7";
                        if(!$this->query($query))
                        { 
                            return false;
                        }
                    }
                 if($id==6){
                            $query="update expecteddurationmorning set setTime=current_time where eid=6";
                            if(!$this->query($query))
                            { 
                                return false;
                            }
                            }
                  if($id==5){
                                $query="update expecteddurationmorning set setTime=current_time where eid=5";
                                if(!$this->query($query))
                                { 
                                    return false;
                                }
                    }
                    if($id==4){
                                $query="update expecteddurationmorning set setTime=current_time where eid=4";
                                if(!$this->query($query))
                                { 
                                    return false;
                                }
                    }
                  if($id==3){
                             $query="update expecteddurationmorning set setTime=current_time where eid=3";
                             if(!$this->query($query))
                                { 
                                   return false;
                                }
                            }
                   if($id==2){
                            $query="update expecteddurationmorning set setTime=current_time where eid=2";
                                if(!$this->query($query))
                                   { 
                                       return false;
                                   }
                            }
                   if($id==1){
                              $query="update expecteddurationmorning set setTime=current_time where eid=1";
                                   if(!$this->query($query))
                                      { 
                                         return false;
                                      }
                             }
                             
                //$g=new bus();
                     
                if($id<2){
                 
                    $query="select setTime  from expecteddurationmorning where eid=1";
                    $this->query($query);
                    $dataset=$this->fetch();
                    $t=$dataset['setTime'];
                    
                    $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=2";
                    if(!$this->query($query))
                        { 
                        return false;
                        }   
                }
                if($id<3){
                    $query="select setTime  from expecteddurationmorning where eid=2";
                   
                    $this->query($query);
                    $dataset=$this->fetch();
                    $t=$dataset['setTime'];
                
                    $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=3";
                    if(!$this->query($query))
                    { 
                        return false;
                    }   
                }
                
                if($id<4){
                        $query="select setTime from expecteddurationmorning where eid=3";
                   
                        $this->query($query);
                        $dataset=$this->fetch();
                        $t=$dataset['setTime'];
                
                   
                         $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=4";
                         if(!$this->query($query))
                            { 
                                return false;
                            }   
                }      

                    if($id<5){
                             $query="select setTime  from expecteddurationmorning where eid=4";
                   
                             $this->query($query);
                             $dataset=$this->fetch();
                             $t=$dataset['setTime'];
                
                        
                             $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=5";
                             if(!$this->query($query))
                                { 
                                    return false;
                                }   
                    }  
                
                        if($id<6){
                                 $query="select setTime  from expecteddurationmorning where eid=5";
                   
                                 $this->query($query);
                                 $dataset=$this->fetch();
                                 $t=$dataset['setTime'];
                
                                 $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=6";
                                 if(!$this->query($query))
                                    { 
                                        return false;
                                    }   
                        }       
                

                            if($id<7){
                                    $query="select setTime  from expecteddurationmorning where eid=6";
                   
                                    $this->query($query);
                                    $dataset=$this->fetch();
                                    $t=$dataset['setTime'];
                
                                     $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=7";
                                     if(!$this->query($query))
                                        { 
                                            return false;
                                        }   
                            }
                

                              if($id<8){
                                     $query="select setTime  from expecteddurationmorning where eid=7";
                                     $this->query($query);
                                     $dataset=$this->fetch();
                                     $t=$dataset['setTime'];
                
                                   
                                         $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=8";
                                         if(!$this->query($query))
                                            { 
                                                return false;
                                            }   
                              }        
                

                                  if($id<9){
                                         $query="select setTime  from expecteddurationmorning where eid=8";
                   
                                         $this->query($query);
                                         $dataset=$this->fetch();
                                         $t=$dataset['setTime'];
                                         $query="update expecteddurationmorning set setTime=addtime('00:05:00','$t')where eid=9";
                                         if(!$this->query($query))
                                            { 
                                                return false;
                                            }  
                                  } 
                                  return true;

                            }
      
      
      
        if($tripname=='ASH-CTK'){
                if($id==10){
                    $query="update expecteddurationafternoon set set_Time=current_time where eid=10";
                    if(!$this->query($query))
                    { 
                        return false;
                    }
                }
                if($id==9){
                    $query="update expecteddurationafternoon set set_Time=current_time where eid=9";
                    if(!$this->query($query))
                    { 
                        return false;
                    }
                 }
                 if($id==8){
                        $query="update expecteddurationafternoon set set_Time=current_time where eid=8";
                        if(!$this->query($query))
                        { 
                            return false;
                        }
                    }
                 if($id==7){
                            $query="update expecteddurationafternoon set set_Time=current_time where eid=7";
                            if(!$this->query($query))
                            { 
                                return false;
                            }
                            }
                  if($id==6){
                                $query="update expecteddurationafternoon set set_Time=current_time where eid=6";
                                if(!$this->query($query))
                                { 
                                    return false;
                                }
                    }
                  if($id==5){
                             $query="update expecteddurationafternoon set set_Time=current_time where eid=5";
                             if(!$this->query($query))
                                { 
                                   return false;
                                }
                            }
                   if($id==4){
                            $query="update expecteddurationafternoon set set_Time=current_time where eid=4";
                                if(!$this->query($query))
                                   { 
                                       return false;
                                   }
                            }
                   if($id==3){
                              $query="update expecteddurationafternoon set set_Time=current_time where eid=3";
                                   if(!$this->query($query))
                                      { 
                                         return false;
                                      }
                             }
                    if($id==2){
                        $query="update expecteddurationafternoon set set_Time=current_time where eid=3";
                             if(!$this->query($query))
                                { 
                                     return false;
                                }
                            }
                
                     
                if($id>9){
                 
                    $query="select set_Time  from expecteddurationafternoon where eid=10";
                    $this->query($query);
                    $dataset=$this->fetch();
                    $t=$dataset['set_Time'];
                    
                    $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=9";
                    if(!$this->query($query))
                        { 
                        return false;
                        }   
                }
                if($id>8){
                    $query="select set_Time  from expecteddurationafternoon where eid=9";
                   
                    $this->query($query);
                    $dataset=$this->fetch();
                    $t=$dataset['set_Time'];
                
                    $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=8";
                    if(!$this->query($query))
                    { 
                        return false;
                    }   
                }
                
                if($id>7){
                        $query="select set_Time  from expecteddurationafternoon where eid=8";
                   
                        $this->query($query);
                        $dataset=$this->fetch();
                        $t=$dataset['set_Time'];
                
                   
                         $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=7";
                         if(!$this->query($query))
                            { 
                                return false;
                            }   
                }      

                    if($id>6){
                             $query="select set_Time  from expecteddurationafternoon where eid=7";
                   
                             $this->query($query);
                             $dataset=$this->fetch();
                             $t=$dataset['set_Time'];
                
                        
                             $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=6";
                             if(!$this->query($query))
                                { 
                                    return false;
                                }   
                    }  
                
                        if($id>5){
                                 $query="select set_Time  from expecteddurationafternoon where eid=6";
                   
                                 $this->query($query);
                                 $dataset=$this->fetch();
                                 $t=$dataset['set_Time'];
                
                                 $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=5";
                                 if(!$this->query($query))
                                    { 
                                        return false;
                                    }   
                        }       
                

                            if($id>4){
                                    $query="select set_Time  from expecteddurationafternoon where eid=5";
                   
                                    $this->query($query);
                                    $dataset=$this->fetch();
                                    $t=$dataset['set_Time'];
                
                                     $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=4";
                                     if(!$this->query($query))
                                        { 
                                            return false;
                                        }   
                            }
                

                              if($id>3){
                                     $query="select set_Time  from expecteddurationafternoon where eid=4";
                                     $this->query($query);
                                     $dataset=$this->fetch();
                                     $t=$dataset['set_Time'];
                
                                   
                                         $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=3";
                                         if(!$this->query($query))
                                            { 
                                                return false;
                                            }   
                              }        
                

                                  if($id>2){
                                         $query="select set_Time  from expecteddurationafternoon where eid=3";
                   
                                         $this->query($query);
                                         $dataset=$this->fetch();
                                         $t=$dataset['set_Time'];
                                         $query="update expecteddurationafternoon set set_Time=addtime('00:05:00','$t')where eid=2";
                                         if(!$this->query($query))
                                            { 
                                                return false;
                                            }  
                                  } 
                                  return true;

                            }
      
                  }
  
    function listAll(){
        
              $tripType;
      $query="select t_name from tripdetails ORDER BY tid Desc Limit 1";
         if(!$this->query($query))
	{
		return false;
	}
		$this->query($query);
                $tripType=$this->fetch();
                $tripType=$tripType['t_name'];
        
        $query="select * from bookingdetails where t_name='$tripType' and t_date=CURDATE()";
           if(!$this->query($query))
            { 
               return false;
            }
        return true;
    }
    
    //gets all details of a paticular user
    function moreDetails($pid){
              $tripType;
      $query="select t_name from tripdetails ORDER BY tid Desc Limit 1";
         if(!$this->query($query))
	{
		return false;
	}
		$this->query($query);
                $tripType=$this->fetch();
                $tripType=$tripType['t_name'];
         $query="select * from bookingdetails where t_name='$tripType' and t_date=CURDATE() and id='$pid'";
           if(!$this->query($query))
            { 
               return false;
            }
        return true;  
    }
    
    
    //updates the time of a paticular user
    function update_location($location){
        
        $query ="update tripdetails set cur_location ='$location' ORDER BY tid Desc Limit 1";
	
	
	if(!$this->query($query))
	{
		return false;
	}
	
		return true;

    }
    
    /**
		*queries database and returns user details
		*/
		function get_user_details($uAshId,$uPassword){
			//write the SQL query and call $this->query()
			$query = "select * from busers where ash_id=$uAshId and password=$uPassword";
			return $this->query($query);
		}
    
    
 }
?>