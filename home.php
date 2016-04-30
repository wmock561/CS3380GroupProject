<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link rel="stylesheet" href="/fproj/styling/theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
		<style>
		.group:after {
			content: "";
			display: table;
			clear: both;
		}
		.menubar {
			background-color: black;
			width: inherit;
			height: 250px;
			color: white; 
		}
		#logout {
			float: left;
			display: block;
			margin: 10px;
			font-size: 20px;
		}
		#welcome {
			float: left;
			display: block;
			margin: 10px;
			font-size: 24px;
		}
		#logo {
			height: 100px;
			margin: 10px;
			display: block;
		}
		.img-holder {
			width: inherit;
			height: 100px;
			margin-top: 65px;
		}
		.logout-holder {
			width: inherit;
			height: 40px;
		}
		.button-holder {
			margin-left: 10px;
		}
		.button {
			width: inherit;
			height: 45px;
			float:left;
			border: none;
			outline: none;
			background-color: black;
			color: white;
			font-size: 20px;
			-moz-transition: all .4s ease-in;
			-o-transistion: all .4s ease-in;
			-webkit-transition: all .2s ease-in;
			transition: all .2s ease-in;
		} 
		.button:hover {
			background-color: #DBA901;
			color: black;
		}
	</style>
		<?php
		//ensures HTTPS is used-------------------------------------------------------------------------
		if($_SERVER["HTTPS"] != "on"){
			header("Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
			exit();
		}
		
		//ensures a user is logged in or the page is redirected to login--------------------------------
		if($_SESSION["username"] == "" || $_SESSION["username"] == NULL){
			header("Location: https://".$SERVER["HTTP_HOST"]."index.php");
			exit();
		}
		
		//Start the session----------------------------------------------------------------------------
		session_start();
		?>
	</head>
	<body>
	<?php 
		if($_SESSION["userType"] != "admin"){
			<script type="text/javascript">document.getElementById('adminMenu').style.display = 'none';</script>
		}	
	?>
	<div class="menubar">
		<div class="logout-holder">
			<h3 id="welcome">Welcome <?=$_SESSION["username"]?></h3>
			<a href="index.php" id="logout">Log Out</a>
		</div>
		<div class="img-holder">
			<img id="logo" src="https://apps-qa-a.missouri.edu/mizzoucheckout/Images/organizations/mizzouCheckoutHeader.png">
		</div>
		<div class="button-holder">
			<input class="button" type="button" onclick="location.href='home.php'" value="Home">
			<input class="button" type="button" onclick="location.href=''" value="Shopping Cart">
			<input class="button" type="button" onclick="location.href=''" value="Check Out">
			<input class="button" type="button" onclick="location.href=''" value="Check In">
			<input class="button" type="button" onclick="location.href=''" value="Inventory">
			<!--- I don't know if this works yet --->
			<div class="btn-group"  style="float: right;" id="adminMenu">
				<input class="button" type="button" onclick="location.href=''" value="Administration Tools" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<ul class = "dropdown-menu">
					<li><a href="#">Add Employee</a></li>
					<li><a href="#">Remove Employee</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#">Add Item</a></li>
					<li><a href="#">Remove Item</a></li>
					<li><a href="#">Add New Item Category</a></li>
					<li><a href="#">Change Item Location</a></li>
					<li role="separator" class="divider"></li>
					<li><a href="#">Give Admin Privileges</a></li>
				</ul>
			</div>
			
		</div>
	</div>
	<?php
		if(isset($_POST['logout'])){
			// remove all session variables
			session_unset(); 
			// destroy the session 
			session_destroy();
			// redirects to login page
			header('Location: index.php');
		}
	?>
</body>
</html>