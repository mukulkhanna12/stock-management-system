<?php 

	$id=$_SESSION['id'];
		$sql = "SELECT * FROM product WHERE type = 't-shirt'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$sql2 = "SELECT * FROM cart WHERE uid = '$id'";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->execute();
		$result2 = $stmt2->fetchAll();

		$a=array();
		foreach($result2 as $row2) {
			array_push($a, $row2["pid"]);
		}
