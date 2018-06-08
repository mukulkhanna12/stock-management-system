<?php
$done=0;
$notdone=0;
if (isset($_POST['details'])) {

	$name2=$_POST['name'];
	$s=$_POST['small'];
	$m=$_POST['medium'];
	$xl=$_POST['xlarge'];
	$price=$_POST['price'];
	$type=$_POST['type'];

$name = $_FILES['file']['name'];
if ($type=='shirt') {
	 		$target_dir = "../images/shirt/";		 		
	 	}elseif ($type=='t-shirt') {
			 $target_dir = "../images/t-shirt/";		 	
	 	}elseif ($type=='jeans') {
			 $target_dir = "../images/jeans/";		 	
	 	}else{
			 $target_dir = "../images/formal/";		 		
	 	}
	 $target_file = $target_dir . basename($_FILES["file"]["name"]);

	 // Select file type
	 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	 // Valid file extensions
	 $extensions_arr = array("jpg","jpeg","png","gif");

	 // Check extension
	 if(in_array($imageFileType,$extensions_arr) ){
	 	
	  // Upload file
	 if(move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name)){
	 	$stock=$s+$m+$xl;
	 	$sql = "INSERT INTO product (name,type,imagepath,S,M,XL,stock, price)
				VALUES ('$name2','$type','$name','$x','$m','$xl','$stock','$price')";
				$stmt = $conn->prepare($sql);
				if($stmt->execute())
				{
					$done=1;
				//header("Location: newProduct.php");
				} 
	 }

	}else
	{
		$notdone=1;
		//header("Location: newProduct.php");
	}
		
}
