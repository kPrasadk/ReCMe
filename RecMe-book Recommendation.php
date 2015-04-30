<!DOCTYPE html>
<html> 
<head>
	<title>Homepage</title>
	<link rel="stylesheet" href="home.css">
	<link rel="stylesheet" href="recommendpage.css">
	<link rel="stylesheet" href="bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap.css">
	<link rel="stylesheet" href="menu-bar.css">
    
	<script type="text/javascript" src="menu-bar.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.0/jquery-ui.min.js"></script>
	<script type="text/javascript" src="smoothScroll.js"></script>
</head>

<body>
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

		<!--!!!!!!!!========HomePage==========-->
		<section id="home">
			<div class="homepage">

				
			</div>

		</section>


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
							<input type="text" class="form-control " id="bookName1" name="bookName1" placeholder="Exact name of the book">
							<label for="author1">Author</label>
							<input type="text" class="form-control" id="author" name="author1" placeholder="Book Author(s)">
							<input type="submit"  class="btn btn-primary " style="background-color:#000099;" value="Submit" >
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
				<button type="submit" style="background-color:#336600;" class="btn btn-primary">Submit</button>
			
			</div>
			</section>

			</div>
		</section>

		<!--Search section-->

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
		</script>	
	<?php 
		$con= mysqli_connect("localhost","root","root"); 
		if (!$con) { 
			die('Could not connect to MySQL: ' ); 
		} 
		else
		{
			$sql_createdb = "CREATE DATABASE Book_Recommendation";
			$queryStatus=mysqli_query($con,$sql_createdb);
		    mysqli_select_db($con,"Book_Recommendation");
			$sql_createtable = " CREATE TABLE  Books (
			Name VARCHAR(30),
			authorName VARCHAR(30) ) ";
			$queryStatus=mysqli_query($con,$sql_createtable);
			if($queryStatus==TRUE)
					echo "\nTable created Successfully";
			else
					echo "Table not created ";
		}
		mysqli_close($con); 
	?> 
</html>