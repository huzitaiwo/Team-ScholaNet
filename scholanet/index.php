<?php
include("conn.php");

$error="";
session_start();

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
{  
   $count=0;
   $data=mysqli_query($conn,"select * from student_registration where emailid='$_POST[username]' && password='$_POST[password]'");
   $count=mysqli_num_rows($data);
   $row = mysqli_fetch_array($data);
   
   if($count==0)
   {
      $error= "Invalid username or password";
   }
   
else 
    
    
{
        if($row["type"]=="admin")
         {
          header("Location:admindas.php"); 
         }
       else{
           $_SESSION["sname"]=$row["name"];
           $_SESSION["semail"]=$row["emailid"];
           $_SESSION["sgender"]=$row["gender"];
           header("Location:sdb.php");
           }
}
   
}

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Scholanet E-library</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css"> 	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css"> 
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css"> 	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css"> 
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
 
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/cafe.png');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41 text-primary">
					Login into your account
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" action="">

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="username" placeholder="User Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="submit">
							Login
						</button>
					</div>


					<div class="container-login100-form-btn m-t-32">
						 <button class="login100-form-btn" name="submit">
						 	<a href="reg/index.php" style="color: white;">
							SIGN UP
						</a>
						</button> 
					</div>

				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
 
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script> 
	<script src="vendor/animsition/js/animsition.min.js"></script> 
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script> 
	<script src="vendor/select2/select2.min.js"></script> 
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script> 
	<script src="vendor/countdowntime/countdowntime.js"></script> 
	<script src="js/main.js"></script>

</body>
</html>