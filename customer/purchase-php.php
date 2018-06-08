<?php 
$id=$_SESSION['id'];
$nothing=0;
error_reporting(0);

	$sql1 = "SELECT * FROM order_details WHERE uid='1'" ;
		$stmt1 = $conn->prepare($sql1);
		$stmt1->execute();
		$result1 = $stmt1->fetchAll();
		
		$pids=array();
		$pQuantity=array();	
		$total=array();
		$dates=array();

		foreach ($result1 as $row1) {
			array_push($pids,$row1['pid']);
			array_push($pQuantity,$row1['stock']);
			array_push($total,$row1['total']);
			array_push($dates,$row1['created_at']);
		}
	

$j=0;
for ($i=0; $i < sizeof($pids) ; $i++) { 
	if (strpos($pids[$i], ',') !== false)
	{
		$temp=explode(",", $pids[$i]);
		$temp2=explode(',', $pQuantity[$i]);
		$da=$dates[$i];
		for ($let=0; $let < sizeof($temp) ; $let++) 
		{
			$pid[$j]=$temp[$let];
			$date[$j]=$da;
			$fquan[$j]=$temp2[$let];
			$j++;
		}
	}else
	{
		$fquan[$j]=$pQuantity[$i];
		$date[$j]=$dates[$i];
		$pid[$j]=$pids[$i];
		$j++;
	}
}

		if(isset($pids)){
				$image=array();
				$name=array();
				$price=array();
				for($i=0 ; $i<sizeof($pid) ; $i++)
				{
					$sql2 = "SELECT * FROM product WHERE id='$pid[$i]'" ;
					$stmt2 = $conn->prepare($sql2);
					$stmt2->execute();
					$result2 = $stmt2->fetchAll();
					foreach ($result2 as $row2) 
					{
						$image[$i]=$row2['imagepath'];	
						$name[$i]=$row2['name'];
						$type[$i]=$row2['type'];
						$price[$i]=$row2['price'];	
					}
					
				}
		}
		else{
			$nothing=1;
		}	