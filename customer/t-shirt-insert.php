<?php
include '../entrance.php';
$uid=$_SESSION["id"];
		
		if(isset($_POST['buy']))
		{
		$qty= $_POST['num'];
		$pid=$_POST['id'];
	    $size=$_POST['size'];

			$sql3 = "INSERT INTO cart (uid, pid,size,quantity,created_at)
				VALUES ('$uid','$pid','$size','$qty',now())";
				$stmt3 = $conn->prepare($sql3);
				$stmt3->execute();			
			 header("Location: t-shirt.php");
		}
?>