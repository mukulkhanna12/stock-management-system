<?php 
if(isset($_POST['del']))
{
	$id=$_POST['id'];
	$del = "DELETE FROM product WHERE id = '$id'";
		$stmtdel = $conn->prepare($del);
		if ($stmtdel->execute()) {
			header("Location: t-shirt.php");
			}
}
		$sql = "SELECT * FROM product WHERE type = 't-shirt'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();
?>