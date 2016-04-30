<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="/fproj/styling/theme.min.css"><!-- Optional theme -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
		<?php
		//ensures HTTPS is used-------------------------------------------------------------------------
		if($_SERVER["HTTPS"] != "on"){
			header("Location: https://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]);
			exit();
		}
		
		// Start the session
		session_start();
		?>

	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3 col-sm-3 col-xs-3">
					<img src="images/mu.gif" alt="mu" style="width:50px;height:56px;float:left;">
					<h4> Missouri Student Unions </h4>
					<h5> University of Missouri </h4>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h2>Log in</h2>
					<form action="" method="POST">
						<div class="row form-group">
								<input class='form-control' type="text" name="username" placeholder="username">
						</div>
						<div class="row form-group">
								<input class='form-control' type="password" name="password" placeholder="password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-default" type="submit" name="submit" value="Login"/>
						</div>
					</form>
				</div>
			</div>
		</div>
		<?php
		//initializing connection------------------------------------------------------------------------
		$link = mysqli_connect("http://40.86.93.141/", "avatar", "bigboybigben", "avatarGroup");
		
		//checks if connection failed--------------------------------------------------------------------
		if (mysqli_connect_errno()) { // if no error occurred when connecting
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		//checking user-------------------------------------------------------------------------------
		if(isset($_POST['submit'])){
			//variables used------------------------------------------
			$username = $_POST['username'];
			$password = $_POST['password'];
			$numOfRows = 0;
			$error_code = "0000";
			
			//checking if username is NULL----------------------------
			if($_SESSION["username"] == ""){
				$error_code = "No username entered";
			}

			//checking if password is correct if username exists------
			if($error_code == "0000"){
				//getting hashed password--------------------
				if($stmt = mysqli_prepare($link, "SELECT username,hashedpass,userType FROM employee WHERE username = ?")){
					mysqli_stmt_bind_param($stmt, "s", $username);						//binding parameters
					mysqli_stmt_execute($stmt);											//executing statement
					mysqli_stmt_store_result($stmt);									//storing results
					mysqli_stmt_bind_result($stmt,$_SESSION["username"],$hash,$_SESSION["userType"]);	//binding results to variables
					mysqli_stmt_fetch($stmt);											//fetching results				
					mysqli_stmt_close($stmt);											//closing connection									
				}
				//checking passowrd--------------------------
				if(!password_verify($password,$hash))
					$error_code = "Incorrect password";
			}
			
			//printing out if success or error-----------------------
			if($error_code == "0000"){
				echo "<h4> Success </h4>";
				header('Location: home.php');
			}
			else{
				echo "<h4> Failure (ERROR CODE: ".$error_code.") </h4>";
			}
		}
		mysqli_close($link);
		?>
	</body>
</html>
