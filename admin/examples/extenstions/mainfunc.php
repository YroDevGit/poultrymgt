<?php
include '../../includes/database.php';
include '../../includes/func.php';

function sumProduced($eggid){
	$ret = 0;
	$sql = "SELECT * FROM production p";
	$res = queryx($sql);
	$col = $eggid + 3;
	while($cox = getData($res)){
		$ret += $cox[$col];
	}
	return $ret;
}
function sumPurchased($eggid){
	$ret = 0;
	$sql = "SELECT SUM(t.quantity) FROM transaction t WHERE t.egg_type =$eggid";
	$res = queryx($sql);
	while($cox = getData($res)){
		$ret += $cox[0];
	}
	return $ret;
}

function sumPurchasedAll($eggid,$eggsize){
	$ret = 0;
	$sql = "SELECT SUM(t.quantity) FROM transaction t WHERE t.egg_type =$eggid and t.egg_size =  $eggsize";
	$res = queryx($sql);
	while($cox = getData($res)){
		$ret += $cox[0]*30;
	}
	return $ret;
}

function xEggType($eggid){
	$ret = "";
	$sql = "SELECT * from eggs where id =  $eggid";
	$res = queryx($sql);
	while($cox = getData($res)){
		$ret = $cox[1];
	}
	return $ret;
}
function xEggSize($eggid){
	$ret = "";
	$sql = "SELECT * from egg_size where size_id =  $eggid";
	$res = queryx($sql);
	while($cox = getData($res)){
		$ret = $cox[1];
	}
	return $ret;
}





 ?>