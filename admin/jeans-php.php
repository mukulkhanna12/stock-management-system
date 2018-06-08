<?php 
if(isset($_POST['del']))
{
	$id=$_POST['id'];
	$del = "DELETE FROM product WHERE id = '$id'";
		$stmtdel = $conn->prepare($del);
		if ($stmtdel->execute()) {
			header("Location: jeans.php");
			}
}
		$sql = "SELECT * FROM product WHERE type = 'jeans'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
?>