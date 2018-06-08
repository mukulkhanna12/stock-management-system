<?php 
	include 'connection.php';
      session_start(); 
  
		$error=false;
			$error_l = false;

	if(isset($_POST['signUP']))
	{
		
		$name = $_POST['name'];
		$email = $_POST['Email'];
		$pass = $_POST['Password'];
		$cPass = $_POST['confirmPass'];
		$gender=$_POST['gender'];

		$check = "SELECT * FROM customer WHERE email = '$email'";
		$cstmt = $conn->prepare($check);
		$cstmt->execute();
		$cresult = $cstmt->fetchAll();	

		if($cresult)
		{
			$error=true;
			$error_email="Email already exists... Try with another one";
		}
		else
		{
				$sql = "INSERT INTO customer (name, email, password,gender)
				VALUES ('$name','$email','$pass','$gender')";
				$stmt = $conn->prepare($sql);
				$result=$stmt->execute();
				if ($result) {
					
						$sql2 = "SELECT * FROM customer WHERE email = '$email'";
						$stmt2 = $conn->prepare($sql2);
						$stmt2->execute();
						$result2 = $stmt2->fetchAll();
					
						foreach($result2 as $row)
						{ 
						  $_SESSION['id'] = $row['id'];
						  $id=$_SESSION['id'];
						  $_SESSION['name'] = $row['name'];
						  $_SESSION['email'] = $row['email'];
						  $_SESSION['pPic'] = "userphotos/userPic.jpg";
						}
						
						$sql3 = "INSERT INTO user_profile_photo (uid, file)
									VALUES ('$id','userphotos/userPic.jpg')";
						$stmt3 = $conn->prepare($sql3);
						if ($stmt3->execute())
						{
							header("Location: customer/shirt.php");
						}
				}
			}
	}

	if(isset($_POST['login']))
	{
		$lemail = $_POST['lEmail'];
		$lpass = $_POST['lPass'];
		$user=$_POST['user'];
			
		if ($user=='Customer') 
		{
			
			$sql1="SELECT * FROM customer,user_profile_photo WHERE customer.id = user_profile_photo.uid AND customer.email='$lemail' AND customer.password='$lpass'" ;
		
			$stmt1 = $conn->prepare($sql1);
			$stmt1->execute();
			$result1 = $stmt1->fetchAll();
			if(!$result1)
			{
				$sql2 = "SELECT * FROM customer WHERE email = '$lemail'";
				$stmt2 = $conn->prepare($sql2);
				$stmt2->execute();
				$result2 = $stmt2->fetchAll();
				if (!$result2) {
					$error_l = true;
					$error_of_l = "Both are incorrect";	
				}
				else
				{	
					$error_l = true;
					$error_of_l= "password are incorrect";	
				}
				
			}
			else
			{
			
				foreach($result1 as $row)
				{ 
				  $_SESSION['id'] = $row['id'];
				   $_SESSION['name'] = $row['name'];
				    $_SESSION['email'] = $row['email'];
				    $_SESSION['pPic'] = $row['file'];
				}
				 header("Location: customer/shirt.php");
				}

			}
			//admin start
			else{

				$sql5="SELECT * FROM admin WHERE email='$lemail' AND password='$lpass'" ;
				//$sql1 = "SELECT * FROM customer WHERE email = '$lemail' AND password = '$lpass'";
				$stmt5 = $conn->prepare($sql5);
				$stmt5->execute();
				$result5 = $stmt5->fetchAll();
				if(!$result5)
				{
					$sql6 = "SELECT * FROM admin WHERE email = '$lemail'";
					$stmt6 = $conn->prepare($sql6);
					$stmt6->execute();
					$result6 = $stmt6->fetchAll();
					if (!$result6) {
						echo "3";
						$error_l = true;
						$error_of_l = "Both are incorrect";	
					}
					else
					{	echo "2";
						$error_l = true;
						$error_of_l= "password are incorrect";	
					}
				}
				else
				{
					echo "noo";
					foreach($result5 as $row)
					{ 
					  $_SESSION['aid'] = $row['id'];
					   $_SESSION['name'] = $row['name'];
					    $_SESSION['email'] = $row['email'];
					    $_SESSION['pPic'] = $row['path'];
					}
					header("Location: admin/shirt.php");
					}
				}

		}
		
?>