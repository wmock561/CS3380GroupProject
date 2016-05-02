<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	    //exit;
	}
?>

<?php
session_start();
?>

<html>
	<head>
		<!--  I USE BOOTSTRAP BECAUSE IT MAKES FORMATTING/LIFE EASIER -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-3"></div>
				<div class="col-md-4 col-sm-4 col-xs-6">
					<h2>Create a user</h2>
					<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
						<div class="row form-group">
								<input class='form-control' type="text" name="username" placeholder="username">
						</div>
						<div class="row form-group">
								<input class='form-control' type="password" name="password" placeholder="password">
						</div>
						<div class="row form-group">
								<input class=" btn btn-info" type="submit" name="submit" value="Register"/>
						</div>

					</form>
				</div>
			</div>
			
            
            <?php
    
				if(isset($_POST['submit'])) {
                    
                    $_SESSION["username"] = $_POST['username'];
                    
                    if($_POST['username'] == "adminUser"){

                            $utype = "admin";
                            
                    }else{
                            
                            $utype = "regUser";
                        
                    }
                    
                    
                    $_SESSION["utype"] = $utype;
                    

                    $link = mysqli_connect("localhost", "avatar", "bigboybigben", "avatarGroup");
            
                    if (mysqli_connect_errno()) { // if no error occurred when connecting
                        printf("Connect failed: %s\n", mysqli_connect_error());
                        exit();
                    }
                    
                    
					$query = "INSERT INTO employee(username,salt,hashedpass,usertype) VALUES (?,?,?,?)";
                    
					if ($stmt = mysqli_prepare($link, $query)) {
                        
						$user = $_POST['username'];
                        
                        echo $_POST['username'];
						
                        $salt = mt_rand();
                        
                        echo $salt . "\n";
						
                        $hpass = password_hash($salt.$_POST['password'], PASSWORD_BCRYPT);
                        
                        echo $hpass;
                        
						mysqli_stmt_bind_param($stmt, "ssss", $user, $salt, $hpass, $utype);
						
                        if(mysqli_stmt_execute($stmt)) {
							
                            echo "<h4>Success</h4>";
                            
						} else {
							
                            echo "<h4>Failed</h4>";
						
                        }
                        
						$result = mysqli_stmt_get_result($stmt);
					
                    } else {
						
                        die("prepare failed");
					}
				}
			?>
		</div>
	</body>
</html>
