<?php
include_once("adb.php");
	
	class ash_transit extends adb{
	
		function ash_transit(){
		adb::adb();
		}

		/** php fucntion that updates the role of a user
			it takes an ID parameter, and updates user based on id**/
		function update_conductor($id){
			$conductor="Conductor";
			$passenger="Passenger";
			$query =" update users set role ='$passenger' where role='$conductor'";
			
			if(!$this->query($query))
			{
				return false;
			}
			$query =" update users set role ='$conductor' where ash_id=$id";
				if(!$this->query($query))
			{
				return false;
			}
				return $this->query($query);
			}
                        
  /** php fucntion that automatically updates the pick up locations along the bus route**/
  function myTime($tripTime,$id){
     
      if($tripTime=='Christ the King-Ashesi'){
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
      
      
      
        if($tripTime=='Ashesi-Christ the King'){
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
                             
                //$g=new bus();
                     
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
       
   /** php fucntion that displays a list of all those who have booked**/
    function listAll(){
        $query="select * from bookingdetails where t_name='Christ the King-Ashesi'";
           if(!$this->query($query))
            { 
               return false;
            }
        return true;
    }
 }
?>