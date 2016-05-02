<?php
	session_start();
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
			margin-left: 10px;
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
			width: 500px;
			height: 50px;
		}
		#logout-btn {
			margin-top: 15px;
			margin-left: 15px;
		}
		.button-holder {
			margin: 0 auto;
			width: initial;
			height: 40px;
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
			margin-right: 10px;
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
			<h3 class="h3e">Welcome <?=$_SESSION["username"]?></h3>
			<form action="<?=$_SERVER['PHP_SELF']?>" style="float: left" method="POST"><input id="logout-btn" class="loc-btn" type="submit" name='logout' value="Log Out"></form>
		</div>
		<div class="loc-holder">
			<h3 id="loc-h3" class="h3e">Location: <?=$_SESSION["location"]?></h3>
			<input class="loc-btn" type="button" onclick="location.href='choose_loc.php'" value="Change Location">
		</div>
		</div>
		<div class="img-holder">
			<img id="logo" src="https://apps-qa-a.missouri.edu/mizzoucheckout/Images/organizations/mizzouCheckoutHeader.png">
		</div>
		<div class="button-holder">
			<input class="button" type="button" onclick="location.href='checkout.php'" value="Check Out">
			<input class="button" type="button" onclick="location.href='checkin.php'" value="Check In">
			<?php
			 	if($_SESSION['location'] != "Not Chosen") {
					echo '<input class="button" type="button" onclick="location.href='."'inventory.php'".'" value="Inventory">';
				}
				if($_SESSION["userType"] == "admin"){
					echo '<input class="button" type="button" onclick="location.href='."'adminpage.php'".'" value="Admin">';
				}
			?>
		</div>
	</div>
	<?php
		if(isset($_POST['logout'])) {
			session_unset();
			session_destroy();
			header('Location: index.php');
		}
	?>
</body>
</html>
