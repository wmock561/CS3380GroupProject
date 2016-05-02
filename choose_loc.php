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
			width: 580px;
			margin: 50 auto;
			height: initial;
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
			color: black;
			z-index: 2;
		}
</head>
<body>
	<?php include("header.php");?>
		<div class="holder">
			<div id="btn-holder">
				<h3>Student Center</h3>
				<input type="button" class="choose-loc" id="student-center" onclick"" value="">
			</div>
			<div id="btn-holder">
				<h3>Memorial Union</h3>
				<input type="button" class="choose-loc"  id="memorial-union" onclick"" value="">
			</div>
		</div>
<body>
</html>
