<?php
	session_start();
	$_SESSION["pawprint"] = "MTS5Z9";
	$_SESSION["location"] = "Memorial Union";
?>

<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<style>
		.group:after {
			content: "";
			display: table;
			clear: both;
		}
		.menubar {
			background-color: black;
			width: inherit;
			height: 240px;
			color: white;
		}
		#logout {
			float: left;
			display: block;
			margin: 10px;
			font-size: 20px;
		}
		.h3e {
			float: left;
			display: block;
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
		}
		.logout-holder {
			float: left;
			width: inherit;
			height: 40px;
		}
		#logout-btn {
			margin-top: 15px;
			margin-left: 15px;
		}
		.button-holder {
			margin: 0 auto;
			width: 330px;
		}
		.loc-btn {
			border: 2px solid #DBA901;
			background-color: black;
			color: white;
			font-size: 20px;
			border-radius: 5px;
			float: right;
			margin-right: 10px;
			-moz-transition: all .4s ease-in;
			-o-transition: all .4s ease-in;
			-webkit-transition: all .4s ease-in;
			transition: all .4s ease-in;
		}
		.button {
			width: initial;
			height: 45px;
			float:left;
			border: none;
			outline: none;
			background-color: black;
			color: white;
			margin-left: 5px;
			margin-right: 5px;
			font-size: 20px;
			-moz-transition: all .4s ease-in;
			-o-transistion: all .4s ease-in;
			-webkit-transition: all .4s ease-in;
			transition: all .4s ease-in;
		}
		.loc-btn:hover ,.button:hover {
			background-color: #DBA901;
			border-color: white;
			color: black;
		}
		.loc-holder {
			float: right;
		}
		#loc-h3 {
			float: none;
		}
		.log-info {
			height: 85px;
		}
	</style>
</head>
<body>
	<div class="menubar">
		<div class="log-info">
		<div class="logout-holder">
			<h3 class="h3e">Welcome <?=$_SESSION["pawprint"]?></h3>
			<input id="logout-btn" class="loc-btn" type="button" onclick="" value="Log Out">
		</div>
		<div class="loc-holder">
			<h3 id="loc-h3" class="h3e">Location: <?=$_SESSION["location"]?></h3>
			<input class="loc-btn" type="button" onclick="location.href=''" value="Change Location">
		</div>
		</div>
		<div class="img-holder">
			<img id="logo" src="https://apps-qa-a.missouri.edu/mizzoucheckout/Images/organizations/mizzouCheckoutHeader.png">
		</div>
		<div class="button-holder">
			<input class="button" type="button" onclick="location.href=''" value="Check Out">
			<input class="button" type="button" onclick="location.href=''" value="Check In">
			<input class="button" type="button" onclick="location.href=''" value="Inventory">
			<?php
				if($_SESSION["usertype"] == "admin"){
					echo '<input class="button" type="button" onclick="location.href=""" value="Admin">';
				}
			?>
		</div>
	</div>
</body>
</html>
