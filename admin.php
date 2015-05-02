<!DOCTYPE html>
<html> 
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="assets/css/home.css">
	<link rel="stylesheet" href="assets/css/recommendpage.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/menu-bar.css">
	<link rel="stylesheet" href="assets/css/search.css">
    
	<script type="text/javascript" src="assets/js/menu-bar.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="assets/js/smoothScroll.js"></script>
</head>

<body onload="updateRecentRec();">
		<header>
		<div id="sse1">
  			<div id="sses1">
  			  <ul>
  			    <li><a class="scroll" href="#about">About</a></li>
  			    <li><a class="scroll" href="#recommend">Acknowledge</a></li>
            	<li><a class="scroll" href="#search">View Approved</a></li>
  			  </ul>
 			 </div>
		</div>
		</header>	

		<!--!!!!!!!!========HomePage==========-->
		<section id="home">
			<div class="homepage">

				
			</div>

		</section>


		<!--!!!======Acknowledge page===========!!!-->
		<section id="recommend">
			<div class="recommendpage">
			
			<section id="formlook">
			<div id="inside">
			<h1 style="padding-bottom:55px;margin-top:0px;">Recent recommendations</h1>
				<div id="recentrec" style="height:484px;position:relative;overflow-y:scroll;">

				</div>
			</div>
			</section>

			</div>
		</section>

		<!--Search section-->
		<section id="search">
			<div id="rectable">
				<h1 style="padding-left:40px;padding-top:40px;">Search recommendations</h1>
				<input type="text" class="form-control " id="booksearch" name="bookName" placeholder="Exact name of the book">
				<input type="submit" class="btn btn-primary " id="submit" style="background-color:#000099;margin-left:20px;" value="Submit"  onclick="displayrec();" >
				<h3 style="padding-left:40px;" id="recent">Recent recommendations</h3>
				<div id="toprec">
				</div>
			</div>
		</section>


</body>
		<script language="javascript">
				function checkbook()
				{
					//alert();
					document.getElementById("test").innerHTML="hello";
				}
				var counter=2;
				function addNext()
				{
					var newnode=document.getElementById('book1').cloneNode(true);
					newnode.id="book"+counter;
					var bookElements=newnode.childNodes;
					var bookname=bookElements[0].childNodes;
					//bookname[1].id="bookName"+counter;
					var authorname=bookElements[1].childNodes;
					//authorname[1].id="authorName"+counter;
					document.getElementById('books').appendChild(newnode);
					counter++;
					//alert(counter);
				}
				function search()
				{
					window.open("search.html");
				}

				function updateRecentRec()
				{
					var xmlhttp = new XMLHttpRequest();
        			xmlhttp.onreadystatechange = function() {
        				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                			document.getElementById("recentrec").innerHTML = xmlhttp.responseText;
            			}
            			else
            			{
            				document.getElementById("recentrec").innerHTML = "Can't find script on server";	
            			}
        			}
        			xmlhttp.open("GET", "rec/recent.php", true);
        			xmlhttp.send();					
				}

				function displayrec()
				{
					var heading=document.getElementById("recent");
					heading.innerHTML="Search results";
					var xmlhttp = new XMLHttpRequest();
					//document.getElementById("toprec").innerHTML = "Checking"+xmlhttp.readyState+"status"+xmlhttp.status;
        			xmlhttp.onreadystatechange = function() {
        				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                			document.getElementById("toprec").innerHTML = xmlhttp.responseText;
            			}
            			else
            			{
            				document.getElementById("toprec").innerHTML = "Can't find script on server";	
            			}
        			}
        			var element=document.getElementById("booksearch").value;
        			element="bookname="+element;
        			var res = encodeURI(element);
        			res="rec/display.php"+"?"+res ;
        			xmlhttp.open("GET", res, true);
        			xmlhttp.send();	
				}
		</script>	
 
</html>