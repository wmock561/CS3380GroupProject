<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<style>
		.holder {
			width: 586px;
			margin: 50 auto;
			height: 360px;
			border: #DBA901;
			border-style: double;
		}
		body {
			background-color: #2b2b2b;
		}
		#student-center {
			background: url(images/studentcenter.jpg);
		}
		#memorial-union {
			background: url(images/memorialunion.jpg);
		}
		.choose-loc {
			margin-left: 20px;
			margin-right: 20px;
			width: 250px;
			height: 220px;
			opacity: .5;
			border: none;
			background-color: white;
		}
		#btn-holder {
			float: left;
			margin: 0;
		}
		#btn-holder h3{
			position: relative;
			left: 60px;
			top: 130px;
			font-weight: 600;
			color: #DBA901;
			z-index: 2;
		}
</head>
<body>
	<?php include("header.php");
		if(isset($_POST['studentcenter'])) {
			$_SESSION['location'] = "Student Center";
			header('Location: /fproj/inventory.php');
		}
		if(isset($_POST['memorialunion'])) {
			$_SESSION['location'] = "Memorial Union";
			header('Location: /fproj/inventory.php');
		}
	?>
		<div class="holder">
			<h2 style="text-align: center; color: #DBA901">Choose a location</h2>
			<div id="btn-holder">
				<h3>Student Center</h3>
				<form method="POST" action=''>
					<input type="submit" class="choose-loc" id="student-center" name="studentcenter" value="">
				</form>
			</div>
			<div id="btn-holder">
				<h3>Memorial Union</h3>
				<form method="POST" action=''>
					<input type="submit" class="choose-loc"  id="memorial-union" name="memorialunion" value="">
				</form>
			</div>
		</div>
<body>
</html>
