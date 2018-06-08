<?php
	$id=$_SESSION['id'];
	$email=$_SESSION['email'];
	$check=0;
	$add=0;


if (isset($_POST['changename'])) {

	$name=$_POST['name'];
		$sql0="UPDATE customer
				SET name = '$name', updated_at = now()
				WHERE id= '$id'" ;
				$stmt0 = $conn->prepare($sql0);
			if($stmt0->execute()){
				$_SESSION['name']=$name;
				header("Location: profile.php");
				}
}


	if (isset($_POST['uploadImg'])) {
		echo "<br>";
	 $name = $_FILES['file']['name'];
	 $target_dir = "../images/userphotos/";
	 $target_file = $target_dir . basename($_FILES["file"]["name"]);

	 // Select file type
	 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	 // Valid file extensions
	 $extensions_arr = array("jpg","jpeg","png","gif");

	 // Check extension
	 if(in_array($imageFileType,$extensions_arr) ){
	 	$path='userphotos/'.$name;
	  // Upload file
	 if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
	 	$psql="UPDATE user_profile_photo
						SET file = '$path', updated_at = now() WHERE uid='$id'";
							$pstmt = $conn->prepare($psql);
							$pstmt->execute(); 
							$_SESSION['pPic']=$path; 
	 }
	}
	header("Location: profile.php");
}


if (isset($_POST['newP'])) {
	$cp=$_POST['cpass'];
	$npass=$_POST['npass'];
		$sql2="SELECT * FROM customer WHERE email='$email' AND password='$cp'" ;
		$stmt2 = $conn->prepare($sql2);
				if(!$stmt2->execute())
				{
					$check=1;
				}	else
				{
					$sql10="UPDATE customer
					SET password = '$npass', updated_at = now()
					WHERE id= '$id'" ;
		
					$stmt10 = $conn->prepare($sql10);
					if($stmt10->execute())
					header("Location: profile.php");
				}

}


if (isset($_POST['addValue'])) 
{	
		$add=$_POST['money'];
		$sql12="SELECT * FROM customer WHERE id = '$id'";
			$stmt12 = $conn->prepare($sql12);
			$stmt12->execute();
				$presult12 = $stmt12->fetchAll();
				foreach ($presult12 as $row){
					$wallet=$row['wallet'];
				}
				$add=$add + $wallet;

		$asql="UPDATE customer
				SET wallet = '$add', updated_at = now()
				WHERE id= '$id'" ;
	
				$astmt = $conn->prepare($asql);
				$astmt->execute();
				if($astmt->execute())
				header("Location: profile.php");
}

		$sql2="SELECT * FROM customer,user_profile_photo WHERE customer.id = user_profile_photo.uid AND customer.id='$id'" ;
				
			$stmt2 = $conn->prepare($sql2);
			$stmt2->execute();
				$presult2 = $stmt2->fetchAll();
