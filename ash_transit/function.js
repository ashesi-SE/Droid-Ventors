function syncAjax(u){
        console.log(u);
        var obj=$.ajax(
          {url:u,
           async:false
           }
        );
        console.log(obj.responseText);
        return $.parseJSON(obj.responseText);
    
      }

$(document).ready(function(){

//save function 
  $("#save").click(function()
  {

var busCapacity;
// var adminsCapacity;
var available;
var visitors;
//gets capacity entered by admin for the day. this capacity varies based on specialbookings she makes for ashesi guests
var adminsCapacity=parseInt($('#tCapacity').val(), 10);

      var tripname= $('#tripname').val();
      if($('#busSize').val()=="Big Bus"){
        busCapacity=40;
        if( adminsCapacity >= 0 && adminsCapacity<=busCapacity){
    //calculation of special guests and available seats
    visitors=busCapacity-adminsCapacity;
    available=adminsCapacity;
    alert("Trip details saved");
    //insert into database
    return syncAjax("action.php?cmd=1&tripname="+tripname+"&busCapacity="+busCapacity+"&adminsCapacity="+adminsCapacity+"&availableSeats="+available+"&numPeopleReserved="+visitors);
}
      }

      else if($('#busSize').val()=="Small Bus"){
        busCapacity=20;
        if( adminsCapacity >= 0 && adminsCapacity<=busCapacity){
   
    visitors=busCapacity-adminsCapacity;
    available=adminsCapacity;
    alert("Trip details saved");
    return syncAjax("action.php?cmd=1&tripname="+tripname+"&busCapacity="+busCapacity+"&adminsCapacity="+adminsCapacity+"&availableSeats="+available+"&numPeopleReserved="+visitors);

      }


  }
    
    
  });


  });
function refresh(){
  document.location.reload(true);
}


