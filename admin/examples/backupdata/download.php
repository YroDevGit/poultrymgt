<?php
include '../../../includes/database.php';
include '../../../includes/func.php';
$type = $_GET['type'];

if($type == 1){
	$date =  $_GET['q'];
	@header("Content-Disposition: attachment; filename=GardePoultryTransaction_".$date."_records.csv");
	
	$sql = "SELECT t.id, t.customer, e.mname, z.size_name,t.price,t.quantity, t.total, t.ddate, t.tcode FROM transaction t, eggs e, egg_size z WHERE t.egg_type = e.id AND t.egg_size = z.size_id AND t.ddate LIKE '%$date%' and t.stat = 1";
	$res = setQuery($sql);
	$data = "Trans_id,";
	$data .= "customer,";
	$data .= "Egg type,";
	$data .= "Egg size,";
	$data .= "price,";
	$data .= "Quantity,";
	$data .= "Total,";
	$data .= "Date,";
	$data .= "reference\n";
	while($mycol = getData($res)){
			$data .= $mycol[0].",";
			$data .= $mycol[1].",";
			$data .= $mycol[2].",";
			$data .= $mycol[3].",";
			$data .= $mycol[4].",";
			$data .= $mycol[5].",";
			$data .= $mycol[6].",";
			$data .= $mycol[7].",";
			$data .= $mycol[8]."\n";
	}
	echo $data;
}

if($type==2){
	@header("Content-Disposition: attachment; filename=GardePoultryInventory.csv");
	$sql = "SELECT i.egg_id,i.egg_size, SUM(i.tray) FROM inventory i WHERE i.stat = 0 GROUP BY i.egg_id, i.egg_size";
	$res = setQuery($sql);
	$data = "Egg type,";
	$data .= "Egg size,";
	$data .= "Total produced,";
	$data .= "Total purchase,";
	$data .= "Eggs left,\n";
	while($coll = getData($res)){
			$data .= tEggType($coll[0]).",";
			$data .= tEggSize($coll[1]).",";
			$data .= $coll[2].",";
			$purc = sumPurchasedTotal($coll[0],$coll[1]);
			$data .= $purc.",";
			$data .= $coll[2] - $purc."\n";
		

			
	}
	echo $data;
}



 ?>