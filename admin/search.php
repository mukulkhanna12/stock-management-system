<?php
if (isset($_POST['ser'])) {
    $search=$_POST['see'];
    $sh= "SELECT * FROM product WHERE id='$search' OR name='$search'";
    $st = $conn->prepare($sh);
    $st->execute();
}

if(isset($_POST['upd']))
{
    $price=$_POST['price'];
    $stock=$_POST['stock'];
    $name=$_POST['name'];
    $pid=$_POST['pid'];
    $up = "UPDATE product SET price ='$price',stock='$stock',name='$name' WHERE id = '$pid'";
        $stmtup = $conn->prepare($up);
        if ($stmtup->execute()) {
            header("Location: update.php");
            }
}
        $sql = "SELECT * FROM product";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
?>