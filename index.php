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
					<h5> University of Missouri </h5>
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

        if(isset($_POST['submit'])) {

		//initializing connection------------------------------------------------------------------------
		$link = mysqli_connect("localhost", "avatar", "bigboybigben", "avatarGroup");



		//checks if connection failed--------------------------------------------------------------------
		if (mysqli_connect_errno()) { // if no error occurred when connecting
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}

		$query = "SELECT * FROM employee WHERE username=?";

        $stmt = mysqli_stmt_init($link);

        if(mysqli_stmt_prepare($stmt, $query)){

            $user = $_POST['username'];

            mysqli_stmt_bind_param($stmt, "s", $user);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            if( mysqli_num_rows($result) == 0){

                echo "Invalid username or password. No match found.";

            }else{

                $row = mysqli_fetch_array($result, MYSQLI_NUM);

                $salt = $row[2];//gets the salt for that user

                $pass = $_POST['password'];

                $hashedpass = $row[3];//gets the hashed password

                $_SESSION["userType"] = $row[4];//gets the user type
								$_SESSION["username"] = $user;//gets the username
								$_SESSION["location"] = "Not Chosen";

                if (password_verify($salt.$pass, $hashedpass)) {

                    header('Location: http://cs3380-avatar.centralus.cloudapp.azure.com/fproj/choose_loc.php');

                }else{

                   echo 'Invalid username or password.';

                }
            }
        }
		mysqli_close($link);

        }

		?>
	</body>
</html>
