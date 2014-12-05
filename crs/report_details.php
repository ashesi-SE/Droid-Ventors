<!DOCTYPE	html>	
<html>	
	<head>	
			<link	rel="stylesheet"	href="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/jquery.mobile-1.4.4.min.css" />	
			<script	src="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/jquery-1.11.1.min.js"></script>	
			<script	src="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/jquery.mobile-1.4.4.min.js"></script>	
			 
			
			<script>	
				
				//makes a synchronous call to the page u and return the result as object
				function syncAjax(u){
						var obj=$.ajax(
							{url:u,
							 async:false
							 }
						);
						console.log(obj.responseText)
						return $.parseJSON(obj.responseText);	
				}
				
				
					var date = new Date();
					$(document).on("pageshow", function(event, data) {
					$('#date').html(date.toDateString());
					var id = getURLParameter("name"); 
					console.log("ID = " + id);
					var u="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/crs_action.php?cmd=2&na="+id;	
					r=syncAjax(u);
					var output = r.count.total;
					var result = output + " People reported  as at " + date.toDateString();
					$('#test').val(result);
					var u="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/crs_action.php?cmd=3&na="+id;	
					r=syncAjax(u);
					var name;
					for(var i=0;i<r.location.length;i++){
					 name = r.location[i].persons + " Persons Reported from"  + "\t" + r.location[i].location; 
					 $('<li>' + name + '</li>').appendTo($('#location')); 
					}
					var u="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/crs_action.php?cmd=4&na="+id;	
					r=syncAjax(u);
					var name;
					for(var i=0;i<r.issues.length;i++){
					 name = r.issues[i].reporter_name + " said - "  + "\t" + r.issues[i].issue; 
					 $('<li>' + name + '</li>').appendTo($('#issues')); 
					}
				});
	
				function getURLParameter(name) {
					return decodeURI(
						(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
					);
				}
				
				$(document).ready(function(){
				
				$("#back").click(function(){
				window.location.href="http://50.63.128.135/~csashesi/class2015/adekunle-ogundele/CRS/#reportStats";
				});
				
				});
    </script>
	</head>	
	<body >	
		<div  data-role="page" id="homepage" data-theme="b">	
			<div data-role="header" data-position="fixed" data-theme="b">
					<!--div><a href="#reportStats" data-role="button" data-icon="carat-l" data-inline="true">BACK</a></div-->
						<div align="left"><button id="back" data-icon="carat-l" data-transition="slide">BACK</button></div>
				<div data-role="navbar"data-position="fixed"><ul><li><a href="#" ><a href="#" ><img src="ireport.jpg" alt="iReport" width="200" height="60"/></a></li></ul></div>
			</div>
			<div role="main" class="ui-content" data-theme="a|b">
			<div id="date" align="right" style="font-size:80%">
			
			</div><br>
			<div style="color:red"><h4><strong><b>Statistics</b></strong></h4></div>
			<div style="font-size:80%">
			<div data-role="collapsible">
				<h4>Total number of people who reported</h4>
				 <input type="text"  id="test">
			</div>
			<div data-role="collapsible">
				<h4>Total persons who complained per location</h4>
				<ul data-role="listview" id="location" >
				</ul>
			</div>
			<div data-role="collapsible">
				<h4>Additional Information from people</h4>
				<ul data-role="listview" id="issues" >	
				</ul>
			</div>	
			</div>
			</div>
			<div	data-role="footer" data-position="fixed"  data-theme="b">	
				<h4>CopyRight.Cunlayogd</h4>
		</div>
		</div>
	</body>	
</html>	