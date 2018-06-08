<?php
$id=$_SESSION['id'];
$date=date("Y-m-d");
if(isset($_POST['buy']))
{
		  $total=$_POST['total'];	
		$wa = "SELECT * FROM customer WHERE id = '$id'";
		$wastmt = $conn->prepare($wa);
		$wastmt->execute();
		$waresult = $wastmt->fetchAll();
		foreach ($waresult as $warow) {
			$wallet=$warow['wallet'];
		}
		
		$wallet=$wallet-$total;
		
		if($wallet>=0)
		{
			$wsql = "UPDATE customer
				SET wallet = '$wallet', updated_at = now()
				WHERE id= '$id'
				";		
				$wstmt = $conn->prepare($wsql);
			$wstmt->execute();
			
			$sql4 = "SELECT * FROM cart WHERE uid = '$id'";
			$stmt4 = $conn->prepare($sql4);
			$stmt4->execute();
			$result4=$stmt4->fetchAll();

			 $a=array();
			 $asize=array();
			 $quantity=array();
			 foreach($result4 as $row4)
			 {
			 	array_push($a, $row4['pid']);
			 	array_push($asize, $row4['size']);
			 	array_push($quantity, $row4['quantity']);
			 }
			//product quantity
			$sqlP = "SELECT * FROM product";
			$stmtP = $conn->prepare($sqlP);
			$stmtP->execute();
			$resultP=$stmtP->fetchAll();

			$aP=array();
			 $stockP=array();
			 $Sp=array();
			 $Mp=array();
			 $XLp=array();
			 foreach($resultP as $rowP)
			 {
			 	array_push($aP, $rowP['id']);
			 	array_push($stockP, $rowP['stock']);
			 	array_push($Sp, $rowP['S']);
			 	array_push($Mp, $rowP['M']);
			 	array_push($XLp, $rowP['XL']);	 	
			 }

			 for($i=0,$j=0; $i < sizeof($aP) ; $i++)
			 {

			 	if($a[$j]==$aP[$i])
			 	{
			 		$set=0;
				 	$stock=$stockP[$i]-$quantity[$j];
				if ($asize[$j]=='S') {
					$s=$Sp[$i]-$quantity[$j];
				 	$find='S';
				 			if ($s < 10) {
				 			$stock=$stock+200;
				 				 $s=$s + 200;
				 				 $set=1;
				 			}
				 	}else
				 	{
				 		if ($asize[$j]=='M') 
				 		{
				 			$find='M';	
				 			$m=$Mp[$i]-$quantity[$j];
				 			if ($m < 10) {
				 				
				 				$stock=$stock+200;
				 				$set=1;
				 				 $m=$m + 200;
				 			}
				 		}
				 			else{
				 				$find='XL';
				 				$xl=$XLp[$i]-$quantity[$j];
				 			if ($xl < 10) {
				 				
				 				$stock=$stock+200;
				 				$set=1;
				 				 $xl=$xl + 200;
				 			}
				 			}
				 		}

				 	if($find=='S'){
				 			$qua = "UPDATE product
									SET stock = '$stock', S ='$s', updated_at = now()
									WHERE id= '$a[$j]'
									";		
							}
					else
						{
						if($find=='M')	
							{
								$qua = "UPDATE product
									SET stock = '$stock', M ='$m', updated_at = now()
									WHERE id= '$a[$j]'
									";
							}else{
				 			$qua = "UPDATE product
									SET stock = '$stock', XL ='$xl', updated_at = now()
									WHERE id= '$a[$j]'
									";
								}
						}
							 $qt = $conn->prepare($qua);
								$qt->execute();

				 if($set==1)
				 	{
				 		$pur = "INSERT INTO new_order (pid,stock,size,created_at)
									VALUES ('$a[$j]',200,'$asize[$j]',now())";	
								$pur1 = $conn->prepare($pur);
								$pur1->execute();	
				 	}
								
								$j++;
				 	}//else stop of check
			}//for loop end
			
			 $stringPid=implode(",", $a);
			 $stringPsize=implode(",", $asize);
			$stringPq=implode(",", $quantity);
			 $isql = "INSERT INTO order_details (uid, pid, stock,size,total,created_at)
							VALUES ('$id','$stringPid','$stringPq','$stringPsize','$total','$date')";
							$istmt = $conn->prepare($isql);
							if($istmt->execute())
							{
					$del = "DELETE FROM cart WHERE uid = '$id'";
					$stmtdel = $conn->prepare($del);
					if ($stmtdel->execute()) {
					//	header("Location: cart.php");
						}
					}
		}
		else
		{
			$error_wa=true;
			$error ="You have a low account balance";
		}
}
		$sql = "SELECT * FROM cart WHERE uid = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll();

		$sql2 = "SELECT * FROM product";
		$stmt2 = $conn->prepare($sql2);
		$stmt2->execute();
		$result2 = $stmt2->fetchAll();
?>