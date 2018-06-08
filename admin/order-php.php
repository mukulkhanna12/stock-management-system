<?php
if (isset($_POST['ser'])) {
	$date = $_POST['dat'];
	$sql2 = "SELECT * FROM order_details WHERE created_at = '$date'";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->execute();
		$resultShow = $stmt2->fetchAll();

		$what=array();
		foreach ($resultShow as $show) {
			array_push($what, $show['created_at']);
		}
		
}
if (isset($_POST['serid'])) {
	$sid = $_POST['id'];
	$sql2 = "SELECT * FROM order_details WHERE id = '$sid'";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->execute();
		$resultid = $stmt2->fetchAll();

		$whatid=array();
		foreach ($resultid as $showid) {
			array_push($whatid, $showid['id']);
		}
		
}
$sql = "SELECT * FROM order_details";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$getId=array();
		$getUid=array();
		$getPid=array();
		$getStock=array();
		$getSize=array();
		$getTotal=array();
		$getCreate=array();
		$getName=array();
		$getPname=array();

		 foreach($result as $row) {
		 	array_push($getId,$row['id']);
			array_push($getUid,$row['uid']);
			array_push($getPid,$row['pid']);
			array_push($getStock,$row['stock']);
			array_push($getSize,$row['size']);
			array_push($getTotal,$row['total']);
			array_push($getCreate,$row['created_at']);
		}

	for ($i=0; $i <sizeof($getUid) ; $i++) { 
		$uid=$getUid[$i];
		$sql2 = "SELECT * FROM customer WHERE id='$uid'";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->execute();
		$result2 = $stmt2->fetchAll();
			foreach($result2 as $row2) {
				array_push($getName, $row2['name']);
			}
	}
		for ($i=0; $i <sizeof($getPid) ; $i++) { 
		$pid=$getPid[$i];
		$sql3 = "SELECT * FROM product WHERE id='$pid'";
		$stmt3 = $conn->prepare($sql3);
		$stmt3->execute();
		$result3 = $stmt3->fetchAll();
			foreach($result3 as $row3) {
				array_push($getPname, $row3['name']);
			}
	}
	
?>