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

<body onload="update();">
		<header>
		<div id="sse1">
  			<div id="sses1">
  			  <ul>
  			    <li><a class="scroll" href="#about">About</a></li>
  			    <li><a class="scroll" href="#recommend">Acknowledge</a></li>
            	<li><a class="scroll" href="#search">View Approved</a></li>
  			  </ul>
  			   <div id="button">
              <button class="btn btn-default" type="submit" style="float:right;">Login</button>
              </div>
 			 </div>
		</div>
		</header>	

		<!--!!!!!!!!========HomePage==========-->
		<section id="home">
			<div class="homepage">
				<div id="welcome">
					<br><br><br><br><br>
					<h1 style="font-size:56px;">Hello...:)</h1>
				</div>
				
			</div>

		</section>


		<!--!!!======Acknowledge page===========!!!-->
		<section id="recommend">
			<div class="recommendpage">
			
			<section id="formlook" style="height:700px;">
			<div id="inside" >
			<h1 style="padding-bottom:55px;margin-top:0px;">Recent recommendations</h1>
				<form action="rec/approval.php" method="post">
				<div id="recentrec" style="height:425px;overflow-y:scroll;">

				</div>
				<input type="submit" class="btn btn-primary " id="submit" style="background-color:#000099;margin-left:20px;" value="Submit">
				</form>
			</div>
			</section>


			</div>
		</section>

		<!--View Approved section-->
		<section id="search">
			<div id="rectable">
				<h1 style="padding-left:40px;padding-top:40px;">Approved recommendations</h1>
				<div id="approvedrec" style="padding:30px 60px;overflow-y:scroll;">
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
					var xmlhttp = new XMLHttpRequest();
        			document.getElementById("approvedrec").innerHTML = "Checking"+xmlhttp.readyState+"status"+xmlhttp.status;
					xmlhttp.onreadystatechange = function() {
        				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                			document.getElementById("approvedrec").innerHTML = xmlhttp.responseText;
            			}
            			else
            			{
            				document.getElementById("approvedrec").innerHTML = "Checking"+xmlhttp.readyState+"status"+xmlhttp.status;
            				//document.getElementById("approvedrec").innerHTML = "Can't find script on server";	
            			}
        			}
        			xmlhttp.open("GET", "rec/viewapproved.php", true);
        			xmlhttp.send();	

				}

				function update()
				{

					updateRecentRec();
					displayrec();

				}
		</script>	
 
</html>