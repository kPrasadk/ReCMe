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
<?php
		require_once ("includes/credentials.php");
		require_once ("functions.php");
		session_start();
		//var_dump($_SESSION);
		if(!isset($_SESSION['token']))
		{
?>
<!--!!!!!!!!========HomePage==========-->
		<section id="home">
			<div class="homepage">
              <div id="button" class="text-center">
              <a href="login/"class="btn btn-danger" type="submit">Login Using NITC Mail ID</a>
              </div>
			</div>

		</section>	
<?php
		}
		else
		{
			$user['email']=$_SESSION['user_email'];
			$user['user_id']=$_SESSION['user_id'];
			if(userIsAdmin($user))
			{
				$url=$base_url."admin.php";
				echo $url;
				echo filter_var($url, FILTER_SANITIZE_URL);
	  			header('Location: ' . filter_var($url, FILTER_SANITIZE_URL));
			}
?>
		
		<body onload="updateTopRec();">
		<header>
		<div id="sse1">
  			<div id="sses1">
  			  <ul>
  			    <li><a class="scroll" href="#about">About</a></li>
  			    <li><a class="scroll" href="#recommend">Recommend</a></li>
            	<li><a class="scroll" href="#search">Search</a></li>
              </ul>
 			 </div>
		</div>
		</header>


		<!--!!!======Recommend page===========!!!-->
		<section id="recommend">
			<div class="recommendpage">
			
			<section id="formlook">
			<div id="inside">
			<h1 style="padding-bottom:55px;margin-top:0px;">Recommend Books</h1>
		
				<div id="books">
					<div id="book1" class="book">
						<div class="form-group">
							<form action="insert.php" method="post">
							<label for="bookName1">Book name</label>   
							<div class="space">
							<input type="text" class="form-control " id="bookName1" name="bookName1" placeholder="Exact name of the book">
							</div>
							<label for="author1">Author</label>
							<div class="space">
							<input type="text" class="form-control" id="author1" name="author1" placeholder="Book Author(s)">
							</div>
							<label for="bookno">No of Books</label> 
							<div class="space">
							<input type="text" class="form-control" id="bookno" name="bookno" placeholder="No_of_Books">
							</div>
							<input type="submit"  class="btn btn-primary " style="background-color:#000099;" value="Submit">
							</form>
						</div>
						<!--<div class="form-group">
							<label for="authorName1">Author</label>
							<input type="text" class="form-control" id="authorName1" placeholder="Author?">
						</div>-->
					</div>
				</div>
				<button type="button" style="background-color:#336600;" class="btn btn-primary" onclick="addNext()" >Suggest another book</button>
				<div class="checkbox">
					<label><input type="checkbox"> Remember me</label>
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
				<div id="toprec" style="overflow-y:scroll;">
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

				function updateTopRec()
				{
					var xmlhttp = new XMLHttpRequest();
        			xmlhttp.onreadystatechange = function() {
        				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                			document.getElementById("toprec").innerHTML = xmlhttp.responseText;
            			}
            			else
            			{
            				document.getElementById("toprec").innerHTML = "Can't find script on server";	
            			}
        			}
        			xmlhttp.open("GET", "rec/rec.php", true);
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
<?php
		}
?> 
</html>