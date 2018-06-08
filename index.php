<?php  	
require_once 'entrance.php';
if(isset($_SESSION['id']))
{
	header("Location: customer/shirt.php");
}
if(isset($_SESSION['aid']))
{
	header("Location: admin/shirt.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/myStyle.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body style="background-color: black; padding-top: 60px; background-image: url('images/backgroundImage.jpg');" >
	</br>
	<?php  
	echo '<div class="container">
				<div class="row">
			';
				if(isset($error_email))  {

		 		echo	'<div class="col-md-6 col-md-offset-1">
						<div class="alert alert-danger">
					 	 <strong>'.$error_email.'</strong> 
						</div>
					</div>';
				}
				if(isset($error_of_l))
				{
				echo '	<div class="col-md-4 col-md-offset-7">
						<div class="alert alert-danger">
					 	 <strong>'.$error_of_l.'</strong> 
						</div>
					</div>';
				}
			echo '</div>
		</div>';

 ?>

	<div class="container">
		<div class="row ">
			<div class="col-md-6 col-md-offset-1">
			
				<form method="POST" class ="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>">			
					<div class="row signUpbox">	
						<h2 style="color: #DC3D24; padding: 5px 0 0 5px; " class="text-center">
							Register
						</h2>	
						<div class=" col-md-1 col-md-offset-1 col-xs-11 col-xs-offset-1 space">
							<div class="input-group">
						   		<div style="background-color: white" class="input-group-addon">
									<span class="glyphicon glyphicon-user"></span>
								</div>
									<input type="text" placeholder="Your Name"  class="form-control inputStyle" name="name"
									value="<?php if($error==true) echo $name;?>" required> 
							</div>
						</div>
						<div class=" col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 space">
							<div class="input-group">
						   		<div style="background-color: white" class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</div>
									<input type="email" placeholder="Your Email"  class="form-control inputStyle" name="Email" 
									value="<?php if($error==true) echo $email;?>" required> 
							</div>
						</div>
						<div class=" col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 space">
							<div class="input-group">
						   		<div style="background-color: white" class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
									<input id="password" class="form-control inputStyle"  type="Password" placeholder="Password" name="Password" minlength="8" required>
							</div>
						</div>
						<div class=" col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 space">
							<div class="input-group">
						   		<div style="background-color: white" class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
									<input id="confirm_password" class="form-control inputStyle" type="Password" placeholder="Confirm Password" name="confirmPass">
									<span id="message" class="notMatch"></span> 
							</div>
						</div>
						<div class=" col-md-4 col-md-offset-2 col-xs-4 col-xs-offset-2 space">
							 <input type="radio" name="gender" value="female" checked> 
							<lable class="radioStyle">
			  					  	Female
			  				</lable>
						</div>
						<div class=" col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 space">
		  					 <input type="radio" name="gender" value="male">	 
			  				<lable class="radioStyle">
							 	Male
							</lable>
						</div>
						<div class=" col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 sbutspace">
							<button type="submit" name="signUP" class="btn signUpButton">Sign Up</button>
						</div>
					</div>
				</form>
			</div>

			<!-- Login box -->
		
			<div class="col-md-4">
				<form method="POST" class ="form-group" action="<?php echo $_SERVER['PHP_SELF']; ?>">			
					<div class="row loginbox">	
						<h2 style="color: white; padding: 5px 0 0 5px; " class="text-center">
							Login
						</h2>	
					<div class=" col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 space">
							<div class="input-group">
						   		<div style="background-color: white" class="input-group-addon">
									<span class="glyphicon glyphicon-envelope"></span>
								</div>
									<input type="email" placeholder="Email"  class="form-control inputStyleLogin" name="lEmail" 
									value="<?php if($error_l==true) echo $lemail;?>"  required> 
							</div>
					</div>
					<div class=" col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 space">
							<div class="input-group">
						   		<div style="background-color: white" class="input-group-addon">
									<span class="glyphicon glyphicon-lock"></span>
								</div>
									<input type="Password" placeholder="Password"  class="form-control inputStyleLogin" name="lPass"  required> 
							</div>
					</div>
					<div class="col-md-4 col-md-offset-2 col-xs-4 col-xs-offset-2 space">
							 <input type="radio" name="user" value="Customer" checked> 
							<lable class="radioStyleLogin">
			  					  	Customer
			  				</lable>
					</div>
					<div class="col-md-4 col-md-offset-1 col-xs-4 col-xs-offset-1 space">
		  					<input type="radio" name="user" value="Admin">	 
			  				<lable class="radioStyleLogin">
							 	Admin
							</lable>
					</div>

					<div class="col-md-11 col-md-offset-1 col-xs-11 col-xs-offset-1 sbutspace">
								<button type="submit" name="login" class="btn loginButton">Login</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#password, #confirm_password').on('keyup', function () {
	  if ($('#password').val() == $('#confirm_password').val()) {
	     $('#message').html('<i	class="fa fa-check-circle"></i>').css({color:'green',"padding":"10"});
	  } else 
	    $('#message').html('<i class="fa fa-remove"></i>')
	    .css({color:'red',"padding":"10"});
	});
	</script>

</body>
</html>