
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

      function loadCurrentReport(){

          r=syncAjax("index_json_response.php?cmd=2");
          var part
         for (var i = 0; i < r.myashtrans.length; i++)
         {
           part += "<tr><td>" + r.myashtrans[i].t_name + "</td><td>" + r.myashtrans[i].setDepartureTime + "</td><td>" + r.myashtrans[i].adminCapacity
           + "</td><td>" + r.myashtrans[i].numPeopleReserved + "</td></tr>";
           
         }
         $('#current_report').html(part);
      }

      function loadReports(){
        r=syncAjax("index_json_response.php?cmd=3");

        var part
         for (var i = 0; i < r.myashtrans.length; i++)
         {
           part += "<tr><td>" + r.myashtrans[i].t_name + "</td><td>" + r.myashtrans[i].setDepartureTime + "</td><td>" + r.myashtrans[i].adminCapacity
           + "</td><td>" + r.myashtrans[i].numPeopleReserved + "</td></tr>";
           
         }
         $('#reports').html(part);
      }

      function loadUsers(){

          r=syncAjax("index_json_response.php?cmd=7");
          var part
         for (var i = 0; i < r.myashtrans.length; i++)
         {
          var idd = parseInt(r.myashtrans[i].id);
          console.log(idd);
           part += "<option value="+idd+">" + r.myashtrans[i].name + " [ " + r.myashtrans[i].ash_id + " ]</option>";
           
         }
         $('#allUsers').html(part);
      }

      function loadReservations(){
        r=syncAjax("index_json_response.php?cmd=4");

        var part
         for (var i = 0; i < r.myashtrans.length; i++)
         {
           part += "<tr><td>" + r.myashtrans[i].t_date + "</td><td>" + r.myashtrans[i].name + " [" + r.myashtrans[i].ash_id + "]" +
            "</td><td>" + r.myashtrans[i].t_name
           + "</td><td>" + r.myashtrans[i].destination + "</td><td>" + r.myashtrans[i].seat_no + "</td></tr>";
           
         }
         $('#res').html(part);
      }

      function changeConductor(){
    
      var idd=$("#allUsers").val(); 
      var u="index_json_response.php?cmd=5&id="+idd;
      var r=syncAjax(u);
            console.log(r);

            if (r == 0){
      // $('#mess').val("error registering delegate");
      $("#status").fadeTo(500,1, function() { $(this).html("<font size='3' color='red'>Error Updating Conductor :(</font>").fadeTo(5000,0,function() {}); })
    }
    else{
      // $('#mess').val("delegate registered");
      $("#status").fadeTo(500,1, function() { $(this).html("<font size='3' color='green'>Conductor Updated :)</font>").fadeTo(5000,0,function() {}); })
    }
      //location.reload();
    }

      function refresh(){
        document.location.reload(true);
      }

      // //get current report
      //   $("#getCurReport").click(function(){
      //  r=syncAjax("index_json_response.php?cmd=2");
      //  for (var i = 0; i < r.myashtrans.length; i++)
      //  {
      //    var part = "<br>Trip Name: " + r.myashtrans[i].t_name + "<br>Departure Time: " + r.myashtrans[i].setDepartureTime + "<br>Capacity: " + r.myashtrans[i].adminCapacity + "<br>Reservations: " + r.myashtrans[i].numPeopleReserved;
      //    $('<p>'+ part + '</p>').appendTo($('#cur_rep'));
      //  }
      //  this.disabled = true;
      //  });

      // //get all reports
      //   $("#getReports").click(function(){
      //  r=syncAjax("index_json_response.php?cmd=3");
      //  for (var i = 0; i < r.myashtrans.length; i++)
      //  {
      //    var part ="Date:" + r.myashtrans[i].t_date + "<br>Trip Name: " + r.myashtrans[i].t_name + "<br>Departure Time: " + r.myashtrans[i].setDepartureTime + "<br>Capacity: " + r.myashtrans[i].adminCapacity + "<br>Reservations: " + r.myashtrans[i].numPeopleReserved;
      //    $('<p>'+ part + '</p>').appendTo($('#reps'));
      //  }
      //  this.disabled = true;
      //  });

      //get reservations
        $("#getReservations").click(function(){
       r=syncAjax("index_json_response.php?cmd=4");
       for (var i = 0; i < r.myashtrans.length; i++)
       {
         var part = "Date:" + r.myashtrans[i].t_date + "<br>Name: " + r.myashtrans[i].name + " [" + r.myashtrans[i].ash_id + "]" + "<br>Trip: " + r.myashtrans[i].t_name + "<br>Pick Up Point: " + r.myashtrans[i].destination + "<br>Seat: #" + r.myashtrans[i].seat_no;
         $('<p>'+ part + '</p>').appendTo($('#reserves'));
       }
       this.disabled = true;
       });

  $(document).ready(function(){
    //loadCurrentReport();

    loadReports();

            loadReservations();

    // Login Function
      $("#login").click(function(){
      var dbname="";
      var dbcode="";
      var name1=$('#username').val();
      var password1=$('#psword').val();
      var u ="index_json_response.php?cmd=1&name="+name1+"&password="+password1;
      r=syncAjax(u);

      if(r == 0){
        $("#status").fadeTo(500,1, function() { $(this).html("<font color='red'>Invalid username or password</font>"); })
      }

      var nm = "";
      var pword = "";
      var rle = "";

      //Conditions for loading the different pages after successful login depending on the role of the user

      if (name1 == r.users.name1 && password1 == r.users.password1 && r.users.role1 == "passenger") {
        $("#status").fadeTo(500,1, function() { $(this).html("<font color='green'>Success! Loading Passenger's Page...</font>").fadeTo(5000,0,function() {location.href="#passpage"}); })
      }

      else if (name1 == r.users.name1 && password1 == r.users.password1 && r.users.role1 == "conductor") {
        $("#status").fadeTo(500,1, function() { $(this).html("<font color='green'>Success! Loading Conductor's Page...</font>").fadeTo(5000,0,function() {location.href="#conpage"}); })
      }

      else if (name1 == r.users.name1 && password1 == r.users.password1 && r.users.role1 == "manager") {
        $("#status").fadeTo(500,1, function() { $(this).html("<font color='green'>Success! Loading Manager's Page...</font>").fadeTo(5000,0,function() 
          {location.href="manager.html"}); })
      }

      //Message displayed if username or password is not correct
      

      });

  $("#save_user").click(function(){
      var un = $('#uname').val();
      var ps = $('#pword').val();
      var ph = $('#phone').val();
      var aid = $('#ashid').val();
      // console.log(fn,ln,em,ph,og);
    var res = syncAjax("index_json_response.php?cmd=6&un="+un+"&ps="+ps+"&ph="+ph+"&aid="+aid);

    if (res == 0){
      // $('#mess').val("error registering delegate");
      $("#status").fadeTo(500,1, function() { $(this).html("<font size='3' color='red'>Error Registering User :(</font>").fadeTo(5000,0,function() {}); })
    }
    else{
      // $('#mess').val("delegate registered");
      $("#status").fadeTo(500,1, function() { $(this).html("<font size='3' color='green'>User Registered :)</font>").fadeTo(5000,0,function() {}); })
    }
    // document.getElementById("save_event").disabled = true;

    $('#uname').val("");
    $('#pword').val("");
    $('#phone').val("");
    $('#ashid').val("");
    return res;
  });


});
